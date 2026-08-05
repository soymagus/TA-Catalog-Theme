<?php
/**
 * Customizer options.
 *
 * @package TACatalog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ta_catalog_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'ta_catalog_options',
		array(
			'title'    => __( 'TA Catalog', 'ta-catalog' ),
			'priority' => 35,
		)
	);

	$wp_customize->add_setting(
		'ta_catalog_announcement',
		array(
			'default'           => __( 'Catálogo profesional de productos y soluciones técnicas', 'ta-catalog' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'ta_catalog_announcement',
		array(
			'label'   => __( 'Mensaje superior', 'ta-catalog' ),
			'section' => 'ta_catalog_options',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'ta_catalog_accent',
		array(
			'default'           => '#f59e0b',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ta_catalog_accent',
			array(
				'label'   => __( 'Color de acento', 'ta-catalog' ),
				'section' => 'ta_catalog_options',
			)
		)
	);
}
add_action( 'customize_register', 'ta_catalog_customize_register' );

function ta_catalog_customizer_css() {
	$accent = get_theme_mod( 'ta_catalog_accent', '#f59e0b' );
	if ( $accent ) {
		printf( '<style id="ta-catalog-customizer">:root{--ta-accent:%s;}</style>', esc_html( $accent ) );
	}
}
add_action( 'wp_head', 'ta_catalog_customizer_css' );
