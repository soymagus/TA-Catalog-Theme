<?php
/**
 * Reusable template helpers.
 *
 * @package TACatalog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ta_catalog_site_description() {
	$description = get_bloginfo( 'description', 'display' );
	if ( $description ) {
		echo '<p class="site-description">' . esc_html( $description ) . '</p>';
	}
}

function ta_catalog_header_actions() {
	if ( class_exists( 'WooCommerce' ) ) {
		$account_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
		$cart_count  = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
		?>
		<a class="ta-header-action" href="<?php echo esc_url( $account_url ); ?>" aria-label="<?php esc_attr_e( 'Mi cuenta', 'ta-catalog' ); ?>">
			<span aria-hidden="true">◯</span><span class="ta-action-label"><?php esc_html_e( 'Mi cuenta', 'ta-catalog' ); ?></span>
		</a>
		<a class="ta-header-action ta-cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'Ver carrito', 'ta-catalog' ); ?>">
			<span aria-hidden="true">▱</span><span class="ta-action-label"><?php esc_html_e( 'Carrito', 'ta-catalog' ); ?></span>
			<span class="ta-cart-count"><?php echo esc_html( $cart_count ); ?></span>
		</a>
		<?php
	}
}

function ta_catalog_posted_on() {
	printf(
		'<span class="posted-on">%s</span>',
		esc_html( get_the_date() )
	);
}

function ta_catalog_posted_by() {
	printf(
		/* translators: %s: author link. */
		esc_html__( 'Por %s', 'ta-catalog' ),
		'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);
}

function ta_catalog_entry_footer() {
	$categories = get_the_category_list( esc_html__( ', ', 'ta-catalog' ) );
	$tags       = get_the_tag_list( '', esc_html_x( ', ', 'list separator', 'ta-catalog' ) );

	if ( $categories ) {
		printf( '<span class="cat-links">%s</span>', wp_kses_post( $categories ) );
	}
	if ( $tags ) {
		printf( '<span class="tags-links">%s</span>', wp_kses_post( $tags ) );
	}
	edit_post_link( esc_html__( 'Editar', 'ta-catalog' ), '<span class="edit-link">', '</span>' );
}
