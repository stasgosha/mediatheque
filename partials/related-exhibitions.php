<?php
$title = get_field( 'events_title' );

if (!$title) {
    $title = 'פעילויות נוספות';
}
$cat   = wp_get_post_terms( $post->ID, array( 'exhibition_cat' ) );


$args        = array(
	'post_type'      => array( 'mt_exhibition' ),
	'posts_per_page' => 4,
	'post__not_in'   => array( get_the_ID() ),
);
$posts_query = get_field( 'events_query' );

switch ( $posts_query ) {

	case 'by_user':
		if ( get_field( 'events' ) ) {
			$args['post__in'] = get_field( 'events' );
			$args['orderby']  = 'post__in';
		}
		break;

	case 'most_viewed':
		$args['orderby'] = 'post_views';
		break;



		break;

}

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    $subtitle = get_field( 'subtitle', get_the_ID() );
	?>

<section class="related-exhibitions">
	<div class="container">
		<?php if ( $title ) : ?>

			<div class="title-wrap">
				<h2 class="entry-title text-center">
					<?php echo $title; ?>
				</h2>

			</div>

		<?php endif; ?>
	</div>
	<div class="container">
		<div class="results-grid">
			<?php


			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'partials/loop', 'activityex' );
			}
			wp_reset_postdata();
			?>

		</div>
        <div class="section-footer">
            <a href="<?php echo get_permalink(2934);?>" class="btn">לכל הפעילויות</a>
        </div>
	</div>

</section>
	<?php
endif;
