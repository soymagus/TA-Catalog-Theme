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
	$wp_customize->add_panel(
		'ta_catalog_panel',
		array(
			'title'       => esc_html__( 'TA Catalog', 'ta-catalog-theme' ),
			'description' => esc_html__( 'Identidad visual, tienda y experiencia de producto.', 'ta-catalog-theme' ),
			'priority'    => 35,
		)
	);

	$wp_customize->add_section(
		'ta_catalog_options',
		array(
			'title' => esc_html__( 'Cabecera y producto', 'ta-catalog-theme' ),
			'panel' => 'ta_catalog_panel',
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

	$wp_customize->add_setting(
		'ta_catalog_product_notice',
		array(
			'default'           => esc_html__( 'Compra protegida y atención personalizada', 'ta-catalog-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'ta_catalog_product_notice',
		array(
			'label'       => esc_html__( 'Mensaje de confianza del producto', 'ta-catalog-theme' ),
			'description' => esc_html__( 'Aparece junto a la acción de compra. Dejar vacío para ocultarlo.', 'ta-catalog-theme' ),
			'section'     => 'ta_catalog_options',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'ta_catalog_shipping_text',
		array(
			'default'           => esc_html__( 'Entrega coordinada', 'ta-catalog-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'ta_catalog_shipping_text',
		array(
			'label'   => esc_html__( 'Texto de entrega', 'ta-catalog-theme' ),
			'section' => 'ta_catalog_options',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'ta_catalog_support_text',
		array(
			'default'           => esc_html__( 'Soporte antes y después de comprar', 'ta-catalog-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'ta_catalog_support_text',
		array(
			'label'   => esc_html__( 'Texto de soporte', 'ta-catalog-theme' ),
			'section' => 'ta_catalog_options',
			'type'    => 'text',
		)
	);

	$wp_customize->add_section(
		'ta_catalog_global_colors',
		array(
			'title'       => esc_html__( 'Colores globales', 'ta-catalog-theme' ),
			'description' => esc_html__( 'Paleta general aplicada a cabecera, contenido, fondos y enlaces.', 'ta-catalog-theme' ),
			'panel'       => 'ta_catalog_panel',
		)
	);

	$global_colors = array(
		'ta_catalog_color_primary'    => array( esc_html__( 'Color principal', 'ta-catalog-theme' ), '#145da0' ),
		'ta_catalog_color_secondary'  => array( esc_html__( 'Color secundario y cabecera', 'ta-catalog-theme' ), '#001841' ),
		'ta_catalog_color_accent'     => array( esc_html__( 'Color de acento', 'ta-catalog-theme' ), '#f28c28' ),
		'ta_catalog_color_text'       => array( esc_html__( 'Texto principal', 'ta-catalog-theme' ), '#172033' ),
		'ta_catalog_color_background' => array( esc_html__( 'Fondo del sitio', 'ta-catalog-theme' ), '#f4f7fb' ),
		'ta_catalog_color_surface'    => array( esc_html__( 'Fondo de paneles', 'ta-catalog-theme' ), '#ffffff' ),
		'ta_catalog_color_border'     => array( esc_html__( 'Bordes', 'ta-catalog-theme' ), '#dce3ed' ),
	);

	foreach ( $global_colors as $setting_id => $color ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $color[1],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'   => $color[0],
					'section' => 'ta_catalog_global_colors',
				)
			)
		);
	}

	$wp_customize->add_section(
		'ta_catalog_woocommerce_colors',
		array(
			'title'       => esc_html__( 'Colores de WooCommerce', 'ta-catalog-theme' ),
			'description' => esc_html__( 'Colores independientes para precios, acciones, ofertas, estados y tarjetas.', 'ta-catalog-theme' ),
			'panel'       => 'ta_catalog_panel',
		)
	);

	$woocommerce_colors = array(
		'ta_catalog_woo_primary'       => array( esc_html__( 'Acciones de compra', 'ta-catalog-theme' ), '#145da0' ),
		'ta_catalog_woo_primary_hover' => array( esc_html__( 'Acciones al pasar el cursor', 'ta-catalog-theme' ), '#001841' ),
		'ta_catalog_woo_price'         => array( esc_html__( 'Precios', 'ta-catalog-theme' ), '#145da0' ),
		'ta_catalog_woo_sale'          => array( esc_html__( 'Ofertas', 'ta-catalog-theme' ), '#f28c28' ),
		'ta_catalog_woo_success'       => array( esc_html__( 'Disponible y confirmaciones', 'ta-catalog-theme' ), '#147a50' ),
		'ta_catalog_woo_card'          => array( esc_html__( 'Fondo de tarjetas y ficha', 'ta-catalog-theme' ), '#ffffff' ),
	);

	foreach ( $woocommerce_colors as $setting_id => $color ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $color[1],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'   => $color[0],
					'section' => 'ta_catalog_woocommerce_colors',
				)
			)
		);
	}

	$wp_customize->add_section(
		'ta_catalog_shapes',
		array(
			'title'       => esc_html__( 'Botones e iconos', 'ta-catalog-theme' ),
			'description' => esc_html__( 'Elegí la forma de los botones y la variante visual de carrito y búsqueda.', 'ta-catalog-theme' ),
			'panel'       => 'ta_catalog_panel',
		)
	);

	$select_controls = array(
		'ta_catalog_button_shape' => array(
			esc_html__( 'Forma de botones', 'ta-catalog-theme' ),
			'soft',
			array(
				'square'  => esc_html__( 'Cuadrados', 'ta-catalog-theme' ),
				'soft'    => esc_html__( 'Suaves', 'ta-catalog-theme' ),
				'rounded' => esc_html__( 'Redondeados', 'ta-catalog-theme' ),
				'pill'    => esc_html__( 'Píldora', 'ta-catalog-theme' ),
			),
		),
		'ta_catalog_icon_shape' => array(
			esc_html__( 'Contorno de iconos', 'ta-catalog-theme' ),
			'none',
			array(
				'none'    => esc_html__( 'Sin contorno', 'ta-catalog-theme' ),
				'square'  => esc_html__( 'Cuadrado', 'ta-catalog-theme' ),
				'rounded' => esc_html__( 'Redondeado', 'ta-catalog-theme' ),
				'circle'  => esc_html__( 'Circular', 'ta-catalog-theme' ),
			),
		),
		'ta_catalog_cart_icon' => array(
			esc_html__( 'Icono de carrito', 'ta-catalog-theme' ),
			'cart',
			array(
				'cart'   => esc_html__( 'Carrito', 'ta-catalog-theme' ),
				'bag'    => esc_html__( 'Bolsa', 'ta-catalog-theme' ),
				'basket' => esc_html__( 'Canasta', 'ta-catalog-theme' ),
			),
		),
		'ta_catalog_search_icon' => array(
			esc_html__( 'Icono de búsqueda', 'ta-catalog-theme' ),
			'search',
			array(
				'search'      => esc_html__( 'Lupa clásica', 'ta-catalog-theme' ),
				'search-bold' => esc_html__( 'Lupa destacada', 'ta-catalog-theme' ),
				'spark'       => esc_html__( 'Búsqueda dinámica', 'ta-catalog-theme' ),
			),
		),
	);

	foreach ( $select_controls as $setting_id => $control ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $control[1],
				'sanitize_callback' => 'ta_catalog_sanitize_choice',
			)
		);
		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $control[0],
				'section' => 'ta_catalog_shapes',
				'type'    => 'select',
				'choices' => $control[2],
			)
		);
	}
}
add_action( 'customize_register', 'ta_catalog_customize_register' );

