<?php
/**
 * Main template.
 *
 * @package TACatalog
 */
get_header();
?>
<main id="primary" class="site-main ta-container ta-content-area">
	<?php if ( have_posts() ) : ?>
		<header class="page-header"><h1><?php single_post_title(); ?></h1></header>
		<div class="ta-post-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'ta-post-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a><?php endif; ?>
					<div class="ta-post-card__body">
						<?php ta_catalog_posted_on(); ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<h1><?php esc_html_e( 'No encontramos contenido', 'ta-catalog' ); ?></h1>
		<p><?php esc_html_e( 'Probá con otra búsqueda o volvé al inicio.', 'ta-catalog' ); ?></p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
