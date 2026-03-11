<?php
/**
 * Main template file.
 *
 * @package Just_Start
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="container content-wrap">
		<div class="content-area">
			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', get_post_type() );
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
