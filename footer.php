<?php
/**
 * Site footer.
 *
 * @package TACatalog
 */
?>
<footer class="site-footer" id="colophon">
	<div class="ta-container ta-footer-grid">
		<div class="ta-footer-brand">
			<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php ta_catalog_site_description(); ?>
		</div>
		<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
			<div class="ta-footer-widgets"><?php dynamic_sidebar( 'footer-widgets' ); ?></div>
		<?php endif; ?>
		<nav class="ta-footer-menu" aria-label="<?php esc_attr_e( 'Navegación del pie', 'ta-catalog' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => false ) ); ?>
		</nav>
	</div>
	<div class="ta-footer-bottom">
		<div class="ta-container">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.</span>
			<span><?php esc_html_e( 'Catálogo desarrollado con WordPress y WooCommerce.', 'ta-catalog' ); ?></span>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
