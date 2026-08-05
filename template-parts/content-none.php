<?php
/** Empty result template. @package TACatalog */
?>
<section class="no-results not-found">
	<header class="page-header"><h1 class="page-title"><?php esc_html_e( 'No hay resultados', 'ta-catalog' ); ?></h1></header>
	<div class="page-content">
		<p><?php esc_html_e( 'No encontramos contenido que coincida. Probá con otra búsqueda.', 'ta-catalog' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
