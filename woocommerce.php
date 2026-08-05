<?php
/**
 * WooCommerce compatibility wrapper.
 *
 * @package TA_Catalog_Theme
 */

get_header();

if ( function_exists( 'woocommerce_content' ) ) {
	do_action( 'woocommerce_before_main_content' );
	woocommerce_content();
	do_action( 'woocommerce_after_main_content' );
}

get_footer();

