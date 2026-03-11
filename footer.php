<?php
/**
 * Site footer.
 *
 * @package Just_Start
 */
?>
	<footer id="colophon" class="site-footer suntech-footer">
		<div class="footer-newsletter">
			<div class="container footer-newsletter-inner">
				<div>
					<strong><?php esc_html_e( 'YOU NEED HELP?', 'just-start' ); ?></strong>
					<p><?php esc_html_e( 'Get in touch with us for help to choose proper products.', 'just-start' ); ?></p>
				</div>
				<form class="newsletter-form" action="#" method="post">
					<input type="email" placeholder="<?php esc_attr_e( 'Enter your email address', 'just-start' ); ?>">
					<button type="submit"><?php esc_html_e( 'SUBSCRIBE', 'just-start' ); ?></button>
				</form>
			</div>
		</div>

		<div class="container footer-widgets">
			<div class="footer-brand-block">
				<a class="suntech-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="brand-mark"></span>
					<span class="brand-text">SunTech Mall</span>
				</a>
				<p><?php esc_html_e( 'Controler House, Karachi, Pakistan', 'just-start' ); ?></p>
			</div>
			<div class="footer-column"><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<div class="footer-column"><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<div class="footer-column"><?php dynamic_sidebar( 'footer-3' ); ?></div>
		</div>

		<div class="container site-info">
			<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'Suntech Mall — All Rights Reserved', 'just-start' ); ?></p>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
