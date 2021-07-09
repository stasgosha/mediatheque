<?php
get_header();

while ( have_posts() ) {
	the_post();

	if ( has_term( 'תערוכות', 'exhibition_cat' ) ) {

		?>
	<section class="single-exhibition-wrap">
		<div class="container container-md">
			<?php
			get_template_part( 'partials/exhibition/exhibition', 'header' );
			get_template_part( 'partials/exhibition/exhibition', 'top' );
			get_template_part( 'partials/exhibition/exhibition', 'content' );
			get_template_part( 'partials/exhibition/exhibition', 'banner' );
			?>

		</div>
	</section>

		<?php
		get_template_part( 'partials/related', 'exhibitions' );
		get_template_part( 'partials/related', 'articles' );

	} else {
		get_template_part( 'partials/activity/header' );
		get_template_part( 'partials/activity/details' );
		the_content();
	}
}

get_footer();
