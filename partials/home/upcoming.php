<?php
/**
 * Upcoming section
 *
 * @package WordPress
 */

$item_title = get_field( 'upcoming_title' );
$text       = get_field( 'upcoming_text' );
$featured   = get_field( 'upcoming_posts' );

if ( $featured ) :
	?>
<section class="upcoming-section">
	<div class="container">

	<?php if ( $item_title ) : ?>
		<div class="title-wrap">
			<h2 class="entry-title text-center">
			  <?php echo esc_html( $item_title ); ?>
			</h2>

			<?php if ( $text ) : ?>
			  <p class="entry-text">
				<?php echo $text; ?>
			  </p>
			<?php endif; ?>
		</div>

	<?php endif; ?>
	<div class="swiper-section">
		<div class="button-next">
			<span class="meditech-chevron-left-alt"></span>
		</div>
		<div class="button-prev">
			<span class="meditech-chevron-right-alt"></span>
		</div>
		<div class="swiper-container upcoming-slider">

		  <div class="swiper-wrapper">
			<?php
			foreach ( $featured as $post ) :
				setup_postdata( $post );
				?>
			  <div class="swiper-slide">
				<?php get_template_part( 'partials/loop', 'activity' ); ?>
			  </div>
				<?php
			endforeach;
			wp_reset_postdata();
			?>

		  </div>

		</div>
	</div>
	<div class="swiper-pagination upcoming-pag"></div>
  </div>

</section>
	<?php
endif;
