<?php
get_header();
while ( have_posts() ) {
	the_post();
	get_template_part( 'partials/event/details' );
	get_template_part( 'partials/event/related' );
}

get_footer();
