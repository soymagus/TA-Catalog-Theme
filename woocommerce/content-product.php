<?php
/**
 * Product card.
 *
 * @package TACatalog
 */
defined( 'ABSPATH' ) || exit;
global $product;

if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'ta-product-card', $product ); ?>>
	<div class="ta-product-card__inner">
		<div class="ta-product-card__media">
			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?php the_permalink(); ?>">
				<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
			</a>
		</div>
		<div class="ta-product-card__body">
			<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
	</div>
</li>
