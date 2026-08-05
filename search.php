<?php
/**
 * Search results template.
 *
 * @package TA_Catalog_Theme
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="ta-container content-grid">
		<section class="content-area">
			<header class="page-header">
				<h1 class="page-title">
					<?php
					printf(
						/* translators: %s: search term. */
						esc_html__( 'Resultados para: %s', 'ta-catalog-theme' ),
						'<span>' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</h1>
			</header>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'search' ); ?>
				<?php endwhile; ?>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();

