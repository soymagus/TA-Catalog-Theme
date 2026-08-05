<?php
/**
 * Site header.
 *
 * @package TACatalog
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
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Saltar al contenido', 'ta-catalog' ); ?></a>
<header class="site-header" id="masthead">
	<?php $announcement = get_theme_mod( 'ta_catalog_announcement', __( 'Catálogo profesional de productos y soluciones técnicas', 'ta-catalog' ) ); ?>
	<?php if ( $announcement ) : ?>
		<div class="ta-announcement"><div class="ta-container"><?php echo esc_html( $announcement ); ?></div></div>
	<?php endif; ?>
	<div class="ta-header-main">
		<div class="ta-container ta-header-grid">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php ta_catalog_site_description(); ?>
				<?php endif; ?>
			</div>
			<div class="ta-header-search">
				<?php get_search_form(); ?>
			</div>
			<div class="ta-header-actions"><?php ta_catalog_header_actions(); ?></div>
			<button class="ta-menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
				<span class="ta-menu-icon" aria-hidden="true"></span><span><?php esc_html_e( 'Menú', 'ta-catalog' ); ?></span>
			</button>
		</div>
	</div>
	<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Navegación principal', 'ta-catalog' ); ?>">
		<div class="ta-container">
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
		</div>
	</nav>
</header>
