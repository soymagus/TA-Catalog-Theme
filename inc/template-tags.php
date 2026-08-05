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

