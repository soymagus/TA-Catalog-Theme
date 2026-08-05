<?php
/**
 * WooCommerce integration.
 *
 * @package TACatalog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ta_catalog_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ta_catalog_woocommerce_setup' );

function ta_catalog_woocommerce_hooks() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	add_action( 'woocommerce_before_shop_loop_item_title', 'ta_catalog_product_badges', 8 );
	add_action( 'woocommerce_shop_loop_item_title', 'ta_catalog_product_category', 4 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'ta_catalog_product_excerpt', 7 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 9 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'ta_catalog_product_card_actions', 10 );
}
add_action( 'wp', 'ta_catalog_woocommerce_hooks' );

function ta_catalog_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'ta_catalog_loop_columns' );

function ta_catalog_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'ta_catalog_products_per_page', 20 );

function ta_catalog_product_badges() {
	global $product;
	if ( ! $product ) {
		return;
	}

	echo '<div class="ta-product-badges">';
	if ( $product->is_on_sale() ) {
		echo '<span class="ta-badge ta-badge--sale">' . esc_html__( 'Oferta', 'ta-catalog' ) . '</span>';
	}
	if ( ! $product->is_in_stock() ) {
		echo '<span class="ta-badge ta-badge--stock">' . esc_html__( 'Sin stock', 'ta-catalog' ) . '</span>';
	} elseif ( $product->is_featured() ) {
		echo '<span class="ta-badge ta-badge--featured">' . esc_html__( 'Destacado', 'ta-catalog' ) . '</span>';
	}
	echo '</div>';
}

function ta_catalog_product_category() {
	global $product;
	$terms = get_the_terms( $product->get_id(), 'product_cat' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		echo '<span class="ta-product-category">' . esc_html( $terms[0]->name ) . '</span>';
	}
}

function ta_catalog_product_excerpt() {
	global $product;
	$excerpt = $product->get_short_description();
	if ( ! $excerpt ) {
		return;
	}
	echo '<p class="ta-product-excerpt">' . esc_html( wp_trim_words( wp_strip_all_tags( $excerpt ), 15 ) ) . '</p>';
}

function ta_catalog_product_card_actions() {
	global $product;
	if ( ! $product ) {
		return;
	}
	?>
	<div class="ta-card-actions">
		<a class="button ta-button--secondary" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
			<?php esc_html_e( 'Ver detalles', 'ta-catalog' ); ?>
		</a>
		<?php woocommerce_template_loop_add_to_cart(); ?>
	</div>
	<?php
}

function ta_catalog_cart_fragments( $fragments ) {
	$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	$fragments['.ta-cart-count'] = '<span class="ta-cart-count">' . esc_html( $count ) . '</span>';
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ta_catalog_cart_fragments' );
