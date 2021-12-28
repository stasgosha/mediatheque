<?php
/**
 * Contact page main content
 *
 * @package WordPress
 */

$text          = get_field( 'text' );
$kupot         = get_field( 'kupot' );
$mazkirut      = get_field( 'mazkirut' );
$hug           = get_field( 'hug' );
$press         = get_field( 'press' );
$form_title    = get_field( 'form_title' );
$form          = get_field( 'form' );
$iframe        = get_field( 'iframe' );
$sidebar_title = get_field( 'sidebar_title' );
$waze          = get_field( 'waze' );
?>
<section class="contact-main-wrap">
    <div class="container container-l">
        <div class="section-inner">
            <div class="section-content">
                <h4 class="entry-subtitle">
                    דברו איתנו
                </h4>
                <?php if ( $text ) : ?>
                    <div class="entry-text">
                        <?php echo $text; ?>
                    </div>
                <?php endif; ?>
                <hr>

                <div class="d-flex">
                    <?php if( have_rows('contacts') ): ?>
                        <?php
                        $i=0;
                        while( have_rows('contacts') ): the_row(); ?>
                            <div class="wrap">
                                <h4 class="entry-subtitle">
                                    <?php echo get_sub_field('title_contact');?>
                                </h4>

                                <ul>
                                    <?php if( get_sub_field('points') ): ?>
                                        <?php while( has_sub_field('points') ): ?>
                                            <li>
                                                <span class="text">
                                                  <?php echo get_sub_field('contact');?>
                                                </span>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>


                </div>
                <!--				<hr>-->

                <div class="hide-desktop">
                    <?php if ( $sidebar_title ) : ?>
                        <h2 class="entry-title">
                            <?php echo $sidebar_title; ?>
                        </h2>
                    <?php

                    endif;

                    ?>

                    <?php if ( $waze ) : ?>
                        <a href="<?php echo $waze; ?>" class="waze-btn">
                            <img src="<?php echo THEME_URI . '/images/waze.svg' ?>" alt="waze">
                            <?php _e( 'נווטו עם waze', 'ystheme' ); ?>
                        </a>
                    <?php endif; ?>

                    <?php
                    if ( $iframe ) {
                        echo $iframe;
                    }
                    ?>

                </div>

                <div class="contact-us">
                    <?php if ( $form_title ) : ?>
                        <h4 class="entry-form-title">
                            <?php echo $form_title; ?>
                        </h4>
                    <?php endif; ?>

                    <?php echo H::render_cf7( 'form' ); ?>
                </div>

            </div>
            <div class="section-sidebar hide-mobile">

                <?php if ( $sidebar_title ) : ?>
                    <h2 class="entry-title">
                        <?php echo $sidebar_title; ?>
                    </h2>
                <?php
                endif;

                if ( $iframe ) {
                    echo $iframe;
                }
                ?>


            </div>
        </div>
    </div>
</section>
