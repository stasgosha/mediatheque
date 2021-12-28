<?php
$title = get_field( 'single_post_related_title', 'option' );
$cat   = wp_get_post_terms( $post->ID, array( 'category' ) );


$args = array(
    'post_type'      => array( 'post' ),
    'posts_per_page' => 3,
    'post__not_in'   => array( get_the_ID() ),
);
$posts_query = get_field( 'related_posts' );

switch ( $posts_query ) {

    case 'by_user':
        if ( get_field( 'articles' ) ) {
            $args['post__in'] = get_field( 'articles' );
            $args['orderby']  = 'post__in';
        }
        break;

    case 'most_viewed':
        $args['orderby'] = 'post_views';
        break;


    case 'by_cat' :
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'terms'    => ! empty( $cat ) ? $cat[0]->term_id : '',
            ),

        );

        break;

}

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
?>

<div class="related-articles">
        <?php if ( $title ) : ?>

            <div class="title-wrap">
                <h2 class="entry-title">
                    <?php echo $title; ?>
                </h2>
            </div>

        <?php endif; ?>


        <?php
        while ( $query->have_posts() ) {
        $query->the_post();
        get_template_part( 'partials/loop', 'article' );
    }
    wp_reset_postdata();
    ?>


</div>
<?php
endif;
