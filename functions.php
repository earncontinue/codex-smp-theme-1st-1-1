<?php
/**
 * Just-start theme functions.
 *
 * @package Just_Start
 */

if ( ! defined( 'JUST_START_VERSION' ) ) {
	define( 'JUST_START_VERSION', '1.0.0' );
}

if ( ! function_exists( 'just_start_setup' ) ) {
	/**
	 * Theme setup.
	 */
	function just_start_setup() {
		load_theme_textdomain( 'just-start', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'just-start' ),
				'footer'  => esc_html__( 'Footer Menu', 'just-start' ),
			)
		);

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

		add_theme_support( 'custom-logo', array( 'height' => 70, 'width' => 220, 'flex-width' => true ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'after_setup_theme', 'just_start_setup' );

/**
 * Content width.
 */
function just_start_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'just_start_content_width', 820 );
}
add_action( 'after_setup_theme', 'just_start_content_width', 0 );

/**
 * Register widget areas.
 */
function just_start_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'just-start' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Main sidebar for blog posts and pages.', 'just-start' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'just-start' ),
			'id'            => 'footer-1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'just-start' ),
			'id'            => 'footer-2',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'just-start' ),
			'id'            => 'footer-3',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'just_start_widgets_init' );

/**
 * Use classic widgets panel.
 */
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Enqueue scripts and styles.
 */
function just_start_scripts() {
	wp_enqueue_style( 'just-start-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), JUST_START_VERSION );
	wp_enqueue_style( 'just-start-style', get_stylesheet_uri(), array( 'just-start-main-style' ), JUST_START_VERSION );

	wp_enqueue_script( 'just-start-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), JUST_START_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'just_start_scripts' );

/**
 * Add custom body classes.
 */
function just_start_body_classes( $classes ) {
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'just_start_body_classes' );

/**
 * WooCommerce wrappers.
 */
function just_start_woocommerce_wrapper_before() {
	echo '<main id="primary" class="site-main"><div class="content-area container">';
}

/**
 * Close WooCommerce wrapper.
 */
function just_start_woocommerce_wrapper_after() {
	echo '</div></main>';
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'just_start_woocommerce_wrapper_before' );
add_action( 'woocommerce_after_main_content', 'just_start_woocommerce_wrapper_after' );

require get_template_directory() . '/inc/homepage-sections.php';
