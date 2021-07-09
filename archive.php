<?php get_header(); ?>

<div class="container">
	<div class="row row-posts">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'partials/loop', 'post' );
			}
		} else {
			esc_html_e( 'Sorry, no posts found.', 'ystheme' );
		}
		?>
	</div>
</div>

<?php get_template_part( 'pagination' ); ?>

<?php
get_footer();
