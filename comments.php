<?php
/**
 * Comments template.
 *
 * @package Just_Start
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$just_start_comment_count = get_comments_number();
			if ( '1' === $just_start_comment_count ) {
				esc_html_e( 'One Comment', 'just-start' );
			} else {
				printf(
					esc_html(
						/* translators: %1$s: comment count number, %2$s: title. */
						_nx( '%1$s Comment', '%1$s Comments', $just_start_comment_count, 'comments title', 'just-start' )
					),
					number_format_i18n( $just_start_comment_count )
				);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'just-start' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
