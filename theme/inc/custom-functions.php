<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
/* ============================================================
   1. THEME CONSTANTS
============================================================ */
define( 'NM_VERSION',  '1.0.0' );
define( 'NM_DIR',      get_template_directory() );
define( 'NM_URI',      get_template_directory_uri() );
define( 'NM_EMAIL',    'info@nezermotors.com' );
define( 'NM_WA_NUM',   '254733204672' );

/* ============================================================
   2. INCLUDE FILES
============================================================ */
require_once NM_DIR . '/inc/utilities.php';
require_once NM_DIR . '/inc/mail.php';

/* ============================================================
   3. ANTI-FLASH DARK MODE SCRIPT
   Runs before any CSS/HTML renders to prevent white flash.
============================================================ */
function nezer_motors_antiflash_script() {
	echo '<script id="nm-antiflash">(function(){';
	echo 'var t=localStorage.getItem("nezer-theme")||"system";';
	echo 'var d=t==="dark"||(t==="system"&&window.matchMedia("(prefers-color-scheme:dark)").matches);';
	echo 'if(d)document.documentElement.classList.add("dark");';
	echo '})();</script>' . "\n";
}
add_action( 'wp_head', 'nezer_motors_antiflash_script', 1 );

/* ============================================================
   4. CONTACT FORM AJAX HANDLER
============================================================ */
add_action( 'wp_ajax_nm_contact',        'nezer_motors_handle_contact' );
add_action( 'wp_ajax_nopriv_nm_contact', 'nezer_motors_handle_contact' );

