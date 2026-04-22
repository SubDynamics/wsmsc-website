<?php
/**
 * WSMSC 2026 Theme Functions
 *
 * @package wsmsc2026
 */

/**
 * Enqueue theme styles and scripts.
 */
function wsmsc2026_enqueue_assets() {
	wp_enqueue_style(
		'wsmsc2026-style',
		get_template_directory_uri() . '/assets/css/style.css',
		array(),
		'1.0.0'
	);

	wp_enqueue_script(
		'wsmsc2026-scroll-effects',
		get_template_directory_uri() . '/assets/js/scroll-effects.js',
		array(),
		'1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'wsmsc2026_enqueue_assets' );

/**
 * Theme setup.
 */
function wsmsc2026_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'custom-logo' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'wsmsc2026' ),
		)
	);
}
add_action( 'after_setup_theme', 'wsmsc2026_setup' );
