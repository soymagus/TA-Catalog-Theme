<?php
/** Default sidebar. @package TACatalog */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Barra lateral', 'ta-catalog' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
