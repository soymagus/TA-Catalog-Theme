<?php
/**
 * Theme setup and core supports.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configure theme defaults.
 */
function ta_catalog_setup() {
	load_theme_textdomain( 'ta-catalog-theme', TA_CATALOG_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 450,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Menú principal', 'ta-catalog-theme' ),
			'footer'  => esc_html__( 'Menú del pie', 'ta-catalog-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'ta_catalog_setup' );

