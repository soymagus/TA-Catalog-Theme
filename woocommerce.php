<?php
/**
 * WooCommerce generic wrapper.
 *
 * @package TACatalog
 */
get_header();
?>
<main id="primary" class="site-main ta-container ta-content-area ta-woocommerce-main">
	<?php woocommerce_content(); ?>
</main>
<?php get_footer(); ?>
