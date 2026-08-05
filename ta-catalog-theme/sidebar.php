<?php
/**
 * Default sidebar.
 *
 * @package TA_Catalog_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Barra lateral', 'ta-catalog-theme' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>

