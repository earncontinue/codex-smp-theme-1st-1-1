<?php
/**
 * Site header.
 *
 * @package Just_Start
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'just-start' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container top-header">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
				<div class="site-branding-text">
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
					<?php
					$just_start_description = get_bloginfo( 'description', 'display' );
					if ( $just_start_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo esc_html( $just_start_description ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php esc_html_e( 'Menu', 'just-start' ); ?>
			</button>
		</div>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'just-start' ); ?>">
			<div class="container">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => false,
					)
				);
				?>
			</div>
		</nav>
	</header>
