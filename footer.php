<?php
/**
 * Site footer.
 *
 * @package Just_Start
 */
?>
	<footer id="colophon" class="site-footer">
		<div class="container footer-widgets">
			<div class="footer-column"><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<div class="footer-column"><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<div class="footer-column"><?php dynamic_sidebar( 'footer-3' ); ?></div>
		</div>

		<div class="container site-info">
			<p>
				<?php echo esc_html( gmdate( 'Y' ) ); ?>
				&copy; <?php bloginfo( 'name' ); ?>.
				<?php esc_html_e( 'All rights reserved.', 'just-start' ); ?>
			</p>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'depth'          => 1,
					'fallback_cb'    => false,
				)
			);
			?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
