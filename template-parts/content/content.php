<?php
/**
 * Default content template.
 *
 * @package Just_Start
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="entry-meta">
			<span><?php echo esc_html( get_the_date() ); ?></span>
			<span><?php the_author_posts_link(); ?></span>
		</div>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
