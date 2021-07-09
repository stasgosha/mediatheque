<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="error-404">
				<h2 class="entry-title">
					<?php _e( 'Index Page', 'ystheme' ); ?>
				</h2>

				<a href="<?php echo home_url(); ?>" class="back-to-home">
					<?php _e( 'Back to Homepage', 'ystheme' ); ?>
				</a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
