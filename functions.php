<?php
/**
 * TA Catalog Theme bootstrap.
 *
 * @package TACatalog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TA_CATALOG_VERSION', '0.6.0-alpha' );
define( 'TA_CATALOG_DIR', get_template_directory() );
define( 'TA_CATALOG_URI', get_template_directory_uri() );

$ta_catalog_includes = array(
	'/inc/setup.php',
	'/inc/enqueue.php',
	'/inc/template-tags.php',
	'/inc/customizer.php',
	'/inc/woocommerce.php',
);

foreach ( $ta_catalog_includes as $ta_catalog_file ) {
	require_once TA_CATALOG_DIR . $ta_catalog_file;
}
