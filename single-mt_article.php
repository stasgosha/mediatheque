<?php
get_header();
while ( have_posts() ) {
	the_post();
	?>
	<?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>

	<div class="container container-l single-article-wrap mobile-padd-0 content-wrap">
		<div class="custom-row">
			<div class="col8 col-content">

				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
				<?php the_content(); ?>

				<div class="bg-img hide-desktop">
					<?php echo print_svg( THEME_URI .'/images/related-teeth.svg'); ?>
				</div>
			</div>
			<div class="col4 sidebar">
				<?php get_template_part( 'partials/related', 'articles' ); ?>
			</div>
		</div>

	</div>
	<?php

}

get_footer();
