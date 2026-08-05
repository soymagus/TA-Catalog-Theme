<?php
/**
 * Page content.
 *
 * @package TA_Catalog_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></header>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-featured"><?php the_post_thumbnail( 'full' ); ?></div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div>
	<?php edit_post_link( esc_html__( 'Editar página', 'ta-catalog-theme' ), '<footer class="entry-footer">', '</footer>' ); ?>
</article>

