<?php
/**
 * Nezer Motors — inc/admin-contact.php
 *
 * Contact form admin panel: DB table, WP_List_Table submissions log,
 * settings, resend emails, spam control, CSV export, auto-cleanup cron.
 *
 * Include this file from functions.php BEFORE mail.php so nm_cs() is
 * available to the mailer.
 *
 * @package nezer-motors
 */

defined( 'ABSPATH' ) || exit;

/* ============================================================
   1. CONSTANTS & SHARED HELPERS
============================================================ */

define( 'NM_CONTACT_DB_VER', '1.2' );

/** Full table name. */
function nm_ct(): string {
	global $wpdb;
	return $wpdb->prefix . 'nm_contact_submissions';
}

/**
 * Merged settings with defaults. Cached per request.
 *
 * @return array
 */
function nm_cs(): array {
	static $cache = null;
	if ( $cache !== null ) {
		return $cache;
	}
	$cache = wp_parse_args(
		(array) get_option( 'nm_contact_settings', [] ),
		[
			'recipients'        => defined( 'NM_EMAIL' ) ? NM_EMAIL : get_option( 'admin_email' ),
			'auto_reply'        => '1',
			'from_name'         => 'Nezer Motors',
			'from_email'        => defined( 'NM_EMAIL' ) ? NM_EMAIL : get_option( 'admin_email' ),
			'honeypot_field'    => 'website',
			'rate_limit'        => '5',
			'rate_window'       => '60',
			'blocked_emails'    => '',
			'blocked_ips'       => '',
			'spam_words'        => "casino\nviagra\nloan offer\nforex\ncrypto\nbitcoin\nSEO\nbacklinks",
			'branch_recipients' => [ 'autocare' => '', 'qwikfix' => '' ],
			'notif_subject'     => '[Nezer Motors] New Enquiry — {branch}',
			'reply_subject'     => 'Thank you for contacting Nezer Motors',
			'retention_days'    => '90',
			'notify_on_spam'    => '0',
		]
	);
	return $cache;
}

/* ============================================================
   2. DATABASE — INSTALL / UPGRADE
============================================================ */

function nm_contact_install(): void {
	global $wpdb;
	$t  = nm_ct();
	$cs = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$t} (
		id            BIGINT(20) UNSIGNED   NOT NULL AUTO_INCREMENT,
		name          VARCHAR(100)          NOT NULL DEFAULT '',
		email         VARCHAR(150)          NOT NULL DEFAULT '',
		phone         VARCHAR(30)           NOT NULL DEFAULT '',
		branch        VARCHAR(100)          NOT NULL DEFAULT '',
		vehicle       VARCHAR(150)          NOT NULL DEFAULT '',
		message       TEXT                  NOT NULL,
		ip_address    VARCHAR(45)           NOT NULL DEFAULT '',
		user_agent    VARCHAR(255)          NOT NULL DEFAULT '',
		referer       VARCHAR(500)          NOT NULL DEFAULT '',
		honeypot_flag TINYINT(1)            NOT NULL DEFAULT 0,
		spam_score    TINYINT(3)            NOT NULL DEFAULT 0,
		status        ENUM('new','read','replied','spam','archived')
		                                    NOT NULL DEFAULT 'new',
		admin_notes   TEXT,
		notif_sent    TINYINT(1)            NOT NULL DEFAULT 0,
		reply_sent    TINYINT(1)            NOT NULL DEFAULT 0,
		created_at    DATETIME              NOT NULL,
		updated_at    DATETIME              NOT NULL,
		PRIMARY KEY (id),
		KEY idx_status  (status),
		KEY idx_email   (email(20)),
		KEY idx_created (created_at)
	) {$cs};";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
	update_option( 'nm_contact_db_version', NM_CONTACT_DB_VER );
}

add_action( 'admin_init', function () {
	if ( get_option( 'nm_contact_db_version' ) !== NM_CONTACT_DB_VER ) {
		nm_contact_install();
	}
} );

/* ============================================================
   3. ADMIN MENU
============================================================ */

add_action( 'admin_menu', function () {
	global $wpdb;
	$new   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM " . nm_ct() . " WHERE status = 'new'" );
	$badge = $new
		? ' <span class="update-plugins count-' . $new . '"><span class="update-count">' . number_format_i18n( $new ) . '</span></span>'
		: '';

	add_menu_page(
		__( 'Contact Forms', 'nezer-motors' ),
		__( 'Contact Forms', 'nezer-motors' ) . $badge,
		'manage_options',
		'nm-contact',
		'nm_contact_page_submissions',
		'dashicons-email-alt2',
		30
	);
	add_submenu_page( 'nm-contact', __( 'All Submissions', 'nezer-motors' ), __( 'All Submissions', 'nezer-motors' ), 'manage_options', 'nm-contact',          'nm_contact_page_submissions' );
	add_submenu_page( 'nm-contact', __( 'Settings',        'nezer-motors' ), __( 'Settings',        'nezer-motors' ), 'manage_options', 'nm-contact-settings', 'nm_contact_page_settings'    );
} );

/* ============================================================
   4. ADMIN CSS + JS  (inline — no extra asset files needed)
============================================================ */

