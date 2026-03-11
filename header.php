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

	<header id="masthead" class="site-header suntech-header">
		<div class="top-strip">
			<div class="container top-strip-inner">
				<span><?php esc_html_e( 'Store Locator', 'just-start' ); ?></span>
				<div class="top-links">
					<a href="#"><?php esc_html_e( 'Our Dealer', 'just-start' ); ?></a>
					<a href="#"><?php esc_html_e( 'My Account', 'just-start' ); ?></a>
				</div>
			</div>
		</div>

		<div class="main-header-row container">
			<a class="suntech-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="brand-mark"></span>
				<span class="brand-text">SunTech Mall</span>
			</a>

			<form role="search" method="get" class="header-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="hidden" name="post_type" value="product">
				<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search products...', 'just-start' ); ?>">
				<select name="product_cat">
					<option value=""><?php esc_html_e( 'All Categories', 'just-start' ); ?></option>
					<?php
					$just_start_categories = get_terms(
						array(
							'taxonomy'   => 'product_cat',
							'hide_empty' => true,
							'number'     => 20,
						)
					);
					if ( ! is_wp_error( $just_start_categories ) ) :
						foreach ( $just_start_categories as $just_start_category ) :
							?>
							<option value="<?php echo esc_attr( $just_start_category->slug ); ?>"><?php echo esc_html( $just_start_category->name ); ?></option>
							<?php
						endforeach;
					endif;
					?>
				</select>
				<button type="submit">🔍</button>
			</form>
		</div>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'just-start' ); ?>">
			<div class="container nav-inner">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">☰</button>
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