function nezer_motors_handle_contact() {
	// Verify nonce
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'nm_contact_nonce' ) ) {
		wp_send_json_error( [ 'message' => esc_html__( 'Security check failed. Please refresh and try again.', 'nezer-motors' ) ], 403 );
	}

	// Sanitize inputs
	$name    = sanitize_text_field( wp_unslash( $_POST['name']    ?? '' ) );
	$email   = sanitize_email(       wp_unslash( $_POST['email']   ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['phone']   ?? '' ) );
	$branch  = sanitize_text_field( wp_unslash( $_POST['branch']  ?? '' ) );
	$vehicle = sanitize_text_field( wp_unslash( $_POST['vehicle'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	// Validate required fields
	if ( empty( $name ) || empty( $email ) || empty( $message ) || empty( $branch ) ) {
		wp_send_json_error( [ 'message' => esc_html__( 'Please fill in all required fields.', 'nezer-motors' ) ], 400 );
	}
	if ( ! is_email( $email ) ) {
		wp_send_json_error( [ 'message' => esc_html__( 'Please enter a valid email address.', 'nezer-motors' ) ], 400 );
	}

	// Basic honeypot (if your form has a hidden field)
	if ( ! empty( $_POST['website'] ) ) {
		wp_send_json_success( [ 'message' => esc_html__( 'Message sent!', 'nezer-motors' ) ] );
	}

	// Build and send email
	$sent = nezer_motors_send_contact_email( [
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'branch'  => $branch,
		'vehicle' => $vehicle,
		'message' => $message,
	] );

	if ( $sent ) {
		// Auto-reply to customer
		nezer_motors_send_auto_reply( $name, $email, $branch );

		wp_send_json_success( [
			'message' => esc_html__( 'Thank you! Your message has been sent. We will get back to you shortly.', 'nezer-motors' ),
		] );
	} else {
		wp_send_json_error( [
			'message' => esc_html__( 'Message could not be sent. Please call us directly.', 'nezer-motors' ),
		], 500 );
	}
}

/* ============================================================
   5. Automatically set permalinks to 'postname' 
   and timezone to +0300 on theme activation.
============================================================ */
function nezer_motors_setup_settings() 
{
    // Set permalinks to 'postname'
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules(); // Flush the rewrite rules to apply changes

    // Set the timezone to UTC+3
	update_option('timezone_string', ''); // Clear named timezone
	update_option('gmt_offset', 3); // Set numeric offset to +3
}
add_action('after_switch_theme', 'nezer_motors_setup_settings');


/* ============================================================
   6. COMING SOON MODE — redirect all non-admin users to a Coming Soon page
============================================================ */
add_action( 'template_redirect', function () {

    $coming_soon_active = true;

    if ( ! $coming_soon_active ) return;
    if ( current_user_can( 'edit_posts' ) ) return;
    if ( is_page( 'coming-soon' ) ) return;
    if ( is_admin() || wp_doing_ajax() || wp_doing_cron() || defined( 'REST_REQUEST' ) ) return;

    wp_redirect( home_url( '/coming-soon/' ), 302 );
    exit;

} );

/* ============================================================
   7. CORE PAGES CREATION — create essential pages with correct slugs, templates, and hierarchy
============================================================ */
function nezer_motors_create_home_page() 
{
	// Check if the "Home" page exists using WP_Query
	$home_page_query = new WP_Query(
		array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'title'          => 'Home',
			'posts_per_page' => 1,
		)
	);

	// Ensure the Home page exists with the slug 'home'
	if ( $home_page_query->have_posts() ) {
		// If the slug is different, update it to 'home'
		$home_page = $home_page_query->posts[0];
		if ( $home_page->post_name !== 'home' ) {
			wp_update_post(
				array(
					'ID'        => $home_page->ID,
					'post_name' => 'home',
				)
			);
		}
	} else {
		// Create the Home page if it doesn't exist
		$home_page = wp_insert_post(
			array(
				'post_title'   => 'Home',
				'post_content' => '', // Empty content, it will pull from front-page.php
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_name'    => 'home', // Ensure the slug is 'home'
			)
		);

		// Check if the page was created successfully
		if ( ! is_wp_error( $home_page ) ) {
			// Set this page as the front page
			update_option( 'page_on_front', $home_page );
			update_option( 'show_on_front', 'page' );
		}
	}
}

// Hook the function to run when WordPress initializes (after theme is activated)
add_action( 'after_switch_theme', 'nezer_motors_create_home_page' );


function nezer_motors_create_core_pages() 
{
    $pages = array(        
        array(
            'title'    => 'Contact',
            'slug'     => 'contact',
            'template' => 'page-templates/page-contact.php',
            'parent'   => 0,
        ),
        array(
            'title'    => 'About',
            'slug'     => 'about',
            'template' => 'page-templates/page-about.php',
            'parent'   => 0,
        ),
        array(
            'title'    => 'Qwik Fix',
            'slug'     => 'qwikfix',
            'template' => 'page-templates/page-qwik-fix.php',
            'parent'   => 0,
        ),
        array(
            'title'    => 'Auto Care Express',
            'slug'     => 'autocare-express',
            'template' => 'page-templates/page-auto-care-express.php',
            'parent'   => 0,
        ),
        array(
            'title'    => 'Coming Soon',
            'slug'     => 'coming-soon',
            'template' => 'page-templates/page-coming-soon.php',
            'parent'   => 0,
        ),
    );

    $created_pages = [];

    foreach ( $pages as $page ) {

        // Check if page already exists by title (WP 6.2+ compatible)
        $existing_query = new WP_Query( array(
            'post_type'              => 'page',
            'title'                  => $page['title'],
            'posts_per_page'         => 1,
            'post_status'            => 'publish',
            'no_found_rows'          => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ) );
        $existing_page = $existing_query->have_posts() ? $existing_query->posts[0] : null;

        if ( $existing_page ) {
            // Update slug if different
            if ( $existing_page->post_name !== $page['slug'] ) {
                wp_update_post( array(
                    'ID'        => $existing_page->ID,
                    'post_name' => $page['slug'],
                ) );
            }
            $page_id = $existing_page->ID;
        } else {
            // Determine parent ID (if parent slug given)
            $parent_id = 0;
            if ( ! empty( $page['parent'] ) && $page['parent'] !== 0 ) {
                $parent_page = get_page_by_path( $page['parent'] );
                if ( $parent_page ) {
                    $parent_id = $parent_page->ID;
                }
            }

            // Create new page
            $page_id = wp_insert_post( array(
                'post_title'   => $page['title'],
                'post_name'    => $page['slug'],
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_parent'  => $parent_id,
            ) );
        }

        // Assign template if specified
        if ( ! empty( $page['template'] ) && ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', $page['template'] );
        }

        // Track created/updated pages
        $created_pages[ $page['slug'] ] = $page_id;

        // Set Home as front page
        if ( isset( $page['is_front'] ) && $page['is_front'] ) {
            update_option( 'page_on_front', $page_id );
            update_option( 'show_on_front', 'page' );
        }
    }
}
add_action( 'after_switch_theme', 'nezer_motors_create_core_pages' );

/* ============================================================
   10. BODY CLASSES — add dark-mode-ready class
============================================================ */
function nezer_motors_body_classes( $classes ) {
	$classes[] = 'nm-site';
	$classes[] = 'transition-colors';
	$classes[] = 'duration-300';
	return $classes;
}
add_filter( 'body_class', 'nezer_motors_body_classes' );

/* ============================================================
   11. REMOVE EMOJI SCRIPTS (performance)
============================================================ */
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );

/* ============================================================
   12. REMOVE UNNECESSARY HEAD LINKS
============================================================ */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );