<?php
/**
 * Front-end assets.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue public styles and scripts.
 */
function ta_catalog_enqueue_assets() {
	wp_enqueue_style( 'ta-catalog-style', get_stylesheet_uri(), array(), TA_CATALOG_VERSION );
	wp_enqueue_style( 'ta-catalog-main', TA_CATALOG_URI . '/assets/css/main.css', array( 'ta-catalog-style' ), TA_CATALOG_VERSION );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'ta-catalog-woocommerce', TA_CATALOG_URI . '/assets/css/woocommerce.css', array( 'ta-catalog-main' ), TA_CATALOG_VERSION );
		wp_enqueue_style( 'ta-catalog-shop', TA_CATALOG_URI . '/assets/css/shop.css', array( 'ta-catalog-woocommerce' ), TA_CATALOG_VERSION );
		wp_enqueue_style( 'ta-catalog-product-card', TA_CATALOG_URI . '/assets/css/product-card.css', array( 'ta-catalog-shop' ), TA_CATALOG_VERSION );

		if ( is_product() ) {
			wp_enqueue_style( 'ta-catalog-single-product', TA_CATALOG_URI . '/assets/css/single-product.css', array( 'ta-catalog-woocommerce' ), TA_CATALOG_VERSION );
			wp_enqueue_script( 'ta-catalog-single-product', TA_CATALOG_URI . '/assets/js/single-product.js', array(), TA_CATALOG_VERSION, true );
		}
	}

	wp_enqueue_script( 'ta-catalog-navigation', TA_CATALOG_URI . '/assets/js/navigation.js', array(), TA_CATALOG_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ta_catalog_enqueue_assets' );
