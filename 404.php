<?php get_header(); ?>
<div class="wrap404">
	<div class="container container-s">
		<div class="d-flex">
			<?php echo print_svg( THEME_URI . '/images/404.svg' ); ?>

			<div class="wrap">
				<h2 class="entry-subtitle">
					<?php _e( 'אופס... הדף שחיפשתם לא נמצא!', 'ystheme' ); ?>
				</h2>
				<a href="<?php echo home_url(); ?>" class="entry-link icon-link">
					<span class="icon meditech-chevron-left"></span>
					<span class="text">
						<?php _e( 'חזרה לדף הבית', 'ystheme' ); ?>
					</span>
				</a>
			</div>
		</div>

	</div>
</div>
<?php
get_footer();
