<?php
/**
 * No content template.
 *
 * @package Just_Start
 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'just-start' ); ?></h1>
	</header>
	<div class="page-content">
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'just-start' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can’t find what you’re looking for.', 'just-start' ); ?></p>
		<?php endif; ?>
	</div>
</section>
