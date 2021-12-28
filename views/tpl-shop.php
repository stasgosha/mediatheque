<?php
/**
 * Template Name: Shop
 *
 * @package WordPress
 */

$special = get_field( 'products' );

get_header();
?>

<section class="shop-page-section">
	<div class="container container-md">
		<div class="section-top content-wrap text-center">
			<?php the_content(); ?>
		</div>

		<div class="shop-grid">
			<?php
			if ( $special ) {
				$i = 0;
				foreach ( $special as $value ) {
					$thumb_id            = get_post_thumbnail_id( $value );
					$thumb_url           = wp_get_attachment_image_src( $thumb_id, 'product', true );
					$image_alt           = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
					$product_direct_link = get_field( 'DirectLink', $value );
					if ( $product_direct_link ) {
						$product_direct_link = add_query_arg( 'interface', '8', $product_direct_link );
					}
					$product_toptix_id = get_field( 'id', $value );
					$product_price     = get_field( 'price', $value );
					?>
					<div class="shop-card" data-id="<?php echo esc_html( $product_toptix_id ); ?>">

						<div class="card-image">
							<img src="<?php echo esc_html( $thumb_url[0] ); ?>" alt="<?php echo esc_html( $image_alt ); ?>">
						</div>

						<div class="card-content">
							<h3 class="card-caption">
								<a href="#" onclick="return false;"><?php echo esc_html( get_the_title( $value ) ); ?></a>
							</h3>

							<ul class="card-info">
								<?php if ( $product_price ) : ?>
									<li>
										<strong>מחיר:</strong> <?php echo get_field( 'price', $value ); ?>
									</li>
								<?php endif; ?>
								<li>
									<strong>כמות:</strong>
									<div class="count-select">
										<button class="change-count plus">+</button>
										<input type="tel" value="1">
										<button class="change-count minus">-</button>
									</div>
								</li>
							</ul>

							<?php if ( $product_direct_link ) : ?>
								<div class="card-footer">
									<a href="<?php echo $product_direct_link; ?>" class="btn btn-small yellow shop-btn-call-iframe">להזמנה</a>
								</div>
							<?php endif; ?>
						</div>

					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>

<?php
	get_footer();
?>
