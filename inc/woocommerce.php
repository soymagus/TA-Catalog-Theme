<?php
/**
 * WooCommerce integration.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Declare WooCommerce features.
 */
function ta_catalog_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 480,
			'single_image_width'    => 760,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'max_rows'        => 12,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 5,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ta_catalog_woocommerce_setup' );

/**
 * Replace WooCommerce default wrappers with theme markup.
 */
function ta_catalog_woocommerce_wrappers() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	add_action( 'woocommerce_before_main_content', 'ta_catalog_woocommerce_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'ta_catalog_woocommerce_wrapper_end', 10 );
}
add_action( 'wp', 'ta_catalog_woocommerce_wrappers' );

/**
 * Open store layout.
 */
function ta_catalog_woocommerce_wrapper_start() {
	echo '<main id="primary" class="site-main site-main--shop"><div class="ta-container">';
}

/**
 * Close store layout.
 */
function ta_catalog_woocommerce_wrapper_end() {
	echo '</div></main>';
}

/**
 * Cart count link used in the header.
 */
function ta_catalog_cart_link() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		return;
	}
	?>
	<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
		<span class="header-cart__label"><?php esc_html_e( 'Carrito', 'ta-catalog-theme' ); ?></span>
		<span class="header-cart__count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	</a>
	<?php
}

/**
 * Refresh cart count after AJAX add-to-cart.
 *
 * @param array $fragments Existing fragments.
 * @return array
 */
function ta_catalog_cart_fragments( $fragments ) {
	ob_start();
	ta_catalog_cart_link();
	$fragments['a.header-cart'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ta_catalog_cart_fragments' );

