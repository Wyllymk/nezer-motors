<?php
/**
 * Nezer Motors — inc/mail.php
 *
 * wp_mail handler: contact form emails + auto-reply.
 * Settings-aware (reads nm_cs()), logs every submission to the DB,
 * supports admin resend via submission ID, and respects per-branch
 * recipient overrides.
 *
 * LOAD ORDER: admin-contact.php must be included first so that
 * nm_cs(), nm_ct() are available here.
 *
 * @package nezer-motors
 */

defined( 'ABSPATH' ) || exit;

/* ============================================================
   DB HELPERS  (logging + marking sent)
============================================================ */

/**
 * Insert a new submission row and return the auto-increment ID.
 *
 * @param array  $data          Sanitized form fields: name, email, phone, branch, vehicle, message.
 * @param int    $honeypot_flag 1 if the honeypot field was filled by a bot.
 * @param int    $spam_score    Computed 0-10 spam score.
 * @param string $status        Initial status: 'new' | 'spam'.
 * @return int   Inserted row ID, or 0 on failure.
 */
function nm_contact_log(
	array $data,
	int $honeypot_flag = 0,
	int $spam_score    = 0,
	string $status     = 'new'
): int {
	global $wpdb;

	// Resolve real client IP (Cloudflare → X-Forwarded-For → REMOTE_ADDR)
	$ip = '';
	foreach ( [ 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR' ] as $key ) {
		if ( ! empty( $_SERVER[ $key ] ) ) {
			$ip = trim( explode( ',', sanitize_text_field( wp_unslash( $_SERVER[ $key ] ) ) )[0] );
			break;
		}
	}

	$ua = isset( $_SERVER['HTTP_USER_AGENT'] )
		? substr( sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ), 0, 255 )
		: '';

	$referer = isset( $_SERVER['HTTP_REFERER'] )
		? substr( esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ), 0, 500 )
		: '';

	$now = current_time( 'mysql' );

	$wpdb->insert(
		nm_ct(),
		[
			'name'          => $data['name']    ?? '',
			'email'         => $data['email']   ?? '',
			'phone'         => $data['phone']   ?? '',
			'branch'        => $data['branch']  ?? '',
			'vehicle'       => $data['vehicle'] ?? '',
			'message'       => $data['message'] ?? '',
			'ip_address'    => $ip,
			'user_agent'    => $ua,
			'referer'       => $referer,
			'honeypot_flag' => $honeypot_flag,
			'spam_score'    => min( $spam_score, 10 ),
			'status'        => $status,
			'notif_sent'    => 0,
			'reply_sent'    => 0,
			'created_at'    => $now,
			'updated_at'    => $now,
		],
		[ '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%s', '%s' ]
	);

	return (int) $wpdb->insert_id;
}

/**
 * Flip notif_sent or reply_sent to 1 on an existing submission row.
 *
 * @param int    $submission_id DB row ID.
 * @param string $field         'notif_sent' | 'reply_sent'.
 */
function nm_contact_mark_sent( int $submission_id, string $field ): void {
	if ( ! in_array( $field, [ 'notif_sent', 'reply_sent' ], true ) || $submission_id < 1 ) {
		return;
	}
	global $wpdb;
	$wpdb->update(
		nm_ct(),
		[ $field => 1, 'updated_at' => current_time( 'mysql' ) ],
		[ 'id'   => $submission_id ],
		[ '%d', '%s' ],
		[ '%d' ]
	);
}

/* ============================================================
   RECIPIENTS RESOLVER
============================================================ */

/**
 * Return a list of validated 'to' addresses for a given branch.
 * Reads branch-specific overrides first, then falls back to the
 * primary recipients setting.
 *
 * @param string $branch Branch value submitted from the form.
 * @return string[] Non-empty, validated email addresses.
 */
function nm_contact_recipients( string $branch ): array {
	$s    = nm_cs();
	$bl   = strtolower( $branch );
	$over = $s['branch_recipients'] ?? [];

	if ( stripos( $bl, 'qwikfix' ) !== false && ! empty( $over['qwikfix'] ) ) {
		$raw = $over['qwikfix'];
	} elseif ( ( stripos( $bl, 'autocare' ) !== false || stripos( $bl, 'auto care' ) !== false )
		&& ! empty( $over['autocare'] ) ) {
		$raw = $over['autocare'];
	} else {
		$raw = $s['recipients'] ?? ( defined( 'NM_EMAIL' ) ? NM_EMAIL : get_option( 'admin_email' ) );
	}

	return array_values(
		array_filter(
			array_map( 'trim', explode( ',', $raw ) ),
			'is_email'
		)
	);
}

/* ============================================================
   PUBLIC MAILER FUNCTIONS
============================================================ */

