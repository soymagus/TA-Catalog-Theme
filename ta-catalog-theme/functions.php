<?php
/**
 * TA Catalog Theme bootstrap.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TA_CATALOG_VERSION', '0.7.0-alpha' );
define( 'TA_CATALOG_DIR', get_template_directory() );
define( 'TA_CATALOG_URI', get_template_directory_uri() );

require_once TA_CATALOG_DIR . '/inc/setup.php';
require_once TA_CATALOG_DIR . '/inc/enqueue.php';
require_once TA_CATALOG_DIR . '/inc/widgets.php';
require_once TA_CATALOG_DIR . '/inc/template-tags.php';
require_once TA_CATALOG_DIR . '/inc/customizer.php';
require_once TA_CATALOG_DIR . '/inc/woocommerce.php';
