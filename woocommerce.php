<?php
/**
 * WooCommerce template file.
 *
 * @package Just_Start
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="container content-wrap">
		<div class="content-area woocommerce-area">
			<?php woocommerce_content(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
