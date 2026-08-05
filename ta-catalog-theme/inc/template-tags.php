<?php
/**
 * Reusable template helpers.
 *
 * @package TA_Catalog_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print published date.
 */
function ta_catalog_posted_on() {
	printf(
		'<time class="entry-date published" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
}

/**
 * Print author link.
 */
function ta_catalog_posted_by() {
	printf(
		/* translators: %s: author link. */
		esc_html__( 'Por %s', 'ta-catalog-theme' ),
		'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);
}

/**
 * Print entry footer taxonomy and edit links.
 */
function ta_catalog_entry_footer() {
	$categories = get_the_category_list( esc_html__( ', ', 'ta-catalog-theme' ) );
	$tags       = get_the_tag_list( '', esc_html_x( ', ', 'list separator', 'ta-catalog-theme' ) );

	if ( $categories ) {
		printf( '<span class="cat-links">%s</span>', wp_kses_post( $categories ) );
	}
	if ( $tags ) {
		printf( '<span class="tags-links">%s</span>', wp_kses_post( $tags ) );
	}
	edit_post_link( esc_html__( 'Editar', 'ta-catalog-theme' ), '<span class="edit-link">', '</span>' );
}

/**
 * Return one of the bundled interface icons.
 *
 * The SVGs use currentColor, remain sharp at every size and require no
 * external icon library.
 *
 * @param string $name Icon variant.
 * @return string
 */
function ta_catalog_get_icon( $name ) {
	$icons = array(
		'cart'        => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 4h2l2.1 10.1a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 1.9-1.4L21 8H7"/><circle cx="10" cy="20" r="1.2"/><circle cx="18" cy="20" r="1.2"/></svg>',
		'bag'         => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 8h14l-1 13H6L5 8Z"/><path d="M9 9V6a3 3 0 0 1 6 0v3"/></svg>',
		'basket'      => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m4 10 2 10h12l2-10H4Z"/><path d="m8 10 4-7 4 7M3 10h18"/></svg>',
		'search'      => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></svg>',
		'search-bold' => '<svg class="is-bold" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m15.5 15.5 5 5"/></svg>',
		'spark'       => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="10" cy="12" r="5.5"/><path d="m14.5 16.5 4.5 4.5M18 3v4M16 5h4"/></svg>',
	);

	return isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['search'];
}

/**
 * Return the sanitized icon-container shape class.
 *
 * @return string
 */
function ta_catalog_icon_shape_class() {
	$allowed = array( 'none', 'square', 'rounded', 'circle' );
	$shape   = get_theme_mod( 'ta_catalog_icon_shape', 'none' );
	return in_array( $shape, $allowed, true ) ? 'ta-icon--' . $shape : 'ta-icon--none';
}
