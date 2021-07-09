<?php
$slides = get_field( 'slider' );

if ( have_rows( 'slider' ) ) : ?>
<section class="section slider-section">
    <div class="swiper-container main-slider">
        <div class="swiper-wrapper">
            <?php
            while ( have_rows( 'slider' ) ) :
              the_row();
              $title             = get_sub_field( 'title' );
              $subtitle          = get_sub_field( 'subtitle' );
              $text              = get_sub_field( 'text' );
              ?>
              <div class="swiper-slide">
                  <div class="bg-img-wrap">
                    <?php echo H::get_attachment_image_responsive( 'desktop_image', 'mobile_image' ); ?>
                  </div>
                  <div class="container container-md">
                    <div class="custom-row">
                      <div class="col6 col-content">

                        <?php if ( $title ) : ?>
                          <h2 class="entry-title">
                            <?php echo $title; ?>
                          </h2>
                        <?php endif; ?>


                        <?php if ( $subtitle ) : ?>
                          <h4 class="entry-subtitle">
                            <?php echo $subtitle; ?>
                          </h4>
                        <?php endif; ?>

                        <?php if ( $text ) : ?>
                          <p class="entry-text">
                            <?php echo $text; ?>
                          </p>
                        <?php endif; ?>

                      </div>
                    </div>
                  </div>
              </div>



            <?php endwhile; ?>
        </div>
        <div class="button-next">
            <span class="meditech-chevron-left-alt"></span>
        </div>
        <div class="button-prev">
            <span class="meditech-chevron-right-alt"></span>
        </div>
    </div>
    <a href="#featured" class="anchor">
        <?php echo print_svg( THEME_URI .'/images/double-arrow.svg' ); ?>
    </a>

    <div class="bg-img">
        <?php echo print_svg( THEME_URI . '/images/banner-mask.svg'); ?>
    </div>
</section>

<?php
endif;
