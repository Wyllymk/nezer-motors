<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Start the session if not already started
function start_session() {
	if ( ! session_id() ) {
		session_start();
	}
}
add_action( 'wp', 'start_session', 1 );

/**
 * Contact Form Handler
 * Add this to your theme's functions.php file
 */

// Enqueue scripts for contact form
function nezer_motors_contact_form_scripts() 
{
    if (is_page_template('page-contact.php') || is_page('contact')) {
        wp_enqueue_script(
            'contact-form-handler',
            get_template_directory_uri() . '/js/contact.min.js',
            array('jquery'),
            '1.0.0',
            true
        );
        
        wp_localize_script('contact-form-handler', 'contact_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('contact_form_nonce'),
            'messages' => array(
                'sending' => __('Sending message...', 'nezer-motors'),
                'success' => __('Message sent successfully! I\'ll get back to you soon.', 'nezer-motors'),
                'error' => __('Something went wrong. Please try again.', 'nezer-motors'),
                'required_fields' => __('Please fill in all required fields.', 'nezer-motors'),
                'invalid_email' => __('Please enter a valid email address.', 'nezer-motors')
            )
        ));
    }
}
add_action('wp_enqueue_scripts', 'nezer_motors_contact_form_scripts');

// Handle AJAX form submission for logged in and non-logged in users
add_action('wp_ajax_submit_contact_form', 'handle_contact_form_submission');
add_action('wp_ajax_nopriv_submit_contact_form', 'handle_contact_form_submission');

