<?php
/**
 * Homepage sections rendered via hooks.
 *
 * @package Just_Start
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function just_start_render_product_card( $product ) {
	$product_id = $product->ID;
	$thumb      = get_the_post_thumbnail_url( $product_id, 'medium' );
	$price      = function_exists( 'wc_get_product' ) ? wc_get_product( $product_id ) : null;
	?>
	<article class="home-product-card">
		<a class="home-product-thumb" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
			<?php if ( $thumb ) : ?>
				<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( get_the_title( $product_id ) ); ?>">
			<?php else : ?>
				<div class="no-image"><?php esc_html_e( 'No image', 'just-start' ); ?></div>
			<?php endif; ?>
		</a>
		<h3><a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>"><?php echo esc_html( get_the_title( $product_id ) ); ?></a></h3>
		<div class="home-product-price">
			<?php
			if ( $price ) {
				echo wp_kses_post( $price->get_price_html() );
			} else {
				echo esc_html( get_the_date( '', $product_id ) );
			}
			?>
		</div>
	</article>
	<?php
}

function just_start_homepage_hero() {
	?>
	<section class="home-hero">
		<div class="container home-hero-inner">
			<div class="hero-content">
				<span class="hero-badge"><?php esc_html_e( 'New Arrivals', 'just-start' ); ?></span>
				<h1><?php esc_html_e( 'New Arrivals', 'just-start' ); ?></h1>
				<p><?php esc_html_e( 'Get fast delivery on orders over Rs 10,000 on components.', 'just-start' ); ?></p>
				<strong><?php esc_html_e( 'Microchip PIC16 C 8-BIT MCU USB AND SOLAR INVERTER LOGIC IC', 'just-start' ); ?></strong>
				<div class="hero-price"><?php esc_html_e( 'Rs.1,700', 'just-start' ); ?></div>
				<div class="hero-actions">
					<a href="#" class="btn-dark"><?php esc_html_e( 'View Product', 'just-start' ); ?></a>
					<a href="#" class="btn-light"><?php esc_html_e( 'Shop Now', 'just-start' ); ?></a>
				</div>
			</div>
			<div class="hero-image">
				<img src="https://dummyimage.com/280x220/ffffff/1f2937&text=2811" alt="Featured product">
			</div>
		</div>
	</section>
	<?php
}
add_action( 'just_start_homepage', 'just_start_homepage_hero', 10 );

function just_start_homepage_features() {
	$items = array(
		esc_html__( 'All Pakistan Delivery', 'just-start' ),
		esc_html__( '365 Days Return Policy', 'just-start' ),
		esc_html__( 'Payment Secure System', 'just-start' ),
		esc_html__( '95% Customer Feedback', 'just-start' ),
		esc_html__( 'Only Best Brands', 'just-start' ),
	);
	?>
	<section class="home-features">
		<div class="container">
			<ul>
				<?php foreach ( $items as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php
}
add_action( 'just_start_homepage', 'just_start_homepage_features', 20 );

function just_start_homepage_featured_products() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$query = new WP_Query(
		array(
			'post_type'      => 'product',
			'posts_per_page' => 10,
			'post_status'    => 'publish',
		)
	);

	if ( ! $query->have_posts() ) {
		return;
	}
	?>
	<section class="home-product-section">
		<div class="container">
			<div class="section-head"><h2><?php esc_html_e( 'Featured Products', 'just-start' ); ?></h2></div>
			<div class="home-product-grid">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					just_start_render_product_card( get_post() );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
	<?php
}
add_action( 'just_start_homepage', 'just_start_homepage_featured_products', 30 );

function just_start_homepage_category_products() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'number'     => 6,
		)
	);

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return;
	}

	foreach ( $terms as $term ) {
		$products = new WP_Query(
			array(
				'post_type'      => 'product',
				'posts_per_page' => 6,
				'post_status'    => 'publish',
				'tax_query'      => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					),
				),
			)
		);

		if ( ! $products->have_posts() ) {
			continue;
		}
		?>
		<section class="home-product-section">
			<div class="container">
				<div class="section-head">
					<h2><?php echo esc_html( strtoupper( $term->name ) ); ?></h2>
					<a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php esc_html_e( 'View all Products', 'just-start' ); ?></a>
				</div>
				<div class="home-product-grid">
					<?php
					while ( $products->have_posts() ) :
						$products->the_post();
						just_start_render_product_card( get_post() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
		<?php
	}
}
add_action( 'just_start_homepage', 'just_start_homepage_category_products', 40 );
