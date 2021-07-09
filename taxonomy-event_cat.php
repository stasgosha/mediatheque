<?php

$term = get_queried_object();

$args = array(
    'post_type' => 'mt_event',
    'tax_query' => array(
        array(
            'taxonomy' => 'event_cat',
            'terms'    => $term->term_id,
        ),
    ),
);


get_header();
?>

<div class="container container-l tax-header">
	<?php if ( term_description() ) : ?>
		<div class="entry-text text-center">
			<?php echo term_description(); ?>
		</div>
	<?php endif; ?>
</div>
<div class="container container-l tax-wrap padd-0">

	<div class="custom-row top-tax-row">
		<div class="col8">
			<div class="custom-row row-posts">
				<?php

				$args['posts_per_page'] = 4;

				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part( 'partials/loop-activity' );
					}
					wp_reset_query();
				}
				?>
			</div>

		</div>
		<div class="col4">
			<?php get_template_part( 'partials/category', 'ank' ); ?>
		</div>

	</div>

	<div class="custom-row row-posts grid-2">

		<?php

		$args['posts_per_page'] = 2;
		$args['offset']         = 4;

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'partials/loop-activity' );
			}
			wp_reset_query();
		}
		?>

	</div>

	<div class="custom-row row-posts grid-3">

		<?php

		$args['posts_per_page'] = 50;
		$args['offset']         = 6;

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'partials/loop-activity' );
			}
			wp_reset_query();
		}
		?>

	</div>
</div>
<?php
get_footer();
