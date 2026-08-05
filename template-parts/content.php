<?php
/** Default content card. @package TACatalog */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="entry-card__image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><?php the_post_thumbnail( 'large' ); ?></a>
	<?php endif; ?>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="entry-meta"><?php ta_catalog_posted_on(); ?> · <?php ta_catalog_posted_by(); ?></div>
	</header>
	<div class="entry-content"><?php the_excerpt(); ?></div>
	<footer class="entry-footer"><?php ta_catalog_entry_footer(); ?></footer>
</article>