add_action( 'admin_head', function () {
	$screen = get_current_screen();
	if ( ! $screen || strpos( $screen->id, 'nm-contact' ) === false ) {
		return;
	}
	?>
<style id="nm-contact-admin-css">
/* ── Layout ── */
.nm-contact-wrap { max-width:1280px; }
.nm-contact-wrap h1 { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }

/* ── Stats bar ── */
.nm-stats-bar { display:flex; gap:10px; margin:16px 0 22px; flex-wrap:wrap; }
.nm-stat { flex:1; min-width:110px; background:#fff; border:1px solid #c3c4c7; border-radius:6px;
           padding:12px 16px; text-align:center; box-shadow:0 1px 3px rgba(0,0,0,.04); }
.nm-stat-num { display:block; font-size:24px; font-weight:700; line-height:1.1; color:#1d2327; }
.nm-stat-lbl { display:block; font-size:11px; text-transform:uppercase; letter-spacing:.5px; color:#646970; margin-top:3px; }
.nm-stat-new     .nm-stat-num { color:#1e40af; }
.nm-stat-replied .nm-stat-num { color:#166534; }
.nm-stat-spam    .nm-stat-num { color:#dc2626; }

/* ── Filters row ── */
.nm-extra-filters { display:flex; gap:8px; align-items:center; margin:8px 0 4px; }
.nm-extra-filters select { height:30px; }

/* ── Status pills ── */
.nm-status { display:inline-flex; align-items:center; padding:2px 9px; border-radius:100px;
             font-size:11px; font-weight:700; line-height:1.6; white-space:nowrap; }
.nm-status-new      { background:#dbeafe; color:#1e40af; }
.nm-status-read     { background:#f3f4f6; color:#374151; }
.nm-status-replied  { background:#dcfce7; color:#166534; }
.nm-status-spam     { background:#fee2e2; color:#dc2626; }
.nm-status-archived { background:#f1f5f9; color:#6b7280; }

/* ── Branch badge ── */
.nm-branch-badge { display:inline-block; padding:2px 9px; border-radius:100px;
                   font-size:11px; font-weight:700; color:#fff; white-space:nowrap; }

/* ── Sent indicators ── */
.nm-sent-ok { color:#166534; font-size:11px; display:block; }
.nm-sent-no { color:#9ca3af; font-size:11px; display:block; }

/* ── Spam score chip ── */
.nm-spam-score { font-size:10px; background:#fef2f2; color:#dc2626;
                 border-radius:4px; padding:1px 6px; margin-left:5px; font-weight:700; }

/* ── Single-view grid ── */
.nm-back-btn { font-size:13px; color:#646970; text-decoration:none; }
.nm-back-btn:hover { color:#1d2327; }
.nm-single-grid { display:grid; grid-template-columns:1fr 320px; gap:18px; align-items:start; margin-top:12px; }
@media(max-width:1100px){ .nm-single-grid { grid-template-columns:1fr; } }

/* ── Cards ── */
.nm-card { background:#fff; border:1px solid #c3c4c7; border-radius:6px;
           overflow:hidden; margin-bottom:14px; box-shadow:0 1px 3px rgba(0,0,0,.04); }
.nm-card:last-child { margin-bottom:0; }
.nm-card-header { padding:12px 18px; border-bottom:1px solid #f0f0f1;
                  display:flex; align-items:center; justify-content:space-between; gap:8px; }
.nm-card-header h2 { margin:0; font-size:16px; line-height:1.3; }
.nm-card-header h3 { margin:0; font-size:13px; font-weight:600; }
.nm-card-body  { padding:18px; }

/* ── Detail grid inside single view ── */
.nm-detail-grid { display:grid; grid-template-columns:130px 1fr; gap:8px 12px; margin:0; }
.nm-detail-grid dt { font-size:11px; font-weight:700; text-transform:uppercase;
                     color:#646970; padding-top:2px; }
.nm-detail-grid dd { margin:0; font-size:13px; word-break:break-all; }

/* ── Message box ── */
.nm-message-box { background:#f6f7f7; border-left:3px solid #1e40af;
                  padding:14px 16px; border-radius:0 6px 6px 0; margin-top:16px; }
.nm-message-box h3 { margin:0 0 8px; font-size:11px; font-weight:700;
                     text-transform:uppercase; color:#646970; }
.nm-message-box p { margin:0; font-size:14px; line-height:1.7; }

/* ── Sidebar panels ── */
.nm-email-actions hr  { border:none; border-top:1px solid #f0f0f1; margin:12px 0; }
.nm-email-status      { font-size:12px; margin-bottom:8px; }
.nm-danger-card .nm-card-header { background:#fef2f2; }
.nm-note-feedback     { font-size:12px; color:#166534; }
.nm-user-agent        { margin-top:10px; color:#9ca3af; font-size:11px; }

/* ── Feedback toast ── */
.nm-toast { position:fixed; bottom:24px; right:24px; padding:10px 20px;
            border-radius:6px; font-size:13px; font-weight:600; color:#fff;
            box-shadow:0 4px 12px rgba(0,0,0,.18); z-index:99999;
            transition:opacity .3s; }
.nm-toast-success { background:#166534; }
.nm-toast-error   { background:#dc2626; }
.nm-toast-hidden  { opacity:0; pointer-events:none; }

/* ── Settings form ── */
.nm-settings-form .form-table th { width:220px; vertical-align:top; padding-top:14px; }
.nm-settings-form .form-table td p.description { margin-top:5px; }
</style>
	<?php
} );

add_action( 'admin_footer', function () {
	$screen = get_current_screen();
	if ( ! $screen || strpos( $screen->id, 'nm-contact' ) === false ) {
		return;
	}
	?>
<script id="nm-contact-admin-js">
(function($){
	const aj    = ajaxurl;
	const nonce = <?php echo wp_json_encode( wp_create_nonce( 'nm_admin_nonce' ) ); ?>;

	/* ── Toast helper ── */
	function toast(msg, type = 'success'){
		let t = document.getElementById('nm-admin-toast');
		if(!t){ t = document.createElement('div'); t.id='nm-admin-toast'; document.body.appendChild(t); }
		t.className = 'nm-toast nm-toast-' + type;
		t.textContent = msg;
		clearTimeout(t._timer);
		t._timer = setTimeout(()=>{ t.classList.add('nm-toast-hidden'); }, 3000);
	}

	/* ── Confirm delete ── */
	$(document).on('click','.nm-delete-link',function(e){
		if(!confirm(<?php echo wp_json_encode( __( 'Delete this submission permanently? This cannot be undone.', 'nezer-motors' ) ); ?>)){
			e.preventDefault();
		}
	});

	/* ── Resend email ── */
	$(document).on('click','.nm-resend-btn',function(){
		const $b   = $(this);
		const id   = $b.data('id');
		const type = $b.data('type');
		const orig = $b.text();
		$b.prop('disabled',true).text(<?php echo wp_json_encode( __( 'Sending…', 'nezer-motors' ) ); ?>);
		$.post(aj,{ action:'nm_admin_resend', nonce, id, type },function(r){
			if(r.success){
				toast(<?php echo wp_json_encode( __( 'Email sent!', 'nezer-motors' ) ); ?>,'success');
				// Update sent indicator next to button
				const $ind = $b.prev('.nm-email-status');
				if($ind.length) $ind.html('<span class="nm-sent-ok">✓ '+(type==='notification'?<?php echo wp_json_encode( __( 'Admin notification sent', 'nezer-motors' ) ); ?>:<?php echo wp_json_encode( __( 'Auto-reply sent to customer', 'nezer-motors' ) ); ?>)+'</span>');
			} else {
				toast(r.data || <?php echo wp_json_encode( __( 'Send failed. Check server mail settings.', 'nezer-motors' ) ); ?>,'error');
			}
			$b.prop('disabled',false).text(orig);
		}).fail(()=>{ toast(<?php echo wp_json_encode( __( 'Request failed.', 'nezer-motors' ) ); ?>,'error'); $b.prop('disabled',false).text(orig); });
	});

	/* ── Update status ── */
	$(document).on('click','.nm-save-status',function(){
		const $b   = $(this);
		const sel  = document.getElementById('nm-status-select');
		$.post(aj,{ action:'nm_admin_update_status', nonce, id: sel.dataset.id, status: sel.value },function(r){
			r.success ? toast(<?php echo wp_json_encode( __( 'Status updated.', 'nezer-motors' ) ); ?>,'success')
			          : toast(<?php echo wp_json_encode( __( 'Update failed.', 'nezer-motors' ) ); ?>,'error');
		});
	});

	/* ── Save admin note ── */
	$(document).on('click','.nm-save-note',function(){
		const $b  = $(this);
		const id  = $b.data('id');
		const $fb = $b.siblings('.nm-note-feedback');
		$.post(aj,{ action:'nm_admin_save_note', nonce, id, note:$('#nm-admin-notes').val() },function(r){
			if(r.success){
				$fb.text(<?php echo wp_json_encode( __( 'Saved.', 'nezer-motors' ) ); ?>).show();
				setTimeout(()=>$fb.hide(),2000);
			} else {
				toast(<?php echo wp_json_encode( __( 'Save failed.', 'nezer-motors' ) ); ?>,'error');
			}
		});
	});

	/* ── Quick inline status change (list table) ── */
	$(document).on('change','.nm-quick-status',function(){
		const $s = $(this);
		$.post(aj,{ action:'nm_admin_update_status', nonce, id:$s.data('id'), status:$s.val() },function(r){
			r.success ? toast(<?php echo wp_json_encode( __( 'Status updated.', 'nezer-motors' ) ); ?>,'success')
			          : toast(<?php echo wp_json_encode( __( 'Update failed.', 'nezer-motors' ) ); ?>,'error');
		});
	});
}(jQuery));
</script>
	<?php
} );

/* ============================================================
   5. WP_LIST_TABLE — SUBMISSIONS TABLE
============================================================ */

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class NM_Contact_List_Table extends WP_List_Table {

	public function __construct() {
		parent::__construct( [
			'singular' => 'submission',
			'plural'   => 'submissions',
			'ajax'     => false,
		] );
	}

	/* ── Columns ── */

	public function get_columns(): array {
		return [
			'cb'      => '<input type="checkbox">',
			'id'      => '#',
			'name'    => __( 'Name', 'nezer-motors' ),
			'email'   => __( 'Email / Phone', 'nezer-motors' ),
			'branch'  => __( 'Branch', 'nezer-motors' ),
			'message' => __( 'Message', 'nezer-motors' ),
			'status'  => __( 'Status', 'nezer-motors' ),
			'sent'    => __( 'Emails', 'nezer-motors' ),
			'date'    => __( 'Received', 'nezer-motors' ),
		];
	}

	public function get_sortable_columns(): array {
		return [
			'id'     => [ 'id',         true ],
			'name'   => [ 'name',       false ],
			'email'  => [ 'email',      false ],
			'branch' => [ 'branch',     false ],
			'status' => [ 'status',     false ],
			'date'   => [ 'created_at', true ],
		];
	}

	/* ── Bulk actions ── */

	protected function get_bulk_actions(): array {
		return [
			'mark_read'    => __( 'Mark as Read',     'nezer-motors' ),
			'mark_replied' => __( 'Mark as Replied',  'nezer-motors' ),
			'mark_new'     => __( 'Mark as New',      'nezer-motors' ),
			'mark_spam'    => __( 'Mark as Spam',     'nezer-motors' ),
			'archive'      => __( 'Archive',           'nezer-motors' ),
			'export'       => __( 'Export as CSV',     'nezer-motors' ),
			'delete'       => __( 'Delete Permanently','nezer-motors' ),
		];
	}

	/* ── Status filter tabs ── */

	protected function get_views(): array {
		global $wpdb;
		$t       = nm_ct();
		$current = sanitize_key( $_GET['status'] ?? '' );
		$rows    = $wpdb->get_results( "SELECT status, COUNT(*) AS cnt FROM {$t} GROUP BY status", OBJECT_K );
		$total   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$t}" );

		$statuses = [
			''         => __( 'All',      'nezer-motors' ),
			'new'      => __( 'New',      'nezer-motors' ),
			'read'     => __( 'Read',     'nezer-motors' ),
			'replied'  => __( 'Replied',  'nezer-motors' ),
			'spam'     => __( 'Spam',     'nezer-motors' ),
			'archived' => __( 'Archived', 'nezer-motors' ),
		];

		$views = [];
		foreach ( $statuses as $key => $label ) {
			$count = $key === '' ? $total : (int) ( $rows[ $key ]->cnt ?? 0 );
			$url   = admin_url( 'admin.php?page=nm-contact' . ( $key ? '&status=' . $key : '' ) );
			$class = $key === $current ? 'current' : '';
			$views[ $key ?: 'all' ] = sprintf(
				'<a href="%s" class="%s">%s <span class="count">(%s)</span></a>',
				esc_url( $url ),
				esc_attr( $class ),
				esc_html( $label ),
				number_format_i18n( $count )
			);
		}
		return $views;
	}

	/* ── Column renderers ── */

	protected function column_default( $item, $col ): string {
		return esc_html( $item->$col ?? '—' );
	}

	protected function column_cb( $item ): string {
		return '<input type="checkbox" name="submission_ids[]" value="' . (int) $item->id . '">';
	}

	protected function column_id( $item ): string {
		return '<strong>#' . (int) $item->id . '</strong>';
	}

	protected function column_name( $item ): string {
		$view_url   = admin_url( 'admin.php?page=nm-contact&view=' . (int) $item->id );
		$delete_url = wp_nonce_url(
			admin_url( 'admin.php?page=nm-contact&action=delete&id=' . (int) $item->id ),
			'nm_delete_' . $item->id
		);

		$score = (int) $item->spam_score;
		$chip  = $score > 0
			? ' <span class="nm-spam-score" title="' . esc_attr__( 'Spam score', 'nezer-motors' ) . '">⚠ ' . $score . '</span>'
			: '';

		$name_html = '<strong><a href="' . esc_url( $view_url ) . '">' . esc_html( $item->name ) . '</a></strong>' . $chip;

		$actions = [
			'view'   => '<a href="' . esc_url( $view_url ) . '">' . __( 'View', 'nezer-motors' ) . '</a>',
			'delete' => '<a href="' . esc_url( $delete_url ) . '" class="nm-delete-link" style="color:#dc2626;">' . __( 'Delete', 'nezer-motors' ) . '</a>',
		];

		return $name_html . $this->row_actions( $actions );
	}

	protected function column_email( $item ): string {
		$out = '<a href="mailto:' . esc_attr( $item->email ) . '">' . esc_html( $item->email ) . '</a>';
		if ( $item->phone ) {
			$out .= '<br><span class="description">' . esc_html( $item->phone ) . '</span>';
		}
		return $out;
	}

	protected function column_branch( $item ): string {
		$is_qf   = stripos( $item->branch, 'qwikfix' ) !== false;
		$color   = $is_qf ? '#dc2626' : '#1e40af';
		$vehicle = $item->vehicle
			? '<br><span class="description" style="font-size:11px;">' . esc_html( $item->vehicle ) . '</span>'
			: '';
		return '<span class="nm-branch-badge" style="background:' . esc_attr( $color ) . '">' . esc_html( $item->branch ) . '</span>' . $vehicle;
	}

	protected function column_message( $item ): string {
		return '<span title="' . esc_attr( $item->message ) . '">' . esc_html( wp_trim_words( $item->message, 14, '…' ) ) . '</span>';
	}

	protected function column_status( $item ): string {
		$statuses = [
			'new'      => [ __( 'New',      'nezer-motors' ), 'nm-status-new'      ],
			'read'     => [ __( 'Read',     'nezer-motors' ), 'nm-status-read'     ],
			'replied'  => [ __( 'Replied',  'nezer-motors' ), 'nm-status-replied'  ],
			'spam'     => [ __( 'Spam',     'nezer-motors' ), 'nm-status-spam'     ],
			'archived' => [ __( 'Archived', 'nezer-motors' ), 'nm-status-archived' ],
		];
		[ $label, $class ] = $statuses[ $item->status ] ?? $statuses['read'];

		// Quick-change dropdown
		$select = '<select class="nm-quick-status" data-id="' . (int) $item->id . '" style="margin-top:4px;font-size:11px;">';
		foreach ( $statuses as $val => [ $lbl ] ) {
			$select .= '<option value="' . esc_attr( $val ) . '"' . selected( $item->status, $val, false ) . '>' . esc_html( $lbl ) . '</option>';
		}
		$select .= '</select>';

		return '<span class="nm-status ' . esc_attr( $class ) . '">' . esc_html( $label ) . '</span><br>' . $select;
	}

	protected function column_sent( $item ): string {
		$n = $item->notif_sent
			? '<span class="nm-sent-ok">✉ ' . __( 'Admin', 'nezer-motors' ) . '</span>'
			: '<span class="nm-sent-no">✗ ' . __( 'Admin', 'nezer-motors' ) . '</span>';
		$r = $item->reply_sent
			? '<span class="nm-sent-ok">✉ ' . __( 'Reply', 'nezer-motors' ) . '</span>'
			: '<span class="nm-sent-no">✗ ' . __( 'Reply', 'nezer-motors' ) . '</span>';
		return $n . $r;
	}

	protected function column_date( $item ): string {
		$ts  = strtotime( $item->created_at );
		$ago = human_time_diff( $ts, current_time( 'timestamp' ) );
		return '<span title="' . esc_attr( wp_date( 'j M Y, H:i', $ts ) ) . '">' . esc_html( $ago ) . ' ' . __( 'ago', 'nezer-motors' ) . '</span>'
			. '<br><span class="description" style="font-size:11px;">' . esc_html( $item->ip_address ) . '</span>';
	}

	/* ── prepare_items ── */

	public function prepare_items(): void {
		global $wpdb;
		$t        = nm_ct();
		$per_page = 20;
		$paged    = max( 1, (int) ( $_GET['paged']  ?? 1 ) );
		$search   = sanitize_text_field( $_GET['s']      ?? '' );
		$status   = sanitize_key( $_GET['status']        ?? '' );
		$branch   = sanitize_text_field( $_GET['branch'] ?? '' );

		$allowed_order = [ 'id', 'name', 'email', 'branch', 'status', 'created_at' ];
		$orderby = in_array( $_GET['orderby'] ?? '', $allowed_order, true ) ? $_GET['orderby'] : 'created_at';
		$order   = strtoupper( $_GET['order'] ?? 'DESC' ) === 'ASC' ? 'ASC' : 'DESC';

		$where  = [ '1=1' ];
		$params = [];

		if ( $status ) {
			$where[]  = 'status = %s';
			$params[] = $status;
		}
		if ( $search ) {
			$like     = '%' . $wpdb->esc_like( $search ) . '%';
			$where[]  = '(name LIKE %s OR email LIKE %s OR message LIKE %s OR phone LIKE %s)';
			$params   = array_merge( $params, [ $like, $like, $like, $like ] );
		}
		if ( $branch ) {
			$where[]  = 'branch LIKE %s';
			$params[] = '%' . $wpdb->esc_like( $branch ) . '%';
		}

		$where_sql = implode( ' AND ', $where );

		$total = $params
			? (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$t} WHERE {$where_sql}", $params ) )
			: (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$t} WHERE {$where_sql}" );

		$offset   = ( $paged - 1 ) * $per_page;
		$q_params = array_merge( $params, [ $per_page, $offset ] );
		$this->items = $wpdb->get_results(
			$wpdb->prepare( "SELECT * FROM {$t} WHERE {$where_sql} ORDER BY {$orderby} {$order} LIMIT %d OFFSET %d", $q_params )
		);

		$this->set_pagination_args( [
			'total_items' => $total,
			'per_page'    => $per_page,
			'total_pages' => (int) ceil( $total / $per_page ),
		] );

		$this->_column_headers = [ $this->get_columns(), [], $this->get_sortable_columns() ];
	}
}

/* ============================================================
   6. PAGE — SUBMISSIONS LIST
============================================================ */

function nm_contact_page_submissions(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'Insufficient permissions.', 'nezer-motors' ) );
	}

	/* ── Row action: single delete ── */
	if ( isset( $_GET['action'], $_GET['id'] ) && $_GET['action'] === 'delete' ) {
		$id = (int) $_GET['id'];
		check_admin_referer( 'nm_delete_' . $id );
		global $wpdb;
		$wpdb->delete( nm_ct(), [ 'id' => $id ], [ '%d' ] );
		wp_redirect( admin_url( 'admin.php?page=nm-contact&deleted=1' ) );
		exit;
	}

	/* ── Single submission view ── */
	if ( isset( $_GET['view'] ) ) {
		nm_contact_render_single( (int) $_GET['view'] );
		return;
	}

	/* ── Bulk actions ── */
	nm_contact_handle_bulk();

	/* ── Stats ── */
	global $wpdb;
	$t      = nm_ct();
	$counts = $wpdb->get_results( "SELECT status, COUNT(*) AS cnt FROM {$t} GROUP BY status", OBJECT_K );
	$total  = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$t}" );
	$new_c  = (int) ( $counts['new']->cnt     ?? 0 );
	$rep_c  = (int) ( $counts['replied']->cnt ?? 0 );
	$spam_c = (int) ( $counts['spam']->cnt    ?? 0 );

	/* ── Branch filter options ── */
	$branches       = $wpdb->get_col( "SELECT DISTINCT branch FROM {$t} ORDER BY branch" );
	$current_branch = sanitize_text_field( $_GET['branch'] ?? '' );
	$current_status = sanitize_key( $_GET['status'] ?? '' );

	/* ── Build export URL ── */
	$export_url = add_query_arg( [
		'page'            => 'nm-contact',
		'nm_export'       => '1',
		'nm_export_nonce' => wp_create_nonce( 'nm_export' ),
		'status'          => $current_status,
		'branch'          => $current_branch,
		's'               => sanitize_text_field( $_GET['s'] ?? '' ),
	], admin_url( 'admin.php' ) );

	$table = new NM_Contact_List_Table();
	$table->prepare_items();
	?>
	<div class="wrap nm-contact-wrap">
		<h1 class="wp-heading-inline"><?php esc_html_e( 'Contact Form Submissions', 'nezer-motors' ); ?></h1>
		<a href="<?php echo esc_url( $export_url ); ?>" class="page-title-action">⬇ <?php esc_html_e( 'Export CSV', 'nezer-motors' ); ?></a>
		<hr class="wp-header-end">

		<?php if ( isset( $_GET['deleted'] ) ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php esc_html_e( 'Submission deleted.', 'nezer-motors' ); ?></p></div>
		<?php endif; ?>
		<?php if ( isset( $_GET['bulk_done'] ) ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php printf( esc_html__( '%d submission(s) updated.', 'nezer-motors' ), (int) $_GET['bulk_done'] ); ?></p></div>
		<?php endif; ?>

		<!-- Stats bar -->
		<div class="nm-stats-bar">
			<div class="nm-stat">
				<span class="nm-stat-num"><?php echo number_format_i18n( $total ); ?></span>
				<span class="nm-stat-lbl"><?php esc_html_e( 'Total', 'nezer-motors' ); ?></span>
			</div>
			<div class="nm-stat nm-stat-new">
				<span class="nm-stat-num"><?php echo number_format_i18n( $new_c ); ?></span>
				<span class="nm-stat-lbl"><?php esc_html_e( 'New', 'nezer-motors' ); ?></span>
			</div>
			<div class="nm-stat nm-stat-replied">
				<span class="nm-stat-num"><?php echo number_format_i18n( $rep_c ); ?></span>
				<span class="nm-stat-lbl"><?php esc_html_e( 'Replied', 'nezer-motors' ); ?></span>
			</div>
			<div class="nm-stat nm-stat-spam">
				<span class="nm-stat-num"><?php echo number_format_i18n( $spam_c ); ?></span>
				<span class="nm-stat-lbl"><?php esc_html_e( 'Spam', 'nezer-motors' ); ?></span>
			</div>
		</div>

		<!-- Submissions table -->
		<form id="nm-submissions-form" method="get">
			<input type="hidden" name="page" value="nm-contact">
			<?php if ( $current_status ) : ?>
				<input type="hidden" name="status" value="<?php echo esc_attr( $current_status ); ?>">
			<?php endif; ?>

			<!-- Branch filter -->
			<div class="nm-extra-filters">
				<label for="nm-branch-filter" class="screen-reader-text"><?php esc_html_e( 'Filter by branch', 'nezer-motors' ); ?></label>
				<select id="nm-branch-filter" name="branch" onchange="this.form.submit()">
					<option value=""><?php esc_html_e( 'All Branches', 'nezer-motors' ); ?></option>
					<?php foreach ( $branches as $b ) : ?>
						<option value="<?php echo esc_attr( $b ); ?>" <?php selected( $current_branch, $b ); ?>>
							<?php echo esc_html( $b ); ?>
						</option>
					<?php endforeach; ?>
				</select>
				<?php if ( $current_branch || $current_status || isset( $_GET['s'] ) ) : ?>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=nm-contact' ) ); ?>" class="button button-small">
						<?php esc_html_e( '✕ Clear filters', 'nezer-motors' ); ?>
					</a>
				<?php endif; ?>
			</div>

			<?php
			$table->views();
			$table->search_box( __( 'Search submissions', 'nezer-motors' ), 'nm-search' );
			$table->display();
			?>
		</form>
	</div>
	<?php
}

/* ============================================================
   7. PAGE — SINGLE SUBMISSION VIEW
============================================================ */

function nm_contact_render_single( int $id ): void {
	global $wpdb;
	$sub = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . nm_ct() . ' WHERE id = %d', $id ) );

	if ( ! $sub ) {
		echo '<div class="wrap"><div class="notice notice-error"><p>' . esc_html__( 'Submission not found.', 'nezer-motors' ) . '</p></div></div>';
		return;
	}

	// Auto-mark as read on first view
	if ( $sub->status === 'new' ) {
		$wpdb->update( nm_ct(),
			[ 'status' => 'read', 'updated_at' => current_time( 'mysql' ) ],
			[ 'id'     => $id ],
			[ '%s', '%s' ],
			[ '%d' ]
		);
		$sub->status = 'read';
	}

	$is_qf      = stripos( $sub->branch, 'qwikfix' ) !== false;
	$accent     = $is_qf ? '#dc2626' : '#1e40af';
	$sent_at    = wp_date( 'j F Y, g:i A', strtotime( $sub->created_at ) );
	$updated_at = wp_date( 'j F Y, g:i A', strtotime( $sub->updated_at ) );
	$back_url   = admin_url( 'admin.php?page=nm-contact' );
	$del_url    = wp_nonce_url(
		admin_url( 'admin.php?page=nm-contact&action=delete&id=' . $id ),
		'nm_delete_' . $id
	);
	$mail_url   = 'mailto:' . rawurlencode( $sub->email )
		. '?subject=' . rawurlencode( 'Re: Your enquiry about ' . $sub->branch );
	?>
	<div class="wrap nm-contact-wrap nm-single-wrap">
		<h1>
			<a href="<?php echo esc_url( $back_url ); ?>" class="nm-back-btn">&#8592; <?php esc_html_e( 'All Submissions', 'nezer-motors' ); ?></a>
			<?php printf( esc_html__( 'Submission #%d', 'nezer-motors' ), $id ); ?>
			<span class="nm-branch-badge" style="background:<?php echo esc_attr( $accent ); ?>;"><?php echo esc_html( $sub->branch ); ?></span>
		</h1>
		<hr class="wp-header-end">

		<div class="nm-single-grid">

			<!-- ── LEFT: Full details ── -->
			<div class="nm-single-main">
				<div class="nm-card">
					<div class="nm-card-header" style="border-left:4px solid <?php echo esc_attr( $accent ); ?>;">
						<h2><?php echo esc_html( $sub->name ); ?></h2>
						<span style="font-size:12px;color:#646970;"><?php echo esc_html( $sent_at ); ?></span>
					</div>
					<div class="nm-card-body">
						<dl class="nm-detail-grid">
							<dt><?php esc_html_e( 'Email', 'nezer-motors' ); ?></dt>
							<dd><a href="mailto:<?php echo esc_attr( $sub->email ); ?>"><?php echo esc_html( $sub->email ); ?></a></dd>

							<dt><?php esc_html_e( 'Phone', 'nezer-motors' ); ?></dt>
							<dd><?php echo $sub->phone ? esc_html( $sub->phone ) : '<em style="color:#9ca3af;">—</em>'; ?></dd>

							<dt><?php esc_html_e( 'Branch', 'nezer-motors' ); ?></dt>
							<dd><?php echo esc_html( $sub->branch ); ?></dd>

							<dt><?php esc_html_e( 'Vehicle', 'nezer-motors' ); ?></dt>
							<dd><?php echo $sub->vehicle ? esc_html( $sub->vehicle ) : '<em style="color:#9ca3af;">—</em>'; ?></dd>

							<dt><?php esc_html_e( 'IP Address', 'nezer-motors' ); ?></dt>
							<dd>
								<?php echo esc_html( $sub->ip_address ); ?>
								<?php if ( $sub->ip_address ) : ?>
									<a href="https://whatismyipaddress.com/ip/<?php echo esc_attr( $sub->ip_address ); ?>" target="_blank" rel="noopener" style="font-size:11px;margin-left:6px;"><?php esc_html_e( 'Look up ↗', 'nezer-motors' ); ?></a>
								<?php endif; ?>
							</dd>

							<dt><?php esc_html_e( 'Spam Score', 'nezer-motors' ); ?></dt>
							<dd>
								<?php
								$score = (int) $sub->spam_score;
								$color = $score >= 5 ? '#dc2626' : ( $score >= 2 ? '#d97706' : '#166534' );
								echo '<strong style="color:' . esc_attr( $color ) . '">' . $score . '/10</strong>';
								if ( $sub->honeypot_flag ) {
									echo ' <span class="nm-spam-score">🪤 ' . esc_html__( 'Honeypot triggered', 'nezer-motors' ) . '</span>';
								}
								?>
							</dd>

							<dt><?php esc_html_e( 'Referrer', 'nezer-motors' ); ?></dt>
							<dd><?php echo $sub->referer ? '<a href="' . esc_url( $sub->referer ) . '" target="_blank" rel="noopener">' . esc_html( $sub->referer ) . '</a>' : '<em style="color:#9ca3af;">—</em>'; ?></dd>

							<dt><?php esc_html_e( 'Last updated', 'nezer-motors' ); ?></dt>
							<dd><?php echo esc_html( $updated_at ); ?></dd>
						</dl>

						<!-- Message -->
						<div class="nm-message-box" style="border-left-color:<?php echo esc_attr( $accent ); ?>;">
							<h3><?php esc_html_e( 'Message', 'nezer-motors' ); ?></h3>
							<p><?php echo nl2br( esc_html( $sub->message ) ); ?></p>
						</div>

						<!-- User agent -->
						<div class="nm-user-agent">
							<strong><?php esc_html_e( 'User Agent:', 'nezer-motors' ); ?></strong>
							<?php echo esc_html( $sub->user_agent ?: '—' ); ?>
						</div>
					</div>
				</div>
			</div><!-- /.nm-single-main -->

			<!-- ── RIGHT: Action sidebar ── -->
			<div class="nm-single-sidebar">

				<!-- Status -->
				<div class="nm-card">
					<div class="nm-card-header"><h3><?php esc_html_e( 'Status', 'nezer-motors' ); ?></h3></div>
					<div class="nm-card-body">
						<select id="nm-status-select" data-id="<?php echo (int) $id; ?>" class="widefat">
							<?php foreach ( [ 'new' => 'New', 'read' => 'Read', 'replied' => 'Replied', 'spam' => 'Spam', 'archived' => 'Archived' ] as $v => $l ) : ?>
								<option value="<?php echo esc_attr( $v ); ?>" <?php selected( $sub->status, $v ); ?>><?php echo esc_html( $l ); ?></option>
							<?php endforeach; ?>
						</select>
						<button class="button button-primary nm-save-status" style="margin-top:8px;width:100%;">
							<?php esc_html_e( 'Update Status', 'nezer-motors' ); ?>
						</button>
					</div>
				</div>

				<!-- Email actions -->
				<div class="nm-card">
					<div class="nm-card-header"><h3><?php esc_html_e( 'Email Actions', 'nezer-motors' ); ?></h3></div>
					<div class="nm-card-body nm-email-actions">
						<div class="nm-email-status">
							<?php if ( $sub->notif_sent ) : ?>
								<span class="nm-sent-ok">✓ <?php esc_html_e( 'Admin notification sent', 'nezer-motors' ); ?></span>
							<?php else : ?>
								<span class="nm-sent-no">✗ <?php esc_html_e( 'Admin notification not sent', 'nezer-motors' ); ?></span>
							<?php endif; ?>
						</div>
						<button class="button widefat nm-resend-btn"
							data-id="<?php echo (int) $id; ?>"
							data-type="notification">
							<?php esc_html_e( 'Resend Admin Notification', 'nezer-motors' ); ?>
						</button>

						<hr>

						<div class="nm-email-status">
							<?php if ( $sub->reply_sent ) : ?>
								<span class="nm-sent-ok">✓ <?php esc_html_e( 'Auto-reply sent to customer', 'nezer-motors' ); ?></span>
							<?php else : ?>
								<span class="nm-sent-no">✗ <?php esc_html_e( 'Auto-reply not sent', 'nezer-motors' ); ?></span>
							<?php endif; ?>
						</div>
						<button class="button widefat nm-resend-btn"
							data-id="<?php echo (int) $id; ?>"
							data-type="autoreply">
							<?php esc_html_e( 'Resend Auto-Reply to Customer', 'nezer-motors' ); ?>
						</button>

						<hr>

						<a href="<?php echo esc_url( $mail_url ); ?>"
							class="button widefat">
							✉ <?php esc_html_e( 'Open in Mail Client', 'nezer-motors' ); ?>
						</a>
					</div>
				</div>

				<!-- Admin notes -->
				<div class="nm-card">
					<div class="nm-card-header"><h3><?php esc_html_e( 'Admin Notes', 'nezer-motors' ); ?></h3></div>
					<div class="nm-card-body">
						<textarea id="nm-admin-notes" class="widefat" rows="5"
							placeholder="<?php esc_attr_e( 'Internal notes visible only to admins…', 'nezer-motors' ); ?>"
							><?php echo esc_textarea( $sub->admin_notes ?? '' ); ?></textarea>
						<div style="display:flex;align-items:center;gap:8px;margin-top:8px;">
							<button class="button nm-save-note" data-id="<?php echo (int) $id; ?>">
								<?php esc_html_e( 'Save Note', 'nezer-motors' ); ?>
							</button>
							<span class="nm-note-feedback" style="display:none;"></span>
						</div>
					</div>
				</div>

				<!-- Danger zone -->
				<div class="nm-card nm-danger-card">
					<div class="nm-card-header"><h3><?php esc_html_e( 'Danger Zone', 'nezer-motors' ); ?></h3></div>
					<div class="nm-card-body">
						<a href="<?php echo esc_url( $del_url ); ?>"
							class="button button-link-delete nm-delete-link"
							style="width:100%;text-align:center;display:block;">
							<?php esc_html_e( 'Delete This Submission', 'nezer-motors' ); ?>
						</a>
					</div>
				</div>

			</div><!-- /.nm-single-sidebar -->
		</div><!-- /.nm-single-grid -->
	</div>
	<?php
}

/* ============================================================
   8. BULK ACTION HANDLER
============================================================ */

function nm_contact_handle_bulk(): void {
	if ( empty( $_POST['submission_ids'] ) ) {
		return;
	}
	check_admin_referer( 'bulk-submissions' );

	$action = sanitize_key( $_POST['action'] !== '-1' ? $_POST['action'] : ( $_POST['action2'] ?? '-1' ) );
	if ( $action === '-1' ) {
		return;
	}

	$ids  = array_map( 'intval', (array) $_POST['submission_ids'] );
	if ( empty( $ids ) ) {
		return;
	}

	global $wpdb;
	$t    = nm_ct();
	$ph   = implode( ',', array_fill( 0, count( $ids ), '%d' ) );
	$done = 0;

	if ( $action === 'delete' ) {
		$done = (int) $wpdb->query( $wpdb->prepare( "DELETE FROM {$t} WHERE id IN ({$ph})", $ids ) );

	} elseif ( $action === 'export' ) {
		nm_contact_export_csv( $ids );
		exit;

	} else {
		$map = [
			'mark_read'    => 'read',
			'mark_replied' => 'replied',
			'mark_new'     => 'new',
			'mark_spam'    => 'spam',
			'archive'      => 'archived',
		];
		if ( isset( $map[ $action ] ) ) {
			$done = (int) $wpdb->query(
				$wpdb->prepare(
					"UPDATE {$t} SET status = %s, updated_at = %s WHERE id IN ({$ph})",
					array_merge( [ $map[ $action ], current_time( 'mysql' ) ], $ids )
				)
			);
		}
	}

	wp_redirect( add_query_arg( 'bulk_done', $done, admin_url( 'admin.php?page=nm-contact' ) ) );
	exit;
}

/* ============================================================
   9. CSV EXPORT
============================================================ */

/**
 * Stream a CSV of submissions to the browser.
 *
 * @param int[] $ids  Specific IDs, or empty for all.
 */
function nm_contact_export_csv( array $ids = [] ): void {
	global $wpdb;
	$t = nm_ct();

	// Apply any active filters when exporting all
	if ( $ids ) {
		$ph   = implode( ',', array_fill( 0, count( $ids ), '%d' ) );
		$rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$t} WHERE id IN ({$ph}) ORDER BY created_at DESC", $ids ), ARRAY_A );
	} else {
		$where  = [ '1=1' ];
		$params = [];
		if ( isset( $_GET['status'] ) && $_GET['status'] ) {
			$where[]  = 'status = %s';
			$params[] = sanitize_key( $_GET['status'] );
		}
		if ( isset( $_GET['branch'] ) && $_GET['branch'] ) {
			$where[]  = 'branch LIKE %s';
			$params[] = '%' . $wpdb->esc_like( sanitize_text_field( $_GET['branch'] ) ) . '%';
		}
		if ( isset( $_GET['s'] ) && $_GET['s'] ) {
			$like     = '%' . $wpdb->esc_like( sanitize_text_field( $_GET['s'] ) ) . '%';
			$where[]  = '(name LIKE %s OR email LIKE %s OR message LIKE %s)';
			$params   = array_merge( $params, [ $like, $like, $like ] );
		}
		$w_sql = implode( ' AND ', $where );
		$rows  = $params
			? $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$t} WHERE {$w_sql} ORDER BY created_at DESC", $params ), ARRAY_A )
			: $wpdb->get_results( "SELECT * FROM {$t} WHERE {$w_sql} ORDER BY created_at DESC", ARRAY_A );
	}

	$filename = 'nm-submissions-' . wp_date( 'Y-m-d-His' ) . '.csv';
	header( 'Content-Type: text/csv; charset=UTF-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );
	header( 'Pragma: no-cache' );
	header( 'Expires: 0' );

	$out = fopen( 'php://output', 'w' );
	// UTF-8 BOM for Excel compatibility
	fputs( $out, "\xEF\xBB\xBF" );
	if ( $rows ) {
		fputcsv( $out, array_keys( $rows[0] ) );
		foreach ( $rows as $row ) {
			fputcsv( $out, $row );
		}
	}
	fclose( $out );
}

// Handle export triggered via admin page link (GET request)
add_action( 'admin_init', function () {
	if (
		! isset( $_GET['page'], $_GET['nm_export'] ) ||
		$_GET['page'] !== 'nm-contact' ||
		! current_user_can( 'manage_options' )
	) {
		return;
	}
	check_admin_referer( 'nm_export', 'nm_export_nonce' );
	nm_contact_export_csv();
	exit;
} );

/* ============================================================
   10. PAGE — SETTINGS
============================================================ */

function nm_contact_page_settings(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'No permission.', 'nezer-motors' ) );
	}

	/* ── Save settings ── */
	if ( isset( $_POST['nm_settings_save'] ) ) {
		check_admin_referer( 'nm_contact_settings_save' );

		$raw   = $_POST['nm'] ?? [];
		$clean = [
			'recipients'        => sanitize_text_field( $raw['recipients']    ?? '' ),
			'auto_reply'        => isset( $raw['auto_reply'] )        ? '1' : '0',
			'from_name'         => sanitize_text_field( $raw['from_name']     ?? 'Nezer Motors' ),
			'from_email'        => sanitize_email( $raw['from_email']         ?? '' ),
			'honeypot_field'    => sanitize_key( $raw['honeypot_field']       ?? 'website' ),
			'rate_limit'        => max( 1, (int) ( $raw['rate_limit']         ?? 5 ) ),
			'rate_window'       => max( 1, (int) ( $raw['rate_window']        ?? 60 ) ),
			'blocked_emails'    => sanitize_textarea_field( $raw['blocked_emails'] ?? '' ),
			'blocked_ips'       => sanitize_textarea_field( $raw['blocked_ips']    ?? '' ),
			'spam_words'        => sanitize_textarea_field( $raw['spam_words']     ?? '' ),
			'branch_recipients' => [
				'autocare' => sanitize_email( $raw['branch_recipients']['autocare'] ?? '' ),
				'qwikfix'  => sanitize_email( $raw['branch_recipients']['qwikfix']  ?? '' ),
			],
			'notif_subject'     => sanitize_text_field( $raw['notif_subject'] ?? '' ),
			'reply_subject'     => sanitize_text_field( $raw['reply_subject'] ?? '' ),
			'retention_days'    => max( 0, (int) ( $raw['retention_days']     ?? 90 ) ),
			'notify_on_spam'    => isset( $raw['notify_on_spam'] )    ? '1' : '0',
		];

		update_option( 'nm_contact_settings', $clean );
		// Bust settings cache
		// (static var in nm_cs() won't matter here — this is a page reload)
		?>
		<div class="notice notice-success is-dismissible"><p><?php esc_html_e( 'Settings saved.', 'nezer-motors' ); ?></p></div>
		<?php
		$s = $clean;
	} else {
		$s = nm_cs();
	}

	/* ── Delete spam ── */
	if ( isset( $_POST['nm_delete_spam'] ) ) {
		check_admin_referer( 'nm_contact_settings_save' );
		global $wpdb;
		$deleted = (int) $wpdb->query( "DELETE FROM " . nm_ct() . " WHERE status = 'spam'" );
		?>
		<div class="notice notice-success is-dismissible"><p><?php printf( esc_html__( '%d spam submission(s) permanently deleted.', 'nezer-motors' ), $deleted ); ?></p></div>
		<?php
	}

	/* ── Send test email ── */
	if ( isset( $_POST['nm_test_email'] ) ) {
		check_admin_referer( 'nm_contact_settings_save' );
		$to = get_option( 'admin_email' );
		$ok = wp_mail( $to, '[Nezer Motors] Test Email', '<p>If you received this, your WordPress mail is working correctly.</p>', [ 'Content-Type: text/html; charset=UTF-8' ] );
		$ok
			? printf( '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Test email sent to %s.', 'nezer-motors' ) . '</p></div>', esc_html( $to ) )
			: print( '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Test email failed. Check your server mail configuration.', 'nezer-motors' ) . '</p></div>' );
	}

	$tab  = sanitize_key( $_GET['tab'] ?? 'general' );
	$tabs = [
		'general'  => __( 'General',          'nezer-motors' ),
		'spam'     => __( 'Spam & Security',   'nezer-motors' ),
		'branches' => __( 'Branch Overrides',  'nezer-motors' ),
		'advanced' => __( 'Advanced',          'nezer-motors' ),
	];
	?>
	<div class="wrap nm-contact-wrap">
		<h1><?php esc_html_e( 'Contact Form Settings', 'nezer-motors' ); ?></h1>
		<hr class="wp-header-end">

		<nav class="nav-tab-wrapper" style="margin-bottom:20px;">
			<?php foreach ( $tabs as $key => $label ) : ?>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=nm-contact-settings&tab=' . $key ) ); ?>"
					class="nav-tab <?php echo $tab === $key ? 'nav-tab-active' : ''; ?>">
					<?php echo esc_html( $label ); ?>
				</a>
			<?php endforeach; ?>
		</nav>

		<form method="post" class="nm-settings-form">
			<?php wp_nonce_field( 'nm_contact_settings_save' ); ?>

			<?php if ( $tab === 'general' ) : ?>
			<!-- ── GENERAL ── -->
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="nm-recipients"><?php esc_html_e( 'Notification Recipients', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="text" id="nm-recipients" name="nm[recipients]"
							value="<?php echo esc_attr( $s['recipients'] ); ?>" class="regular-text">
						<p class="description"><?php esc_html_e( 'Comma-separated emails that receive new enquiry notifications. Leave blank to use the WordPress admin email.', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-from-name"><?php esc_html_e( 'From Name', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="text" id="nm-from-name" name="nm[from_name]"
							value="<?php echo esc_attr( $s['from_name'] ); ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-from-email"><?php esc_html_e( 'From Email', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="email" id="nm-from-email" name="nm[from_email]"
							value="<?php echo esc_attr( $s['from_email'] ); ?>" class="regular-text">
						<p class="description"><?php esc_html_e( 'Ensure this matches your authorised sending domain to avoid spam filters.', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Auto-Reply', 'nezer-motors' ); ?></th>
					<td>
						<label>
							<input type="checkbox" name="nm[auto_reply]" value="1" <?php checked( $s['auto_reply'], '1' ); ?>>
							<?php esc_html_e( 'Send a confirmation auto-reply email to the customer after they submit the form', 'nezer-motors' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-notif-subject"><?php esc_html_e( 'Notification Subject', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="text" id="nm-notif-subject" name="nm[notif_subject]"
							value="<?php echo esc_attr( $s['notif_subject'] ); ?>" class="large-text">
						<p class="description"><?php esc_html_e( 'Placeholders: {branch}, {name}', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-reply-subject"><?php esc_html_e( 'Auto-Reply Subject', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="text" id="nm-reply-subject" name="nm[reply_subject]"
							value="<?php echo esc_attr( $s['reply_subject'] ); ?>" class="large-text">
					</td>
				</tr>
			</table>

			<?php elseif ( $tab === 'spam' ) : ?>
			<!-- ── SPAM & SECURITY ── -->
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="nm-honeypot"><?php esc_html_e( 'Honeypot Field Name', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="text" id="nm-honeypot" name="nm[honeypot_field]"
							value="<?php echo esc_attr( $s['honeypot_field'] ); ?>" class="regular-text">
						<p class="description">
							<?php
							printf(
								/* translators: %s = current honeypot field name */
								esc_html__( 'Must match the hidden input name in your form HTML. Current form uses: %s', 'nezer-motors' ),
								'<code>' . esc_html( $s['honeypot_field'] ) . '</code>'
							);
							?>
						</p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Rate Limiting', 'nezer-motors' ); ?></th>
					<td>
						<?php esc_html_e( 'Max', 'nezer-motors' ); ?>
						<input type="number" name="nm[rate_limit]" value="<?php echo (int) $s['rate_limit']; ?>"
							min="1" max="999" style="width:65px;">
						<?php esc_html_e( 'submissions per', 'nezer-motors' ); ?>
						<input type="number" name="nm[rate_window]" value="<?php echo (int) $s['rate_window']; ?>"
							min="1" max="1440" style="width:70px;">
						<?php esc_html_e( 'minutes, per IP address.', 'nezer-motors' ); ?>
						<p class="description"><?php esc_html_e( 'Excess submissions receive a rate-limit error message rather than a silent discard.', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-blocked-emails"><?php esc_html_e( 'Blocked Emails / Domains', 'nezer-motors' ); ?></label></th>
					<td>
						<textarea id="nm-blocked-emails" name="nm[blocked_emails]" class="large-text" rows="5"><?php echo esc_textarea( $s['blocked_emails'] ); ?></textarea>
						<p class="description"><?php esc_html_e( 'One per line. Exact address (e.g. spam@foo.com) or domain prefix (e.g. @foo.com).', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-blocked-ips"><?php esc_html_e( 'Blocked IP Addresses', 'nezer-motors' ); ?></label></th>
					<td>
						<textarea id="nm-blocked-ips" name="nm[blocked_ips]" class="large-text" rows="5"><?php echo esc_textarea( $s['blocked_ips'] ); ?></textarea>
						<p class="description"><?php esc_html_e( 'One IPv4 or IPv6 address per line.', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-spam-words"><?php esc_html_e( 'Spam Keywords', 'nezer-motors' ); ?></label></th>
					<td>
						<textarea id="nm-spam-words" name="nm[spam_words]" class="large-text" rows="7"><?php echo esc_textarea( $s['spam_words'] ); ?></textarea>
						<p class="description"><?php esc_html_e( 'One keyword or phrase per line. Case-insensitive. Submissions containing these phrases accumulate spam score.', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Spam Notifications', 'nezer-motors' ); ?></th>
					<td>
						<label>
							<input type="checkbox" name="nm[notify_on_spam]" value="1" <?php checked( $s['notify_on_spam'], '1' ); ?>>
							<?php esc_html_e( 'Still send admin notification for submissions flagged as spam (so you can review borderline cases)', 'nezer-motors' ); ?>
						</label>
					</td>
				</tr>
			</table>

			<?php elseif ( $tab === 'branches' ) : ?>
			<!-- ── BRANCH OVERRIDES ── -->
			<p><?php esc_html_e( 'Override which email address receives notifications for each branch. Leave blank to use the primary recipients.', 'nezer-motors' ); ?></p>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="nm-br-autocare"><?php esc_html_e( 'AutoCare Express Recipient', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="email" id="nm-br-autocare"
							name="nm[branch_recipients][autocare]"
							value="<?php echo esc_attr( $s['branch_recipients']['autocare'] ?? '' ); ?>"
							class="regular-text"
							placeholder="<?php esc_attr_e( 'e.g. autocare@nezermotors.com', 'nezer-motors' ); ?>">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="nm-br-qwikfix"><?php esc_html_e( 'QwikFix Recipient', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="email" id="nm-br-qwikfix"
							name="nm[branch_recipients][qwikfix]"
							value="<?php echo esc_attr( $s['branch_recipients']['qwikfix'] ?? '' ); ?>"
							class="regular-text"
							placeholder="<?php esc_attr_e( 'e.g. qwikfix@nezermotors.com', 'nezer-motors' ); ?>">
					</td>
				</tr>
			</table>

			<?php elseif ( $tab === 'advanced' ) : ?>
			<!-- ── ADVANCED ── -->
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="nm-retention"><?php esc_html_e( 'Auto-Delete After', 'nezer-motors' ); ?></label></th>
					<td>
						<input type="number" id="nm-retention" name="nm[retention_days]"
							value="<?php echo (int) $s['retention_days']; ?>" min="0" max="3650" style="width:80px;">
						<?php esc_html_e( 'days &nbsp;(0 = never auto-delete)', 'nezer-motors' ); ?>
						<p class="description"><?php esc_html_e( 'A daily cron job will permanently delete submissions older than this. Spam is deleted after half this period.', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Test Email', 'nezer-motors' ); ?></th>
					<td>
						<button type="submit" name="nm_test_email" class="button">
							<?php esc_html_e( 'Send Test Email to Admin', 'nezer-motors' ); ?>
						</button>
						<p class="description"><?php printf( esc_html__( 'Sends a test email to %s using your current WordPress mail setup.', 'nezer-motors' ), esc_html( get_option( 'admin_email' ) ) ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Delete Spam', 'nezer-motors' ); ?></th>
					<td>
						<button type="submit" name="nm_delete_spam" class="button button-secondary"
							onclick="return confirm(<?php echo esc_js( __( 'Permanently delete all spam submissions?', 'nezer-motors' ) ); ?>)">
							<?php esc_html_e( 'Delete All Spam Submissions Now', 'nezer-motors' ); ?>
						</button>
						<p class="description"><?php esc_html_e( 'Immediately and permanently removes all submissions marked as Spam.', 'nezer-motors' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Database Table', 'nezer-motors' ); ?></th>
					<td>
						<code><?php echo esc_html( nm_ct() ); ?></code>
						<p class="description"><?php printf( esc_html__( 'Schema version: %s', 'nezer-motors' ), esc_html( NM_CONTACT_DB_VER ) ); ?></p>
					</td>
				</tr>
			</table>
			<?php endif; ?>

			<p class="submit">
				<input type="submit" name="nm_settings_save" class="button button-primary"
					value="<?php esc_attr_e( 'Save Settings', 'nezer-motors' ); ?>">
			</p>
		</form>
	</div>
	<?php
}

/* ============================================================
   11. AJAX HANDLERS — ADMIN
============================================================ */

/** Resend notification or auto-reply. */
add_action( 'wp_ajax_nm_admin_resend', function () {
	check_ajax_referer( 'nm_admin_nonce', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( 'Permission denied.', 403 );
	}

	$id   = (int) ( $_POST['id']   ?? 0 );
	$type = sanitize_key( $_POST['type'] ?? '' );

	global $wpdb;
	$sub = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . nm_ct() . ' WHERE id = %d', $id ) );
	if ( ! $sub ) {
		wp_send_json_error( __( 'Submission not found.', 'nezer-motors' ) );
	}

	$data = [
		'name'    => $sub->name,
		'email'   => $sub->email,
		'phone'   => $sub->phone,
		'branch'  => $sub->branch,
		'vehicle' => $sub->vehicle,
		'message' => $sub->message,
	];

	if ( $type === 'notification' ) {
		$ok = nezer_motors_send_contact_email( $data, $id );
	} elseif ( $type === 'autoreply' ) {
		$ok = nezer_motors_send_auto_reply( $sub->name, $sub->email, $sub->branch, $id );
	} else {
		wp_send_json_error( __( 'Invalid type.', 'nezer-motors' ) );
		return;
	}

	$ok
		? wp_send_json_success( __( 'Email sent successfully.', 'nezer-motors' ) )
		: wp_send_json_error( __( 'Email failed to send. Check your server mail configuration (e.g. use WP Mail SMTP).', 'nezer-motors' ) );
} );

/** Update submission status. */
add_action( 'wp_ajax_nm_admin_update_status', function () {
	check_ajax_referer( 'nm_admin_nonce', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( 'Permission denied.', 403 );
	}

	$id     = (int) ( $_POST['id']     ?? 0 );
	$status = sanitize_key( $_POST['status'] ?? '' );

	if ( ! in_array( $status, [ 'new', 'read', 'replied', 'spam', 'archived' ], true ) ) {
		wp_send_json_error( __( 'Invalid status value.', 'nezer-motors' ) );
	}

	global $wpdb;
	$ok = $wpdb->update(
		nm_ct(),
		[ 'status' => $status, 'updated_at' => current_time( 'mysql' ) ],
		[ 'id'     => $id ],
		[ '%s', '%s' ],
		[ '%d' ]
	);

	$ok !== false ? wp_send_json_success() : wp_send_json_error();
} );

/** Save admin note on a submission. */
add_action( 'wp_ajax_nm_admin_save_note', function () {
	check_ajax_referer( 'nm_admin_nonce', 'nonce' );
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( 'Permission denied.', 403 );
	}

	$id   = (int) ( $_POST['id']   ?? 0 );
	$note = sanitize_textarea_field( wp_unslash( $_POST['note'] ?? '' ) );

	global $wpdb;
	$ok = $wpdb->update(
		nm_ct(),
		[ 'admin_notes' => $note, 'updated_at' => current_time( 'mysql' ) ],
		[ 'id'          => $id ],
		[ '%s', '%s' ],
		[ '%d' ]
	);

	$ok !== false ? wp_send_json_success() : wp_send_json_error();
} );

/* ============================================================
   12. AUTO-DELETE CRON
============================================================ */

add_filter( 'cron_schedules', function ( array $s ): array {
	$s['nm_daily'] = [
		'interval' => DAY_IN_SECONDS,
		'display'  => __( 'Once Daily — Nezer Motors', 'nezer-motors' ),
	];
	return $s;
} );

add_action( 'init', function () {
	if ( ! wp_next_scheduled( 'nm_contact_cleanup' ) ) {
		wp_schedule_event( time(), 'nm_daily', 'nm_contact_cleanup' );
	}
} );

add_action( 'nm_contact_cleanup', function () {
	$days = (int) nm_cs()['retention_days'];
	if ( $days < 1 ) {
		return;
	}
	global $wpdb;
	// Spam is cleaned up at half the retention window
	$wpdb->query( $wpdb->prepare(
		'DELETE FROM ' . nm_ct() . ' WHERE created_at < DATE_SUB(NOW(), INTERVAL %d DAY)',
		$days
	) );
} );
