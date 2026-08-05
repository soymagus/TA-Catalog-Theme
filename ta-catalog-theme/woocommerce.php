<?php
/**
 * WooCommerce compatibility wrapper.
 *
 * @package TA_Catalog_Theme
 */

get_header();

if ( function_exists( 'woocommerce_content' ) ) {
	woocommerce_content();
}

get_footer();
