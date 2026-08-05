<?php
/**
 * Single post template.
 *
 * @package TACatalog
 */
get_header();
?>
<main id="primary" class="site-main ta-container ta-content-area ta-reading-width">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header"><?php ta_catalog_posted_on(); ?><h1 class="entry-title"><?php the_title(); ?></h1></header>
			<?php if ( has_post_thumbnail() ) : ?><div class="entry-thumbnail"><?php the_post_thumbnail( 'full' ); ?></div><?php endif; ?>
			<div class="entry-content"><?php the_content(); ?></div>
		</article>
		<?php the_post_navigation(); ?>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
