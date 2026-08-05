<?php
/**
 * WooCommerce integration.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Declare WooCommerce features.
 */
function ta_catalog_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 480,
			'single_image_width'    => 760,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'max_rows'        => 12,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 5,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ta_catalog_woocommerce_setup' );

/**
 * Replace WooCommerce default wrappers with theme markup.
 */
function ta_catalog_woocommerce_wrappers() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	add_action( 'woocommerce_before_main_content', 'ta_catalog_woocommerce_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'ta_catalog_woocommerce_wrapper_end', 10 );
}
add_action( 'wp', 'ta_catalog_woocommerce_wrappers' );

/**
 * Open store layout.
 */
function ta_catalog_woocommerce_wrapper_start() {
	echo '<main id="primary" class="site-main site-main--shop"><div class="ta-container">';
}

/**
 * Close store layout.
 */
function ta_catalog_woocommerce_wrapper_end() {
	echo '</div></main>';
}

/**
 * Cart count link used in the header.
 */
function ta_catalog_cart_link() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		return;
	}
	?>
	<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php echo esc_attr( sprintf( _n( 'Carrito, %d producto', 'Carrito, %d productos', WC()->cart->get_cart_contents_count(), 'ta-catalog-theme' ), WC()->cart->get_cart_contents_count() ) ); ?>">
		<span class="ta-icon <?php echo esc_attr( ta_catalog_icon_shape_class() ); ?>"><?php echo ta_catalog_get_icon( get_theme_mod( 'ta_catalog_cart_icon', 'cart' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<span class="header-cart__label"><?php esc_html_e( 'Carrito', 'ta-catalog-theme' ); ?></span>
		<span class="header-cart__count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	</a>
	<?php
}

/**
 * Refresh cart count after AJAX add-to-cart.
 *
 * @param array $fragments Existing fragments.
 * @return array
 */
function ta_catalog_cart_fragments( $fragments ) {
	ob_start();
	ta_catalog_cart_link();
	$fragments['a.header-cart'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ta_catalog_cart_fragments' );

/**
 * Configure the catalog loop while keeping WooCommerce templates upgrade-safe.
 */
function ta_catalog_product_loop_setup() {
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'ta_catalog_loop_product_title', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'ta_catalog_loop_product_category', 12 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'ta_catalog_loop_stock_status', 6 );
}
add_action( 'after_setup_theme', 'ta_catalog_product_loop_setup', 20 );

/**
 * Product category eyebrow for catalog cards.
 */
function ta_catalog_loop_product_category() {
	global $product;
	if ( ! $product instanceof WC_Product ) {
		return;
	}

	$terms = get_the_terms( $product->get_id(), 'product_cat' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		echo '<span class="ta-product-card__category">' . esc_html( $terms[0]->name ) . '</span>';
	}
}

/**
 * Accessible product card heading.
 */
function ta_catalog_loop_product_title() {
	echo '<h2 class="woocommerce-loop-product__title">' . esc_html( get_the_title() ) . '</h2>';
}

/**
 * Compact stock label for catalog cards.
 */
function ta_catalog_loop_stock_status() {
	global $product;
	if ( ! $product instanceof WC_Product ) {
		return;
	}

	$class = $product->is_in_stock() ? 'is-available' : 'is-unavailable';
	$label = $product->is_in_stock() ? __( 'Disponible', 'ta-catalog-theme' ) : __( 'Sin stock', 'ta-catalog-theme' );
	echo '<span class="ta-product-card__stock ' . esc_attr( $class ) . '">' . esc_html( $label ) . '</span>';
}

/**
 * Add semantic classes used by the modular shop styles.
 *
 * @param array      $classes Existing post classes.
 * @param WC_Product $product Product instance.
 * @return array
 */
function ta_catalog_product_loop_classes( $classes, $product ) {
	$classes[] = 'ta-product-card';
	if ( $product instanceof WC_Product && $product->is_featured() ) {
		$classes[] = 'ta-product-card--featured';
	}
	return $classes;
}
add_filter( 'woocommerce_post_class', 'ta_catalog_product_loop_classes', 10, 2 );

/**
 * Organize the single-product summary and supporting content.
 */
function ta_catalog_single_product_setup() {
	add_action( 'woocommerce_before_single_product_summary', 'ta_catalog_single_product_open', 1 );
	add_action( 'woocommerce_after_single_product_summary', 'ta_catalog_single_product_close', 99 );
	add_action( 'woocommerce_single_product_summary', 'ta_catalog_single_product_eyebrow', 4 );
	add_action( 'woocommerce_single_product_summary', 'ta_catalog_product_notice', 31 );
	add_action( 'woocommerce_single_product_summary', 'ta_catalog_product_benefits', 35 );
	add_action( 'woocommerce_after_single_product_summary', 'ta_catalog_related_heading', 19 );
	add_action( 'woocommerce_after_single_product', 'ta_catalog_mobile_purchase_bar', 5 );
}
add_action( 'after_setup_theme', 'ta_catalog_single_product_setup', 30 );

/**
 * Open the single product experience shell.
 */
function ta_catalog_single_product_open() {
	echo '<div class="ta-single-product">';
}

/**
 * Close the single product experience shell.
 */
function ta_catalog_single_product_close() {
	echo '</div>';
}

/**
 * Primary category shown above the product title.
 */
function ta_catalog_single_product_eyebrow() {
	global $product;
	if ( ! $product instanceof WC_Product ) {
		return;
	}

	$terms = get_the_terms( $product->get_id(), 'product_cat' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$term = $terms[0];
		echo '<a class="ta-product-eyebrow" href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
	}
}

/**
 * Customizable reassurance below the purchase action.
 */
function ta_catalog_product_notice() {
	$notice = get_theme_mod( 'ta_catalog_product_notice', __( 'Compra protegida y atención personalizada', 'ta-catalog-theme' ) );
	if ( $notice ) {
		echo '<p class="ta-product-notice"><span aria-hidden="true">✓</span> ' . esc_html( $notice ) . '</p>';
	}
}

/**
 * Compact benefits panel for commercial context.
 */
function ta_catalog_product_benefits() {
	$items = array(
		array( 'icon' => '↗', 'text' => get_theme_mod( 'ta_catalog_shipping_text', __( 'Entrega coordinada', 'ta-catalog-theme' ) ) ),
		array( 'icon' => '◎', 'text' => get_theme_mod( 'ta_catalog_support_text', __( 'Soporte antes y después de comprar', 'ta-catalog-theme' ) ) ),
	);
	$items = array_filter(
		$items,
		function ( $item ) {
			return ! empty( $item['text'] );
		}
	);

	if ( empty( $items ) ) {
		return;
	}

	echo '<ul class="ta-product-benefits" aria-label="' . esc_attr__( 'Información de compra', 'ta-catalog-theme' ) . '">';
	foreach ( $items as $item ) {
		echo '<li><span aria-hidden="true">' . esc_html( $item['icon'] ) . '</span><span>' . esc_html( $item['text'] ) . '</span></li>';
	}
	echo '</ul>';
}

/**
 * Visual heading before WooCommerce related products.
 */
function ta_catalog_related_heading() {
	if ( wc_get_related_products( get_the_ID(), 1 ) ) {
		echo '<div class="ta-related-intro"><span>' . esc_html__( 'También puede interesarte', 'ta-catalog-theme' ) . '</span></div>';
	}
}

/**
 * Mobile shortcut to the canonical cart form; avoids duplicating product data.
 */
function ta_catalog_mobile_purchase_bar() {
	global $product;
	if ( ! $product instanceof WC_Product || ! $product->is_purchasable() || ! $product->is_in_stock() ) {
		return;
	}
	?>
	<div class="ta-mobile-purchase" data-ta-mobile-purchase hidden>
		<div class="ta-mobile-purchase__info">
			<span class="ta-mobile-purchase__label"><?php esc_html_e( 'Precio', 'ta-catalog-theme' ); ?></span>
			<span class="ta-mobile-purchase__price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
		</div>
		<button type="button" class="button ta-mobile-purchase__button" data-ta-purchase-action><?php esc_html_e( 'Comprar', 'ta-catalog-theme' ); ?></button>
	</div>
	<?php
}
