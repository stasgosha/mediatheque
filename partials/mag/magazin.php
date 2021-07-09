<?php
if ( ! post_type_exists( 'mt_article' ) ) {
    return;
}
$text     = get_field( 'text' );
$posts    = get_field( 'mag_posts' );
$featured = get_field( 'mag_featured_post' );
$args = array(
    'post_type' => array(
        'post',
        'mt_article'
    ),
);
?>
<section class="mag-section">
    <?php if ( $text ) : ?>
        <div class="entry-text text-center">
            <?php echo $text; ?>
        </div>
    <?php endif; ?>
    <div class="container container-l">
        <div class="custom-row featured-row">
            <div class="col6 mag-featured">
                <?php
                $args['posts_per_page'] = 1;
                $args['p']              = $featured;
                $query = new WP_Query( $args );
                  if ( $query->have_posts() ) {
                      while ( $query->have_posts() ) {
                          $query->the_post();
                          get_template_part( 'partials/loop-article', 'big' );
                      }
                      wp_reset_postdata();
                  }
                  ?>
              </div>
              <div class="col6">
                  <div class="mag-posts-wrap">
                      <?php
                        $args['post__in']       = $posts;
                        $args['posts_per_page'] = 3;
                        unset( $args['p'] );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                          while ( $query->have_posts() ) {
                              $query->the_post();
                              get_template_part( 'partials/loop', 'article-wide' );
                          }
                          wp_reset_postdata();
                        }
                      ?>
                  </div>
              </div>
          </div>
    </div>
    <div class="container container-l padd-0">
      <div class="custom-row row-posts grid-3">
          <?php
          $posts[]                = $featured;
          $args['post__not_in']   = $posts;
          $args['posts_per_page'] = 50;
          unset( $args['post__in'] );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                get_template_part( 'partials/loop', 'article' );
            }
            wp_reset_postdata();
          }
          ?>
      </div>
    </div>
</section>