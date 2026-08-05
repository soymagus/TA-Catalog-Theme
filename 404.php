<?php
/**
 * Not found template.
 *
 * @package TACatalog
 */
get_header();
?>
<main id="primary" class="site-main ta-container ta-content-area ta-empty-state">
	<span class="ta-empty-state__code">404</span>
	<h1><?php esc_html_e( 'Esta página no está disponible', 'ta-catalog' ); ?></h1>
	<p><?php esc_html_e( 'Podés buscar un producto o regresar a la página principal.', 'ta-catalog' ); ?></p>
	<?php get_search_form(); ?>
	<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Volver al inicio', 'ta-catalog' ); ?></a>
</main>
<?php get_footer(); ?>