/**
 * Send the admin notification email for a new/resent submission.
 *
 * @param array $data          name, email, phone, branch, vehicle, message.
 * @param int   $submission_id DB row ID — marks notif_sent=1 on success (0 = skip).
 * @return bool
 */
function nezer_motors_send_contact_email( array $data, int $submission_id = 0 ): bool {
	$s  = nm_cs();
	$to = nm_contact_recipients( $data['branch'] ?? '' );

	if ( empty( $to ) ) {
		return false;
	}

	$subject = str_replace(
		[ '{branch}', '{name}' ],
		[ $data['branch'] ?? '', $data['name'] ?? '' ],
		$s['notif_subject'] ?? '[Nezer Motors] New Enquiry — {branch}'
	);

	$from_name  = $s['from_name']  ?? 'Nezer Motors Website';
	$from_email = $s['from_email'] ?? ( defined( 'NM_EMAIL' ) ? NM_EMAIL : get_option( 'admin_email' ) );

	$headers = [
		'Content-Type: text/html; charset=UTF-8',
		'From: '     . $from_name . ' <' . $from_email . '>',
		'Reply-To: ' . esc_attr( $data['name'] ?? '' ) . ' <' . sanitize_email( $data['email'] ?? '' ) . '>',
	];

	$body = nezer_motors_build_notification_email( $data );
	$ok   = wp_mail( implode( ',', $to ), $subject, $body, $headers );

	if ( $ok && $submission_id > 0 ) {
		nm_contact_mark_sent( $submission_id, 'notif_sent' );
	}

	return $ok;
}

/**
 * Send the auto-reply confirmation to the customer.
 * Respects the auto_reply toggle in settings.
 *
 * @param string $name          Customer full name.
 * @param string $email         Customer email.
 * @param string $branch        Branch they enquired about.
 * @param int    $submission_id DB row ID — marks reply_sent=1 on success (0 = skip).
 * @return bool
 */
function nezer_motors_send_auto_reply(
	string $name,
	string $email,
	string $branch,
	int $submission_id = 0
): bool {
	$s = nm_cs();

	if ( empty( $s['auto_reply'] ) || $s['auto_reply'] === '0' ) {
		return false;
	}
	if ( ! is_email( $email ) ) {
		return false;
	}

	$subject    = $s['reply_subject'] ?? 'Thank you for contacting Nezer Motors';
	$from_name  = $s['from_name']     ?? 'Nezer Motors';
	$from_email = $s['from_email']    ?? ( defined( 'NM_EMAIL' ) ? NM_EMAIL : get_option( 'admin_email' ) );

	$headers = [
		'Content-Type: text/html; charset=UTF-8',
		'From: ' . $from_name . ' <' . $from_email . '>',
	];

	$body = nezer_motors_build_auto_reply_email( $name, $branch );
	$ok   = wp_mail( $email, $subject, $body, $headers );

	if ( $ok && $submission_id > 0 ) {
		nm_contact_mark_sent( $submission_id, 'reply_sent' );
	}

	return $ok;
}

/* ============================================================
   EMAIL TEMPLATE — ADMIN NOTIFICATION
============================================================ */

/**
 * Build the HTML body of the admin notification email.
 *
 * @param array $data Sanitized form data.
 * @return string HTML.
 */
