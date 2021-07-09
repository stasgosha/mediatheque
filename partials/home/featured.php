<?php
$title    = get_field( 'featured_title' );
$text     = get_field( 'featured_text' );
$featured = get_field( 'featured_posts' );

if ( $featured ) :
?>
<section class="featured-section swiper-section" id="featured">
  <div class="container">

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

    </div>

    <div class="container mobile-padd-0">
        <div class="swiper-container activities-slider">
          <div class="swiper-wrapper">
            <?php
            foreach( $featured as $post ) :
                setup_postdata( $post );
                ?>
              <div class="swiper-slide">
                <?php get_template_part( 'partials/loop', 'activity' ); ?>
              </div>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>

          </div>
          <div class="button-next">
              <span class="meditech-left-chevron"></span>
        </div>
          <div class="button-prev">
                <span class="meditech-right-chevron"></span>
          </div>
        </div>
    </div>








</section>
<?php
endif;
