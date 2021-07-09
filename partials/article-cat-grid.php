<?php
$term = get_queried_object();

$args = array(
    'post_type' => 'mt_article',
    'offset'    => 5,
    'tax_query' => array(
        array(
            'taxonomy' => 'article_cat',
            'terms'    => $term->term_id,
        ),
    )
);

$query = new WP_Query( $args );


?>
<div class="container padd-0 cat-grid">
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
