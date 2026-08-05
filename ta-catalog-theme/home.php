<?php
/**
 * Posts page template.
 *
 * @package TA_Catalog_Theme
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="ta-container content-grid">
		<section class="content-area">
			<header class="page-header"><h1><?php single_post_title(); ?></h1></header>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
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

