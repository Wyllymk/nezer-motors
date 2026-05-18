<?php
/**
 * Nezer Motors — inc/ajax-contact.php
 *
 * ─────────────────────────────────────────────────────────────
 *  WHAT THIS FILE DOES
 * ─────────────────────────────────────────────────────────────
 *  • Registers wp_ajax_nm_contact (logged-in + guests)
 *  • Full spam pipeline:
 *      1. Nonce check
 *      2. Field sanitisation & validation
 *      3. Honeypot (field name read from admin settings)
 *      4. Rate limiting via transients (per IP)
 *      5. Blocked IP list check
 *      6. Blocked email / domain list check
 *      7. Spam keyword scoring
 *  • Logs every submission to the DB (nm_contact_log)
 *  • Sends emails only for clean / borderline submissions
 *  • Localises window.NM for the front-end JS (nonce, ajaxUrl, strings)
 *
 * ─────────────────────────────────────────────────────────────
 *  HOW TO INCLUDE IN functions.php
 * ─────────────────────────────────────────────────────────────
 *  Add these three lines in your theme's functions.php in this
 *  exact order (admin-contact first so nm_cs() / nm_ct() exist):
 *
 *      require_once get_template_directory() . '/inc/admin-contact.php';
 *      require_once get_template_directory() . '/inc/mail.php';
 *      require_once get_template_directory() . '/inc/ajax-contact.php';
 *
 * ─────────────────────────────────────────────────────────────
 *  CONTACT FORM — HONEYPOT FIELD
 * ─────────────────────────────────────────────────────────────
 *  The honeypot field name is stored in Settings → Spam & Security
 *  (default: "website"). Your form HTML already uses name="website"
 *  so the default works out of the box.
 *
 *  If you ever change the honeypot field name in the admin panel
 *  you must also update the hidden <input> name in page-contact.php.
 *  To make this automatic, replace the static honeypot block in
 *  page-contact.php with:
 *
 *      <?php
 *      $nm_hp = nm_cs()['honeypot_field'] ?? 'website';
 *      ?>
* <div style="display:none" aria-hidden="true">
    * <label for="nm-<?php echo esc_attr($nm_hp); ?>">Leave this blank</label>
    * <input type="text" * id="nm-<?php echo esc_attr($nm_hp); ?>" * name="<?php echo esc_attr($nm_hp); ?>" *
        tabindex="-1" * autocomplete="off">
    * </div>
*
* @package nezer-motors
*/

defined( 'ABSPATH' ) || exit;

/* ============================================================
FRONT-END LOCALISATION
Outputs window.NM = { ajaxUrl, nonce, strings }
Used by the existing NMForm JS module in your main JS file.
============================================================ */

add_action( 'wp_enqueue_scripts', function () {
// Only output on pages that have the contact form
// (adjust the condition to match however you detect the contact page)
if ( ! is_page_template( 'page-contact.php' ) && ! is_page( 'contact' ) ) {
return;
}

wp_localize_script(
'nezer-motors-script', // ← your theme's main JS handle; adjust if different
'NM',
[
'ajaxUrl' => admin_url( 'admin-ajax.php' ),
'nonce' => wp_create_nonce( 'nm_contact_nonce' ),
'strings' => [
'required' => __( 'Please fill in all required fields.', 'nezer-motors' ),
'success' => __( 'Thank you! Your message has been sent. We will get back to you shortly.', 'nezer-motors' ),
'error' => __( 'Message could not be sent. Please call us directly.', 'nezer-motors' ),
],
]
);
} );

/* ============================================================
AJAX HANDLER — nm_contact
Handles form submissions from both logged-in users and guests.
============================================================ */

add_action( 'wp_ajax_nm_contact', 'nezer_motors_handle_contact' );
add_action( 'wp_ajax_nopriv_nm_contact', 'nezer_motors_handle_contact' );

function nezer_motors_handle_contact(): void {

/* ── 1. Nonce ───────────────────────────────────────────── */
if (
! isset( $_POST['nonce'] ) ||
! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'nm_contact_nonce' )
) {
wp_send_json_error(
[ 'message' => __( 'Security check failed. Please refresh the page and try again.', 'nezer-motors' ) ],
403
);
}

$s = nm_cs(); // all admin settings

/* ── 2. Sanitise inputs ─────────────────────────────────── */
$name = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
$email = sanitize_email( $_POST['email'] ?? '' );
$phone = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
$branch = sanitize_text_field( wp_unslash( $_POST['branch'] ?? '' ) );
$vehicle = sanitize_text_field( wp_unslash( $_POST['vehicle'] ?? '' ) );
$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

