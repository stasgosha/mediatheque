<?php /* Template Name: Homepage Template */

get_header();
get_template_part( 'partials/global/news-bar' );
get_template_part( 'partials/home/main', 'slider' );
get_template_part( 'partials/home/featured' );
get_template_part( 'partials/home/top-ank' );
get_template_part( 'partials/home/upcoming' );
get_template_part( 'partials/home/banner' );
get_template_part( 'partials/home/bottom-ank' );
get_footer();
