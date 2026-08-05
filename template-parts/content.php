<?php
/**
 * Default content card.
 *
 * @package TA_Catalog_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="entry-card__image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><?php the_post_thumbnail( 'large' ); ?></a>
	<?php endif; ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
		<div class="entry-meta"><?php ta_catalog_posted_on(); ?> · <?php ta_catalog_posted_by(); ?></div>
	</header>
	<div class="entry-content">
		<?php is_singular() ? the_content() : the_excerpt(); ?>
		<?php wp_link_pages(); ?>
	</div>
	<footer class="entry-footer"><?php ta_catalog_entry_footer(); ?></footer>
</article>

