<?php
/**
 * Theme setup and structural hooks.
 *
 * @package TACatalog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ta_catalog_setup() {
	load_theme_textdomain( 'ta-catalog', TA_CATALOG_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 450,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menú principal', 'ta-catalog' ),
			'footer'  => __( 'Menú del pie', 'ta-catalog' ),
		)
	);
}
add_action( 'after_setup_theme', 'ta_catalog_setup' );

function ta_catalog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ta_catalog_content_width', 1200 );
}
add_action( 'after_setup_theme', 'ta_catalog_content_width', 0 );

function ta_catalog_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Barra lateral', 'ta-catalog' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widgets para entradas y archivos.', 'ta-catalog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Filtros de tienda', 'ta-catalog' ),
			'id'            => 'shop-sidebar',
			'description'   => __( 'Widgets de filtro para el archivo de productos.', 'ta-catalog' ),
			'before_widget' => '<section id="%1$s" class="widget ta-filter-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Pie de página', 'ta-catalog' ),
			'id'            => 'footer-widgets',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ta_catalog_widgets_init' );
