<?php
/**
 * Not found template.
 *
 * @package TA_Catalog_Theme
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="ta-container content-narrow error-404">
		<p class="eyebrow">404</p>
		<h1><?php esc_html_e( 'No encontramos esa página', 'ta-catalog-theme' ); ?></h1>
		<p><?php esc_html_e( 'Puede que el enlace haya cambiado. Probá con una búsqueda o volvé al inicio.', 'ta-catalog-theme' ); ?></p>
		<?php get_search_form(); ?>
		<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Volver al inicio', 'ta-catalog-theme' ); ?></a>
	</div>
</main>
<?php
get_footer();