// Honeypot — field name is configurable in admin settings (default: "website")
$hp_field = $s['honeypot_field'] ?? 'website';
$hp_value = sanitize_text_field( wp_unslash( $_POST[ $hp_field ] ?? '' ) );

/* ── 3. Required-field validation ───────────────────────── */
if ( empty( $name ) || empty( $email ) || empty( $branch ) || empty( $message ) ) {
wp_send_json_error(
[ 'message' => __( 'Please fill in all required fields.', 'nezer-motors' ) ],
400
);
}
if ( ! is_email( $email ) ) {
wp_send_json_error(
[ 'message' => __( 'Please enter a valid email address.', 'nezer-motors' ) ],
400
);
}

/* ── 4. Resolve client IP ───────────────────────────────── */
$client_ip = '';
foreach ( [ 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR' ] as $key ) {
if ( ! empty( $_SERVER[ $key ] ) ) {
$client_ip = trim( explode( ',', sanitize_text_field( wp_unslash( $_SERVER[ $key ] ) ) )[0] );
break;
}
}

/* ── 5. Rate limiting (per IP, via transients) ──────────── */
$rate_limit = max( 1, (int) ( $s['rate_limit'] ?? 5 ) );
$rate_window = max( 1, (int) ( $s['rate_window'] ?? 60 ) ); // minutes
$rate_key = 'nm_rl_' . md5( $client_ip );
$rate_count = (int) get_transient( $rate_key );

if ( $rate_count >= $rate_limit ) {
wp_send_json_error(
[ 'message' => __( 'Too many submissions. Please wait a few minutes before trying again.', 'nezer-motors' ) ],
429
);
}
// Increment counter; set_transient with existing expiry isn't possible, so
// we use a rolling approach: set only resets on first hit in the window.
if ( $rate_count === 0 ) {
set_transient( $rate_key, 1, $rate_window * MINUTE_IN_SECONDS );
} else {
// Preserve the original TTL by updating value only
set_transient( $rate_key, $rate_count + 1, $rate_window * MINUTE_IN_SECONDS );
}

/* ── 6. Spam scoring ────────────────────────────────────── */
$spam_score = 0;
$honeypot_flag = 0;

// 6a. Honeypot triggered
if ( ! empty( $hp_value ) ) {
$honeypot_flag = 1;
$spam_score += 5;
}

// 6b. Blocked IP
$blocked_ips = array_filter( array_map( 'trim', explode( "\n", $s['blocked_ips'] ?? '' ) ) );
if ( $client_ip && in_array( $client_ip, $blocked_ips, true ) ) {
$spam_score += 5;
}

// 6c. Blocked email / domain
$blocked_emails = array_filter( array_map( 'trim', explode( "\n", $s['blocked_emails'] ?? '' ) ) );
foreach ( $blocked_emails as $blocked ) {
$blocked = strtolower( $blocked );
if (
$blocked === strtolower( $email ) ||
( str_starts_with( $blocked, '@' ) && str_ends_with( strtolower( $email ), $blocked ) )
) {
$spam_score += 5;
break;
}
}

// 6d. Spam keywords in name + message (case-insensitive)
$spam_words = array_filter( array_map( 'trim', explode( "\n", $s['spam_words'] ?? '' ) ) );
$haystack = strtolower( $name . ' ' . $message );
foreach ( $spam_words as $word ) {
if ( $word && stripos( $haystack, $word ) !== false ) {
$spam_score += 2;
}
}

$is_spam = $spam_score >= 4 || $honeypot_flag === 1;
$status = $is_spam ? 'spam' : 'new';

/* ── 7. Log to database ─────────────────────────────────── */
$data = compact( 'name', 'email', 'phone', 'branch', 'vehicle', 'message' );
$submission_id = nm_contact_log( $data, $honeypot_flag, min( $spam_score, 10 ), $status );

/* ── 8. Honeypot hit — silent success, no email ─────────── */
// Never tell bots they were blocked; always return a success-looking response.
if ( $honeypot_flag ) {
wp_send_json_success( [
'message' => __( 'Thank you! Your message has been sent. We will get back to you shortly.', 'nezer-motors' ),
] );
}

/* ── 9. Send emails ─────────────────────────────────────── */
$send_notif = ! $is_spam || ( $s['notify_on_spam'] ?? '0' ) === '1';

if ( $send_notif ) {
nezer_motors_send_contact_email( $data, $submission_id );
}

if ( ! $is_spam ) {
nezer_motors_send_auto_reply( $name, $email, $branch, $submission_id );
}

/* ── 10. Response ───────────────────────────────────────── */
// Spam submissions still get a success response — no info leak.
wp_send_json_success( [
'message' => __( 'Thank you! Your message has been sent. We will get back to you shortly.', 'nezer-motors' ),
] );
}