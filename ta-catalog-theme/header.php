<?php
/**
 * Site header.
 *
 * @package TA_Catalog_Theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Saltar al contenido', 'ta-catalog-theme' ); ?></a>
<header id="masthead" class="site-header">
	<div class="ta-container site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php if ( get_bloginfo( 'description' ) ) : ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</div>

		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
			<span class="menu-toggle__label"><?php esc_html_e( 'Menú', 'ta-catalog-theme' ); ?></span>
			<span aria-hidden="true">☰</span>
		</button>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Navegación principal', 'ta-catalog-theme' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>

		<div class="site-header__actions">
			<?php
			$cta_url = get_theme_mod( 'ta_catalog_header_cta_url' );
			if ( $cta_url ) :
				?>
				<a class="button button--small" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( get_theme_mod( 'ta_catalog_header_cta_label', __( 'Ver catálogo', 'ta-catalog-theme' ) ) ); ?></a>
			<?php endif; ?>
			<?php ta_catalog_cart_link(); ?>
		</div>
	</div>
</header>

