<?php
/**
 * Single post template.
 *
 * @package TA_Catalog_Theme
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="ta-container content-grid">
		<section class="content-area">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
				<?php the_post_navigation(); ?>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();

