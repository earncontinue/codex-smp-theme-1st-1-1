<?php
/**
 * Search results template.
 *
 * @package Just_Start
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="container content-wrap">
		<div class="content-area">
			<header class="page-header">
				<h1 class="page-title">
					<?php
					printf(
						esc_html__( 'Search Results for: %s', 'just-start' ),
						'<span>' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</h1>
			</header>

			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'search' );
				endwhile;

				the_posts_pagination();
				?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
