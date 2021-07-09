<?php
/**
 * Featured slider
 *
 * @package WordPress
 */

$item_title      = get_field( 'featured_title' );
$ex_title        = get_field( 'exhibitions_title' );
$events_title    = get_field( 'events_title' );
$activites_title = get_field( 'activities_title' );
$item_link       = get_field( 'featured_link' );

$exhibitions = new WP_Query(
	array(
		'post_type'      => 'mt_exhibition',
		'posts_per_page' => 12,
	)
);
$events      = new WP_Query(
	array(
		'post_type'      => 'mt_event',
		'posts_per_page' => 12,
	)
);
$activities  = new WP_Query(
	array(
		'post_type'      => 'mt_activity',
		'posts_per_page' => 12,
	)
);
?>
<section class="featured-sliders-section">
  <div class="container">

	<?php if ( $item_title ) : ?>
	  <div class="row">
		<div class="col-12">
		  <h2 class="entry-title text-center">
			<?php echo $item_title; ?>
		  </h2>
		</div>
	  </div>
	<?php endif; ?>

	<?php if ( $exhibitions->have_posts() ) : ?>
	  <div class="row exhibitions-wrap">
		<div class="col-12">
		  <div class="title-wrap">
			<h3 class="entry-subtitle text-right">
			  <?php echo $ex_title; ?>
			</h3>
			<div class="nav-wrap">
			  <div class="button-prev">
				<span class="icon meditech-right-chevron"></span>
			  </div>
			  <div class="button-next">
				<span class="icon meditech-left-chevron"></span>
			  </div>
			</div>
		  </div>

		  <div class="swiper-container exhibitions-slider">
			<div class="swiper-wrapper">
			  <?php
				while ( $exhibitions->have_posts() ) :
					$exhibitions->the_post();
					?>
				<div class="swiper-slide">
					<?php get_template_part( 'partials/slide', 'exhibition' ); ?>
				</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>

			</div>

		  </div>
		</div>
	  </div>
	<?php endif; ?>

	<?php if ( $events->have_posts() ) : ?>
	  <div class="row events-wrap">
		<div class="col-12">
		  <div class="title-wrap">
			<h3 class="entry-subtitle text-right">
			  <?php echo $events_title; ?>
			</h3>
			<div class="nav-wrap">
			  <div class="button-prev">
				<span class="icon meditech-right-chevron"></span>
			  </div>
			  <div class="button-next">
				<span class="icon meditech-left-chevron"></span>
			  </div>
			</div>
		  </div>

		  <div class="swiper-container events-slider">
			<div class="swiper-wrapper">
			  <?php
				while ( $events->have_posts() ) :
					$events->the_post();
					?>
				<div class="swiper-slide">
					<?php get_template_part( 'partials/slide', 'event' ); ?>
				</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>

			</div>

		  </div>
		</div>
	  </div>
	<?php endif; ?>

	<?php if ( $activities->have_posts() ) : ?>
	  <div class="row activities-wrap">
		<div class="col-12">
		  <div class="title-wrap">
			<h3 class="entry-subtitle text-right">
			  <?php echo $activites_title; ?>
			</h3>
			<div class="nav-wrap">
			  <div class="button-prev">
				<span class="icon meditech-right-chevron"></span>
			  </div>
			  <div class="button-next">
				<span class="icon meditech-left-chevron"></span>
			  </div>
			</div>
		  </div>

		  <div class="swiper-container activities-slider">
			<div class="swiper-wrapper">
			  <?php
				while ( $activities->have_posts() ) :
					$activities->the_post();
					?>
				<div class="swiper-slide">
					<?php get_template_part( 'partials/slide', 'activity' ); ?>
				</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>

			</div>

		  </div>
		</div>
	  </div>
	<?php endif; ?>

	<?php if ( $item_link ) : ?>
	  <div class="row btn-wrap">
		<div class="col-12 text-center">
		  <a href="<?php echo $item_link['url']; ?>" class="btn text-btn" title="<?php echo $item_link['title']; ?>">
			<?php echo $item_link['title']; ?>
		  </a>
		</div>
	  </div>
	<?php endif; ?>
  </div>
</section>
