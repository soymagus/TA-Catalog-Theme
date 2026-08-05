<?php
/**
 * Modular assets.
 *
 * @package TACatalog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ta_catalog_enqueue_assets() {
	$styles = array(
		'ta-tokens'       => 'tokens.css',
		'ta-base'         => 'base.css',
		'ta-layout'       => 'layout.css',
		'ta-header'       => 'header.css',
		'ta-footer'       => 'footer.css',
		'ta-components'   => 'components.css',
		'ta-product-card' => 'product-card.css',
		'ta-shop'         => 'shop.css',
		'ta-woocommerce'  => 'woocommerce.css',
		'ta-responsive'   => 'responsive.css',
	);

	$dependency = array();
	foreach ( $styles as $handle => $file ) {
		wp_enqueue_style( $handle, TA_CATALOG_URI . '/assets/css/' . $file, $dependency, TA_CATALOG_VERSION );
		$dependency = array( $handle );
	}

	wp_enqueue_script( 'ta-navigation', TA_CATALOG_URI . '/assets/js/navigation.js', array(), TA_CATALOG_VERSION, true );
	wp_enqueue_script( 'ta-shop', TA_CATALOG_URI . '/assets/js/shop.js', array(), TA_CATALOG_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ta_catalog_enqueue_assets' );
