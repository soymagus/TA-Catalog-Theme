<?php
/**
 * Search result card.
 *
 * @package TA_Catalog_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card entry-card--search' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>
	<div class="entry-summary"><?php the_excerpt(); ?></div>
</article>

