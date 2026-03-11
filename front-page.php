<?php
/**
 * Front page template.
 *
 * @package Just_Start
 */

get_header();
?>
<main id="primary" class="site-main homepage-main">
	<?php do_action( 'just_start_homepage' ); ?>
</main>
<?php
get_footer();
