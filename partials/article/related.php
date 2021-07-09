<?php
$title = get_field( 'single_article_related_title', 'option' );
$cat   = wp_get_post_terms( $post->ID, array( 'article_cat' ) );


$args = array(
    'post_type'      => array( 'mt_article' ),
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

    case 'by_cat' :
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'article_cat',
                'terms'    => ! empty( $cat ) ? $cat[0]->term_id : '',
            ),

        );

        break;

}

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
?>

<section class="related-articles">
    <div class="container">
        <?php if ( $title ) : ?>

            <div class="title-wrap">
                <h2 class="entry-title text-center">
                    <?php echo $title; ?>
                </h2>
            </div>

        <?php endif; ?>
    </div>
    <div class="container padd-0">
        <div class="posts-wrap">
            <?php


            while ( $query->have_posts() ) {
                $query->the_post();
                get_template_part( 'partials/loop', 'article-mag' );
            }
            wp_reset_postdata();
            ?>
        </div>

    </div>
</section>
<?php
endif;
