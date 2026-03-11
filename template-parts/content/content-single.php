<?php
/**
 * Single post content template.
 *
 * @package Just_Start
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<span><?php echo esc_html( get_the_date() ); ?></span>
			<span><?php the_author_posts_link(); ?></span>
			<span><?php the_category( ', ' ); ?></span>
		</div>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail"><?php the_post_thumbnail( 'full' ); ?></div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'just-start' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry-footer">
		<?php the_tags( '<span class="tag-links">', '', '</span>' ); ?>
	</footer>
</article>
