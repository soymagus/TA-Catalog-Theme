<?php
/**
 * Customizer settings.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme options.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function ta_catalog_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'ta_catalog_options',
		array(
			'title'    => esc_html__( 'TA Catalog', 'ta-catalog-theme' ),
			'priority' => 35,
		)
	);

	$wp_customize->add_setting(
		'ta_catalog_header_cta_label',
		array(
			'default'           => esc_html__( 'Ver catálogo', 'ta-catalog-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'ta_catalog_header_cta_label',
		array(
			'label'   => esc_html__( 'Texto del botón de cabecera', 'ta-catalog-theme' ),
			'section' => 'ta_catalog_options',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'ta_catalog_header_cta_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'ta_catalog_header_cta_url',
		array(
			'label'   => esc_html__( 'URL del botón de cabecera', 'ta-catalog-theme' ),
			'section' => 'ta_catalog_options',
			'type'    => 'url',
		)
	);
}
add_action( 'customize_register', 'ta_catalog_customize_register' );

