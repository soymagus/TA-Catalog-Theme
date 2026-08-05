<?php
/**
 * Product archive.
 *
 * @package TACatalog
 */
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>
<main id="primary" class="site-main ta-shop-main">
	<div class="ta-shop-hero">
		<div class="ta-container">
			<?php woocommerce_breadcrumb(); ?>
			<div class="ta-shop-hero__content">
				<div>
					<p class="ta-eyebrow"><?php esc_html_e( 'Catálogo', 'ta-catalog' ); ?></p>
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>
					<?php do_action( 'woocommerce_archive_description' ); ?>
				</div>
				<div class="ta-shop-hero__mark" aria-hidden="true">TA</div>
			</div>
		</div>
	</div>
	<div class="ta-container ta-shop-layout">
		<?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
			<aside class="ta-shop-sidebar" id="shop-filters">
				<div class="ta-filter-heading">
					<strong><?php esc_html_e( 'Filtrar productos', 'ta-catalog' ); ?></strong>
					<button type="button" class="ta-filter-close" aria-label="<?php esc_attr_e( 'Cerrar filtros', 'ta-catalog' ); ?>">×</button>
				</div>
				<?php dynamic_sidebar( 'shop-sidebar' ); ?>
			</aside>
		<?php endif; ?>
		<section class="ta-shop-products">
			<?php if ( woocommerce_product_loop() ) : ?>
				<div class="ta-shop-toolbar">
					<button class="ta-filter-toggle" type="button" aria-controls="shop-filters" aria-expanded="false"><?php esc_html_e( 'Filtros', 'ta-catalog' ); ?></button>
					<?php do_action( 'woocommerce_before_shop_loop' ); ?>
				</div>
				<?php woocommerce_product_loop_start(); ?>
				<?php if ( wc_get_loop_prop( 'total' ) ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php do_action( 'woocommerce_shop_loop' ); ?>
						<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php woocommerce_product_loop_end(); ?>
				<?php do_action( 'woocommerce_after_shop_loop' ); ?>
			<?php else : ?>
				<?php do_action( 'woocommerce_no_products_found' ); ?>
			<?php endif; ?>
		</section>
	</div>
</main>
<?php get_footer( 'shop' ); ?>