function nezer_motors_build_notification_email( array $data ): string {
	$branch_lower = strtolower( $data['branch'] ?? '' );
	$accent_color = ( strpos( $branch_lower, 'qwikfix' ) !== false ) ? '#dc2626' : '#1e40af';
	$branch_label = esc_html( $data['branch'] ?: 'General' );

	$fields = [
		esc_html__( 'Name',    'nezer-motors' ) => esc_html( $data['name']    ?? '' ),
		esc_html__( 'Email',   'nezer-motors' ) => esc_html( $data['email']   ?? '' ),
		esc_html__( 'Phone',   'nezer-motors' ) => esc_html( $data['phone']   ?: esc_html__( 'Not provided',  'nezer-motors' ) ),
		esc_html__( 'Branch',  'nezer-motors' ) => $branch_label,
		esc_html__( 'Vehicle', 'nezer-motors' ) => esc_html( $data['vehicle'] ?: esc_html__( 'Not specified', 'nezer-motors' ) ),
	];

	$rows_html = '';
	foreach ( $fields as $label => $value ) {
		$rows_html .= '
		<tr>
			<td style="padding:12px 0;border-bottom:1px solid #f1f5f9;vertical-align:top;">
				<p style="color:#9ca3af;font-size:11px;text-transform:uppercase;letter-spacing:1.2px;margin:0 0 3px;font-family:Arial,sans-serif;">' . $label . '</p>
				<p style="color:#111827;font-size:15px;margin:0;font-weight:600;font-family:Arial,sans-serif;">' . $value . '</p>
			</td>
		</tr>';
	}

	$message_html = nl2br( esc_html( $data['message'] ?? '' ) );
	$sent_at      = wp_date( 'j F Y, g:i A', null, wp_timezone() );
	$site_url     = esc_url( home_url() );
	$reply_email  = esc_attr( $data['email'] ?? '' );
	$reply_name   = esc_html( $data['name']  ?? '' );

	return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>New Enquiry — Nezer Motors</title>
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,'Segoe UI',sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:40px 16px;">
    <tr><td align="center">
      <table width="100%" cellpadding="0" cellspacing="0" style="max-width:580px;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 32px rgba(0,0,0,0.10);">

        <!-- HEADER -->
        <tr>
          <td style="background:linear-gradient(135deg,#09090b 0%,#111827 60%,{$accent_color} 100%);padding:36px 40px;text-align:center;">
            <p style="color:#d4a017;font-size:22px;font-weight:900;letter-spacing:4px;margin:0;text-transform:uppercase;font-family:Arial,sans-serif;">NEZER MOTORS</p>
            <p style="color:rgba(255,255,255,0.55);font-size:12px;margin:6px 0 0;letter-spacing:1px;font-family:Arial,sans-serif;">New Website Enquiry</p>
            <div style="display:inline-block;margin-top:12px;padding:5px 14px;background:{$accent_color};border-radius:20px;">
              <p style="color:#fff;font-size:12px;font-weight:700;margin:0;font-family:Arial,sans-serif;">{$branch_label}</p>
            </div>
          </td>
        </tr>

        <!-- BODY -->
        <tr>
          <td style="padding:32px 40px;">
            <h2 style="color:#111827;font-size:18px;font-weight:700;margin:0 0 6px;font-family:Arial,sans-serif;">
              You have a new enquiry from the website
            </h2>
            <p style="color:#6b7280;font-size:13px;margin:0 0 24px;font-family:Arial,sans-serif;">
              Received on {$sent_at}
            </p>
            <table width="100%" cellpadding="0" cellspacing="0">
              {$rows_html}
            </table>
            <div style="background:#f8fafc;border-left:4px solid {$accent_color};padding:16px 20px;border-radius:0 10px 10px 0;margin-top:24px;">
              <p style="color:#9ca3af;font-size:11px;text-transform:uppercase;letter-spacing:1.2px;margin:0 0 10px;font-family:Arial,sans-serif;">Message</p>
              <p style="color:#374151;font-size:15px;margin:0;line-height:1.7;font-family:Arial,sans-serif;">{$message_html}</p>
            </div>
            <div style="margin-top:28px;text-align:center;">
              <a href="mailto:{$reply_email}"
                 style="display:inline-block;background:{$accent_color};color:#fff;font-size:14px;font-weight:700;padding:12px 28px;border-radius:10px;text-decoration:none;font-family:Arial,sans-serif;">
                Reply to {$reply_name}
              </a>
            </div>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><hr style="border:none;border-top:1px solid #e5e7eb;margin:0;"></td></tr>

        <!-- FOOTER -->
        <tr>
          <td style="padding:20px 40px;background:#f9fafb;text-align:center;">
            <p style="color:#9ca3af;font-size:12px;margin:0;font-family:Arial,sans-serif;">
              Sent via the contact form at <a href="{$site_url}" style="color:#d4a017;text-decoration:none;">{$site_url}</a>
            </p>
            <p style="color:#9ca3af;font-size:11px;margin:6px 0 0;font-family:Arial,sans-serif;">
              &copy; Nezer Motors &middot; P.O. Box 643, 10100 Nyeri, Kenya
            </p>
          </td>
        </tr>

      </table>
    </td></tr>
  </table>
</body>
</html>
HTML;
}

/* ============================================================
   EMAIL TEMPLATE — CUSTOMER AUTO-REPLY
============================================================ */

/**
 * Build the HTML body of the customer auto-reply email.
 *
 * @param string $name   Customer full name.
 * @param string $branch Branch they enquired about.
 * @return string HTML.
 */
