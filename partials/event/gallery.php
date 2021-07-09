<?php
/**
 * Event/movie gallery module
 *
 * @package WordPress
 */

if ( have_rows( 'gallery' ) ) : ?>

<div class="swiper-container images-slider">
	<div class="button-next">
		<span class="meditech-chevron-left-alt"></span>
	</div>
	<div class="button-prev">
		<span class="meditech-chevron-right-alt"></span>
	</div>
	<div class="swiper-wrapper">
		<?php
		while ( have_rows( 'gallery' ) ) :
			the_row();
			$image = get_sub_field( 'image' );
			$video = get_sub_field( 'video' );
			if ( $image ) {
				?>
				<div class="swiper-slide">
				   <?php
					if ( ! $video ) {
						echo wp_get_attachment_image( $image, 'single-movie-slide' );
					} else {
						?>
						<a href="<?php echo $video; ?>" class="yBox yBox_iframe" rel="nofollow" title="Click Here">
						   <?php echo wp_get_attachment_image( $image, 'single-movie-slide' ); ?>
						</a>
					<?php } ?>
				</div>
				<?php
			}
		endwhile;
		?>
	</div>
</div>
<div class="swiper-container thumbs-slider">
	<div class="swiper-wrapper">
		<?php
		while ( have_rows( 'gallery' ) ) :
			the_row();
			$image = get_sub_field( 'image' );
			?>
			<div class="swiper-slide">
				<?php echo wp_get_attachment_image( $image, 'single-movie-small-slide' ); ?>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
