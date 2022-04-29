<?php
/**
 * Kavanagh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kavanagh
 */

if ( ! defined( 'THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'kavanagh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kavanagh_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kavanagh, use a find and replace
		 * to change 'kavanagh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kavanagh', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			[
				'main-menu' => esc_html__( 'Primary', 'kavanagh' ),
				'footer-menu' => esc_html__( 'Footer', 'kavanagh' ),
			]
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'kavanagh_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			[
				'height'      => 40,
				'width'       => 72,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);
	}
endif;
add_action( 'after_setup_theme', 'kavanagh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kavanagh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kavanagh_content_width', 640 );
}
add_action( 'after_setup_theme', 'kavanagh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kavanagh_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'kavanagh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kavanagh' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
}
add_action( 'widgets_init', 'kavanagh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kavanagh_scripts() {

	$version = THEME_VERSION;
	$path    = get_template_directory_uri();

	/**
	 * Styles
	 */
	// Main style css.
	wp_enqueue_style( 'kavanagh-style', get_stylesheet_uri(), [], $version );
	wp_enqueue_style( 'theme-style', $path . '/css/theme.css', [], $version );
	wp_enqueue_style( 'custom-style', $path . '/css/custom.css', [], $version );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400&family=Montserrat:wght@400;700&display=swap', false );

	// Magnific popup css.
	wp_enqueue_style( 'kavanagh-magnific-popup-css', $path . '/css/magnific-popup.css', [], $version );

	// Slick css.
	wp_enqueue_style( 'kavanagh-slick-css', $path . '/css/slick.css', [], $version );

	/**
	 * Scripts
	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Theme's scrips.
	wp_enqueue_script( 'kavanagh-magnific-popup', $path . '/js/jquery.magnific-popup.min.js', [], $version, true );
	wp_enqueue_script( 'kavanagh-slick', $path . '/js/slick.min.js', [], $version, true );
	wp_enqueue_script( 'kavanagh-mixitup', $path . '/js/mixitup.min.js', [], $version, true );
	wp_enqueue_script( 'kavanagh-custom', $path . '/js/custom.js', [ 'jquery' ], $version, true );

}
add_action( 'wp_enqueue_scripts', 'kavanagh_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * All classes here
 */
require get_template_directory() . '/inc/class-kavanagh-menu-walker.php';
require get_template_directory() . '/inc/class-kavanagh-actions.php';
require get_template_directory() . '/inc/class-custom-post-types.php';

/**
 * Load ACF Options panel.
 */
require get_template_directory() . '/inc/class-acf-options-panel.php';

/**
 * ACF content filter preview path.
 */
function get_acf_preview_path() {
	return 'template-parts/acf/images';
}
add_filter( 'acf-flexible-content-preview.images_path', 'get_acf_preview_path' );
