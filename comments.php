<?php
/** Comments template. @package TACatalog */
if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: %s: number of comments. */
				esc_html( _n( '%s comentario', '%s comentarios', get_comments_number(), 'ta-catalog' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>
		<ol class="comment-list"><?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?></ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Los comentarios están cerrados.', 'ta-catalog' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
