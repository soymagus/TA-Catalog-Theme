<?php
/**
 * Search form.
 *
 * @package TACatalog
 */
$ta_is_wc = class_exists( 'WooCommerce' );
?>
<form role="search" method="get" class="ta-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="ta-search-field"><?php esc_html_e( 'Buscar', 'ta-catalog' ); ?></label>
	<input id="ta-search-field" type="search" class="search-field" placeholder="<?php echo esc_attr( $ta_is_wc ? __( 'Buscar productos, categorías o SKU…', 'ta-catalog' ) : __( 'Buscar…', 'ta-catalog' ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<?php if ( $ta_is_wc ) : ?><input type="hidden" name="post_type" value="product"><?php endif; ?>
	<button type="submit" aria-label="<?php esc_attr_e( 'Buscar', 'ta-catalog' ); ?>">⌕</button>
</form>