function handle_contact_form_submission() 
{
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        wp_send_json_error(array(
            'message' => __('Security verification failed. Please refresh the page and try again.', 'nezer-motors')
        ));
    }

    // Honeypot spam protection
    if (!empty($_POST['honeypot'])) {
        wp_send_json_error(array(
            'message' => __('Spam detected.', 'nezer-motors')
        ));
    }

    // Sanitize and validate form data
    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validation
    $errors = array();
    
    if (empty($name)) {
        $errors[] = __('Name is required.', 'nezer-motors');
    }
    
    if (empty($email)) {
        $errors[] = __('Email is required.', 'nezer-motors');
    } elseif (!is_email($email)) {
        $errors[] = __('Please enter a valid email address.', 'nezer-motors');
    }
    
    if (empty($message)) {
        $errors[] = __('Message is required.', 'nezer-motors');
    }

    // Rate limiting check
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $rate_limit_key = 'contact_form_' . md5($user_ip);
    $submission_count = get_transient($rate_limit_key);
    
    if ($submission_count && $submission_count >= 3) {
        wp_die(json_encode(array(
            'success' => false,
            'message' => __('Too many submissions. Please wait before sending another message.', 'nezer-motors')
        )));
    }

    if (!empty($errors)) {
        wp_die(json_encode(array(
            'success' => false,
            'message' => implode(' ', $errors)
        )));
    }

    // Prepare email
    $to = get_option('admin_email'); 
    $email_subject = $subject ? '[Contact Form] ' . $subject : '[Contact Form] New Message from ' . $name;

    // Build HTML email body with your theme colors
    $email_body = '
    <html>
    <head>
      <style>
        body {
            font-family: Arial, sans-serif;
            background: var(--color-background, #f5f7fa); /* fallback to cyber-light */
            color: var(--color-text-light, #1a202c);
            padding: 20px;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h2 {
            color: var(--color-cyber-cyan, #00d4ff);
            margin-top: 0;
        }
        .field {
            margin-bottom: 12px;
        }
        .label {
            font-weight: bold;
            color: var(--color-nav-blue, #605c8d);
        }
        .value {
            margin-left: 5px;
            color: var(--color-text-light, #1a202c);
        }
        .message-box {
            padding: 12px;
            background: var(--color-cyber-light, #f5f7fa);
            border-radius: 6px;
            border: 1px solid var(--color-text-light-muted, #718096);
            white-space: pre-line;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: var(--color-text-dark-muted, #a0aec0);
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        a {
            color: var(--color-cyber-blue, #007bff);
            text-decoration: none;
        }
      </style>
    </head>
    <body>
      <div class="container">
        <h2>📩 New Contact Form Submission</h2>
        <div class="field"><span class="label">Name:</span><span class="value">'.esc_html($name).'</span></div>
        <div class="field"><span class="label">Email:</span><span class="value">'.esc_html($email).'</span></div>
        <div class="field"><span class="label">Subject:</span><span class="value">'.esc_html($subject).'</span></div>
        <div class="field"><span class="label">Message:</span>
          <div class="message-box">'.nl2br(esc_html($message)).'</div>
        </div>
        <div class="footer">
          Sent from <a href="'.home_url().'" target="_blank">'.get_bloginfo('name').'</a><br>
          IP Address: '.$user_ip.'<br>
          Date: '.current_time('mysql').'
        </div>
      </div>
    </body>
    </html>';

    // Email headers
    $headers = array();
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: '.get_bloginfo('name').' <'.get_option('admin_email').'>';
    $headers[] = 'Reply-To: '.$name.' <'.$email.'>';

    // Send email
    $mail_sent = wp_mail($to, $email_subject, $email_body, $headers);

    if ($mail_sent) {
        $new_count = $submission_count ? $submission_count + 1 : 1;
        set_transient($rate_limit_key, $new_count, 3600); // 1 hour

        error_log("Contact form submission from {$name} ({$email}) - Subject: {$subject}");

        wp_die(json_encode(array(
            'success' => true,
            'message' => __('Thank you for your message! I\'ll get back to you within 24 hours.', 'nezer-motors')
        )));
    } else {
        error_log("Failed to send contact form email from {$name} ({$email})");
        
        wp_send_json_error(array(
            'message' => __('Failed to send message. Please try again or contact me directly via social media.', 'nezer-motors')
        ));

    }
}

// Optional: Add contact form settings to WordPress admin
function nezer_motors_contact_form_admin_menu() 
{
    add_options_page(
        'Contact Form Settings',
        'Contact Form',
        'manage_options',
        'contact-form-settings',
        'nezer_motors_contact_form_admin_page'
    );
}
add_action('admin_menu', 'nezer_motors_contact_form_admin_menu');

function nezer_motors_contact_form_admin_page() 
{
    if (isset($_POST['save_settings'])) {
        update_option('nezer_motors_contact_email', sanitize_email($_POST['contact_email']));
        update_option('nezer_motors_contact_subject_prefix', sanitize_text_field($_POST['subject_prefix']));
        echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
    }
    
    $contact_email = get_option('nezer_motors_contact_email', get_option('admin_email'));
    $subject_prefix = get_option('nezer_motors_contact_subject_prefix', '[nezer_motors Devops]');
    ?>
<div class="wrap">
    <h1>Contact Form Settings</h1>
    <form method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row">Contact Email</th>
                <td>
                    <input type="email" name="contact_email" value="<?php echo esc_attr($contact_email); ?>"
                        class="regular-text" />
                    <p class="description">Where contact form submissions will be sent.</p>
                </td>
            </tr>
            <tr>
                <th scope="row">Subject Prefix</th>
                <td>
                    <input type="text" name="subject_prefix" value="<?php echo esc_attr($subject_prefix); ?>"
                        class="regular-text" />
                    <p class="description">Prefix added to email subjects.</p>
                </td>
            </tr>
        </table>
        <?php submit_button('Save Settings', 'primary', 'save_settings'); ?>
    </form>

    <h2>Recent Submissions</h2>
    <p>Check your server error logs for submission records.</p>
</div>
<?php
}

/**
 * Creates the "Home" and "Coming Soon" pages if they don't exist.
 *
 * This function checks if the "Home" and "Coming Soon" pages already exist.
 * If they do exist but have a different slug, it updates them to the correct
 * slug ('home' for the Home page, 'coming-soon' for the Coming Soon page).
 * If the pages do not exist, it creates them with the specified slugs and
 * assigns appropriate templates, and sets the "Home" page as the front page.
 *
 * @return void
 */
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

/**
 * Create essential pages upon theme activation.
 *
 * This function creates several essential pages (such as Coming Soon, etc.)
 * for the theme. The function checks if each page already exists based on the slug and
 * if it does not, the page is created and associated with the appropriate template.
 */
/**
 * Creates core site pages and ensures correct hierarchy, slugs, and templates.
 *
 * - Creates Home, Coming Soon, Contact, About Me, Services, Projects.
 * - Creates Project child pages.
 * - Sets Home as the static front page.
 */
function nezer_motors_create_core_pages() {
	$pages = array(
		// === Parent Pages ===
		array(
			'title'    => 'Home',
			'slug'     => 'home',
			'template' => '',
			'parent'   => 0,
			'is_front' => true,
		),		
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
			'slug'     => 'qwik-fix',
			'template' => 'page-templates/page-qwik-fix.php',
			'parent'   => 0,
		),	
        array(
			'title'    => 'Auto Care Express',
			'slug'     => 'auto-care-express',
			'template' => 'page-templates/page-auto-care-express.php',
			'parent'   => 0,
		),	

		// === Child Pages under Projects ===	
        // array(
		// 	'title'    => 'Premia Bet',
		// 	'slug'     => 'premia-bet',
		// 	'template' => 'page-templates/page-premia-bet.php',
		// 	'parent'   => 'projects',
		// ),
	);

	$created_pages = [];

	foreach ( $pages as $page ) {
		// Check if page already exists by title
		$existing_page = get_page_by_title( $page['title'] );

		if ( $existing_page ) {
			// Update slug if different
			if ( $existing_page->post_name !== $page['slug'] ) {
				wp_update_post(
					array(
						'ID'        => $existing_page->ID,
						'post_name' => $page['slug'],
					)
				);
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
			$page_id = wp_insert_post(
				array(
					'post_title'   => $page['title'],
					'post_name'    => $page['slug'],
					'post_content' => '',
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_parent'  => $parent_id,
				)
			);
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

// Automatically set permalinks to 'postname' and timezone to +0300 on theme activation.
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