<?php
/**
 * Page template.
 *
 * @package TA_Catalog_Theme
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="ta-container content-narrow">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();

