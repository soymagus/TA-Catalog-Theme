<?php
/**
 * Static front page.
 *
 * @package TA_Catalog_Theme
 */

get_header();
?>
<main id="primary" class="site-main site-main--front">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content"><?php the_content(); ?></div>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();

