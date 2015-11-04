<?php
/**
 * tub functions and definitions
 *
 * @package tub
 */

if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

if ( ! function_exists( 'tub_setup' ) ) :
function tub_setup() {

	load_theme_textdomain( 'tub', get_template_directory() . '/languages' );


	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tub' ),
	) );
}
endif; // tub_setup
add_action( 'after_setup_theme', 'tub_setup' );



/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tub_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tub' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget--title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'tub_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function tub_scripts() {
	wp_enqueue_style( 'tub-style', get_stylesheet_uri(), null, '2.0' );

	wp_deregister_script('jquery');
	wp_register_script( 'jquery', '//code.jquery.com/jquery-1.11.0.min.js', false, '1.11.0', false );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main-dist.js', array('jquery'), '2.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tub_scripts' );



/**
 * Include Files
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
