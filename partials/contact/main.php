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
        <div class="custom-row">
            <div class="col8">
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


                    <?php if ( $kupot ) : ?>
                        <div class="wrap">
                            <h4 class="entry-subtitle">
                                <?php echo $kupot['title']; ?>
                            </h4>

                            <ul>
                                <li>
										<span class="text">
											<?php echo $kupot['address']; ?>
										</span>
                                </li>
                                <li>
										<span class="text">
											<?php _e( 'טלפון: ', 'ystheme' ); ?>
										</span>
                                    <a href="tel:<?php echo $kupot['phone']; ?>">
                                        <?php echo $kupot['phone']; ?>
                                    </a>
                                </li>

                                <?php if ( $kupot['fax'] ) : ?>

                                    <li>
											<span class="text">
												<?php _e( 'פקס: ', 'ystheme' ); ?>
											</span>
                                        <a href="#">
                                            <?php echo $kupot['fax']; ?>
                                        </a>
                                    </li>

                                <?php endif; ?>
                            </ul>
                        </div>


                    <?php endif; ?>

                    <?php if ( $mazkirut ) : ?>
                        <div class="wrap">
                            <h4 class="entry-subtitle">
                                <?php echo $mazkirut['title']; ?>
                            </h4>

                            <ul>
                                <li>
										<span class="text">
											<?php _e( 'טלפון: ', 'ystheme' ); ?>
										</span>
                                    <a href="tel:<?php echo $mazkirut['phone']; ?>">
                                        <?php echo $mazkirut['phone']; ?>
                                    </a>
                                </li>

                                <?php if ( $mazkirut['fax'] ) : ?>

                                    <li>
											<span class="text">
												<?php _e( 'פקס: ', 'ystheme' ); ?>
											</span>
                                        <a href="#">
                                            <?php echo $mazkirut['fax']; ?>
                                        </a>
                                    </li>

                                <?php endif; ?>
                            </ul>
                        </div>


                    <?php endif; ?>


                    <?php if ( $hug ) : ?>
                        <div class="wrap">
                            <h4 class="entry-subtitle">
                                <?php echo $hug['title']; ?>
                            </h4>

                            <ul>
                                <li>
										<span class="text">
											<?php _e( 'טלפון: ', 'ystheme' ); ?>
										</span>
                                    <a href="tel:<?php echo $hug['phone']; ?>">
                                        <?php echo $hug['phone_text']; ?>
                                    </a>
                                </li>

                                <?php if ( $hug['fax'] ) : ?>

                                    <li>
											<span class="text">
												<?php _e( 'פקס: ', 'ystheme' ); ?>
											</span>
                                        <a href="#">
                                            <?php echo $hug['fax']; ?>
                                        </a>
                                    </li>

                                <?php endif; ?>
                            </ul>
                        </div>


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
            <div class="col4 hide-mobile">

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