function nezer_motors_build_auto_reply_email( string $name, string $branch ): string {
	$branch_lower = strtolower( $branch );
	$is_qwikfix   = strpos( $branch_lower, 'qwikfix' ) !== false;
	$accent       = $is_qwikfix ? '#dc2626' : '#1e40af';
	$branch_phone = $is_qwikfix ? '0701 104 644'                          : '0733 204 672';
	$branch_loc   = $is_qwikfix
		? 'Shell Service Station, Nyeri-Nyahururu Road'
		: 'Kingongo, Opposite GK Prison, Nyeri';

	$first_name   = esc_html( explode( ' ', trim( $name ) )[0] );
	$branch_label = esc_html( $branch );
	$site_url     = esc_url( home_url() );

	return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Thank you — Nezer Motors</title>
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,'Segoe UI',sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:40px 16px;">
    <tr><td align="center">
      <table width="100%" cellpadding="0" cellspacing="0" style="max-width:580px;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 32px rgba(0,0,0,0.10);">

        <!-- HEADER -->
        <tr>
          <td style="background:linear-gradient(135deg,#09090b,#111827 60%,{$accent} 100%);padding:36px 40px;text-align:center;">
            <p style="color:#d4a017;font-size:22px;font-weight:900;letter-spacing:4px;margin:0;text-transform:uppercase;font-family:Arial,sans-serif;">NEZER MOTORS</p>
            <p style="color:rgba(255,255,255,0.55);font-size:12px;margin:6px 0 0;letter-spacing:1px;font-family:Arial,sans-serif;">Thank you for your message</p>
          </td>
        </tr>

        <!-- BODY -->
        <tr>
          <td style="padding:36px 40px;">
            <h2 style="color:#111827;font-size:22px;font-weight:700;margin:0 0 12px;font-family:Arial,sans-serif;">
              Hi {$first_name},
            </h2>
            <p style="color:#374151;font-size:15px;line-height:1.7;margin:0 0 20px;font-family:Arial,sans-serif;">
              Thank you for reaching out to us. We have received your message and our team will get back to you as soon as possible &mdash; usually within the same business day.
            </p>
            <p style="color:#374151;font-size:15px;line-height:1.7;margin:0 0 28px;font-family:Arial,sans-serif;">
              You contacted us regarding <strong style="color:{$accent};">{$branch_label}</strong>. If you need to speak with us right away, please use the contact details below.
            </p>

            <!-- Branch info -->
            <div style="background:#f8fafc;border-radius:12px;padding:24px;border:1px solid #e5e7eb;margin-bottom:28px;">
              <p style="color:#6b7280;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;margin:0 0 16px;font-family:Arial,sans-serif;">Branch Contact</p>
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr><td style="padding:6px 0;">
                  <p style="color:#9ca3af;font-size:11px;margin:0 0 2px;font-family:Arial,sans-serif;">Location</p>
                  <p style="color:#111827;font-size:14px;font-weight:600;margin:0;font-family:Arial,sans-serif;">{$branch_loc}</p>
                </td></tr>
                <tr><td style="padding:6px 0;border-top:1px solid #f1f5f9;">
                  <p style="color:#9ca3af;font-size:11px;margin:0 0 2px;font-family:Arial,sans-serif;">Phone</p>
                  <p style="color:#111827;font-size:14px;font-weight:600;margin:0;font-family:Arial,sans-serif;">{$branch_phone}</p>
                </td></tr>
                <tr><td style="padding:6px 0;border-top:1px solid #f1f5f9;">
                  <p style="color:#9ca3af;font-size:11px;margin:0 0 2px;font-family:Arial,sans-serif;">Hours</p>
                  <p style="color:#111827;font-size:14px;font-weight:600;margin:0;font-family:Arial,sans-serif;">Monday &ndash; Saturday, 8:00 AM &ndash; 5:00 PM</p>
                </td></tr>
                <tr><td style="padding:6px 0;border-top:1px solid #f1f5f9;">
                  <p style="color:#9ca3af;font-size:11px;margin:0 0 2px;font-family:Arial,sans-serif;">Email</p>
                  <p style="color:#111827;font-size:14px;font-weight:600;margin:0;font-family:Arial,sans-serif;">info@nezermotors.com</p>
                </td></tr>
              </table>
            </div>

            <div style="text-align:center;">
              <a href="https://wa.me/254733204672"
                 style="display:inline-block;background:linear-gradient(135deg,#25d366,#128c7e);color:#fff;font-size:14px;font-weight:700;padding:12px 28px;border-radius:10px;text-decoration:none;font-family:Arial,sans-serif;">
                Chat on WhatsApp
              </a>
            </div>
          </td>
        </tr>

        <tr><td style="padding:0 40px;"><hr style="border:none;border-top:1px solid #e5e7eb;margin:0;"></td></tr>

        <!-- FOOTER -->
        <tr>
          <td style="padding:20px 40px;background:#f9fafb;text-align:center;">
            <p style="color:#9ca3af;font-size:12px;margin:0;font-family:Arial,sans-serif;">
              <a href="{$site_url}" style="color:#d4a017;text-decoration:none;">nezermotors.com</a>
            </p>
            <p style="color:#9ca3af;font-size:11px;margin:6px 0 0;font-family:Arial,sans-serif;">
              &copy; Nezer Motors &middot; P.O. Box 643, 10100 Nyeri, Kenya
            </p>
            <p style="color:#d1d5db;font-size:11px;margin:8px 0 0;font-family:Arial,sans-serif;">
              You received this because you submitted our contact form. Please do not reply to this email &mdash; use the contact details above.
            </p>
          </td>
        </tr>

      </table>
    </td></tr>
  </table>
</body>
</html>
HTML;
}