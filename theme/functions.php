<?php
/**
 * Nezer Motors functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'NEZER_MOTORS_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'NEZER_MOTORS_VERSION', '0.1.0' );
}

if ( ! defined( 'NEZER_MOTORS_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `nezer_motors_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'NEZER_MOTORS_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'nezer_motors_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nezer_motors_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nezer Motors, use a find and replace
		 * to change 'nezer-motors' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nezer-motors', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'nezer-motors' ),
				'menu-2' => __( 'Footer Menu', 'nezer-motors' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );

		// Custom image sizes
		add_image_size( 'nm-gallery',  800, 600, true );
		add_image_size( 'nm-product',  600, 450, true );
		add_image_size( 'nm-hero',    1600, 900, true );
	}
endif;
add_action( 'after_setup_theme', 'nezer_motors_setup' );


/**
 * Enqueue scripts and styles.
 */
function nezer_motors_scripts() {
	wp_enqueue_style( 'nezer-motors-style', get_stylesheet_uri(), array(), NEZER_MOTORS_VERSION );
	wp_enqueue_script( 'nezer-motors-script', get_template_directory_uri() . '/js/script.min.js', array(), NEZER_MOTORS_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Pass PHP data to JS
	wp_localize_script( 'nezer-motors-script', 'NM', [
		'ajaxUrl' => esc_url( admin_url( 'admin-ajax.php' ) ),
		'nonce'   => wp_create_nonce( 'nm_contact_nonce' ),
		'waNum'   => esc_js( NM_WA_NUM ),
		'strings' => [
			'sending'  => esc_html__( 'Sending…',       'nezer-motors' ),
			'success'  => esc_html__( 'Message sent! We will get back to you shortly.', 'nezer-motors' ),
			'error'    => esc_html__( 'Something went wrong. Please try again or call us directly.', 'nezer-motors' ),
			'required' => esc_html__( 'Please fill in all required fields.', 'nezer-motors' ),
		],
	] );
}
add_action( 'wp_enqueue_scripts', 'nezer_motors_scripts' );

/**
 * Enqueue the block editor script.
 */
function nezer_motors_enqueue_block_editor_script() {
	$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

	if (
		$current_screen &&
		$current_screen->is_block_editor() &&
		'widgets' !== $current_screen->id
	) {
		wp_enqueue_script(
			'nezer-motors-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			NEZER_MOTORS_VERSION,
			true
		);
		wp_add_inline_script( 'nezer-motors-editor', "tailwindTypographyClasses = '" . esc_attr( NEZER_MOTORS_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'nezer_motors_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function nezer_motors_tinymce_add_class( $settings ) {
	$settings['body_class'] = NEZER_MOTORS_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'nezer_motors_tinymce_add_class' );

/**
 * Limit the block editor to heading levels supported by Tailwind Typography.
 *
 * @param array  $args Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array
 */
function nezer_motors_modify_heading_levels( $args, $block_type ) {
	if ( 'core/heading' !== $block_type ) {
		return $args;
	}

	// Remove <h1>, <h5> and <h6>.
	$args['attributes']['levelOptions']['default'] = array( 2, 3, 4 );

	return $args;
}
add_filter( 'register_block_type_args', 'nezer_motors_modify_heading_levels', 10, 2 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/custom-functions.php';