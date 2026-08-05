<?php
/**
 * Site footer.
 *
 * @package TA_Catalog_Theme
 */
?>
<footer id="colophon" class="site-footer">
	<div class="ta-container footer-widgets">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-column"><?php dynamic_sidebar( 'footer-1' ); ?></div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="footer-column"><?php dynamic_sidebar( 'footer-2' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="ta-container site-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'container'      => false,
				'fallback_cb'    => false,
				'depth'          => 1,
			)
		);
		?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

