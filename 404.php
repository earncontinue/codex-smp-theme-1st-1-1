<?php
/**
 * 404 template.
 *
 * @package Just_Start
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="container content-wrap">
		<div class="content-area">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can’t be found.', 'just-start' ); ?></h1>
				</header>

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'just-start' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
