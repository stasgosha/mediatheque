<?php
$title    = get_field( 'related_title' );

if (!$title) {
    $title = 'פעילויות נוספות';
}

$text     = get_field( 'related_text' );
$current  = get_the_ID();

$args = array(
    'post_type'      => array( 'mt_event' ),
    'posts_per_page' => 4,
    'post__not_in'   => array( $current ),
);

switch ( $posts_query ) {
    case 'from_list':
        if ( get_field( 'posts' ) ) {
            $args['post__in'] = get_field( 'posts' );
            $args['orderby']  = 'post__in';
        }
        break;

    case 'most_viewed':
        $args['orderby'] = 'post_views';
        break;

    case 'cat' :

        $term = wp_get_post_terms( get_the_ID(), 'event_cat' );
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'event_cat',
                'terms'    => $term[0]->term_id,
            ),

        );

}

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
?>
<section class="related-section">
  <div class="container container-l">

    <?php if ( $title ) : ?>
        <div class="title-wrap">
            <h2 class="entry-title text-center">
              <?php echo $title; ?>
            </h2>


            <?php if ( $text ) : ?>
              <p class="entry-text">
                <?php echo $text; ?>
              </p>
            <?php endif; ?>
        </div>

    <?php endif; ?>

    <div class="section-grid">
        <?php
        while ( $query->have_posts() ) :
            $query->the_post();
            ?>
          <div class="item">
            <?php get_template_part( 'partials/loop', 'activity' ); ?>
          </div>
        <?php
        endwhile;
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
