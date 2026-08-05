<?php
/**
 * Search form.
 *
 * @package TA_Catalog_Theme
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Buscar:', 'ta-catalog-theme' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Buscar…', 'ta-catalog-theme' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="submit" class="search-submit">
		<span class="ta-icon <?php echo esc_attr( ta_catalog_icon_shape_class() ); ?>"><?php echo ta_catalog_get_icon( get_theme_mod( 'ta_catalog_search_icon', 'search' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<span class="search-submit__label"><?php esc_html_e( 'Buscar', 'ta-catalog-theme' ); ?></span>
	</button>
</form>
