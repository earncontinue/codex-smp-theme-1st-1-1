<?php
/**
 * Page template.
 *
 * @package Just_Start
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="container content-wrap">
		<div class="content-area">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'page' );

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
			?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