/**
 * Validate a select value against the control choices.
 *
 * @param string               $value   Submitted value.
 * @param WP_Customize_Setting $setting Customizer setting.
 * @return string
 */
function ta_catalog_sanitize_choice( $value, $setting ) {
	$control = $setting->manager->get_control( $setting->id );
	return $control && array_key_exists( $value, $control->choices ) ? $value : $setting->default;
}

/**
 * Print the configured design tokens after the main stylesheet.
 */
function ta_catalog_customizer_css() {
	$colors = array(
		'--ta-blue'              => array( 'ta_catalog_color_primary', '#145da0' ),
		'--ta-navy'              => array( 'ta_catalog_color_secondary', '#001841' ),
		'--ta-orange'            => array( 'ta_catalog_color_accent', '#f28c28' ),
		'--ta-ink'               => array( 'ta_catalog_color_text', '#172033' ),
		'--ta-canvas'            => array( 'ta_catalog_color_background', '#f4f7fb' ),
		'--ta-surface'           => array( 'ta_catalog_color_surface', '#ffffff' ),
		'--ta-border'            => array( 'ta_catalog_color_border', '#dce3ed' ),
		'--ta-woo-primary'       => array( 'ta_catalog_woo_primary', '#145da0' ),
		'--ta-woo-primary-hover' => array( 'ta_catalog_woo_primary_hover', '#001841' ),
		'--ta-woo-price'         => array( 'ta_catalog_woo_price', '#145da0' ),
		'--ta-woo-sale'          => array( 'ta_catalog_woo_sale', '#f28c28' ),
		'--ta-woo-success'       => array( 'ta_catalog_woo_success', '#147a50' ),
		'--ta-woo-card'          => array( 'ta_catalog_woo_card', '#ffffff' ),
	);
	$declarations = array();

	foreach ( $colors as $property => $setting ) {
		$value          = sanitize_hex_color( get_theme_mod( $setting[0], $setting[1] ) );
		$declarations[] = $property . ':' . ( $value ? $value : $setting[1] );
	}

	$button_radii = array( 'square' => '0', 'soft' => '8px', 'rounded' => '14px', 'pill' => '999px' );
	$button_shape = get_theme_mod( 'ta_catalog_button_shape', 'soft' );
	$button_radius = isset( $button_radii[ $button_shape ] ) ? $button_radii[ $button_shape ] : $button_radii['soft'];
	$declarations[] = '--ta-button-radius:' . $button_radius;

	wp_add_inline_style( 'ta-catalog-main', ':root{' . implode( ';', $declarations ) . '}' );
}
add_action( 'wp_enqueue_scripts', 'ta_catalog_customizer_css', 20 );
