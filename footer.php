<?php
$video_l = false;
$video_s = get_field( 'mobile_video', 'option' );

?>
	</div><!-- #content -->

	<?php get_template_part( 'partials/global/site', 'banner' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

			<?php
			get_template_part( 'partials/footer/footer-top' );
			get_template_part( 'partials/footer/footer-logos' );
			get_template_part( 'partials/footer/footer-bottom' );
			?>
		</div>

	</footer>

	<div class="sticky-btn">
		<div class="btn-text">כרטיסים  <br>רכישת</div>
	</div>


	<?php if ( $video_l && $video_s ) : ?>
		<div class="video-overlay"></div>
		<video  playsinline autoplay="autoplay" id="load-video" class="large" data-video-l="<?php echo $video_l; ?>" data-video-s="<?php echo $video_s; ?>">
		 <source src="<?php echo $video_l; ?>" type="video/mp4">
		</video>
	<?php endif; ?>
	</div><!-- #site-wrap -->
	<?php
	if ( is_page_template( 'views/tpl-contact.php' ) ) {
		get_template_part( 'partials/contact/mobile-bar' );

	}
	wp_footer();
	?>



	</body>
</html>
