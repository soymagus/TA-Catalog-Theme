<?php
/**
 * Widget areas.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register sidebars.
 */
function ta_catalog_widgets_init() {
	$shared = array(
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);

	register_sidebar(
		array_merge(
			$shared,
			array(
				'name'        => esc_html__( 'Barra lateral', 'ta-catalog-theme' ),
				'id'          => 'sidebar-1',
				'description' => esc_html__( 'Widgets para entradas y páginas.', 'ta-catalog-theme' ),
			)
		)
	);

	register_sidebar(
		array_merge(
			$shared,
			array(
				'name'        => esc_html__( 'Filtros del catálogo', 'ta-catalog-theme' ),
				'id'          => 'shop-sidebar',
				'description' => esc_html__( 'Filtros y widgets para WooCommerce.', 'ta-catalog-theme' ),
			)
		)
	);

	foreach ( array( 1, 2 ) as $column ) {
		register_sidebar(
			array_merge(
				$shared,
				array(
					/* translators: %d: footer column number. */
					'name' => sprintf( esc_html__( 'Pie de página %d', 'ta-catalog-theme' ), $column ),
					'id'   => 'footer-' . $column,
				)
			)
		);
	}
}
add_action( 'widgets_init', 'ta_catalog_widgets_init' );

