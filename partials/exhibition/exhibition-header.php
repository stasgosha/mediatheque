<?php

$title        = get_field( 'title' );
$video        = get_field( 'video' );
$eng_title    = get_field( 'english_name' );
$dates        = get_field( 'event_display_dates' );
$price        = get_field( 'price' );
$now          = strtotime( 'now' );
?>
<div class="exhibition-header">
    <div class="entry-title-wrap">

        <?php if ( $video ) : ?>
            <a href="<?php echo $video; ?>" class="yBox yBox_iframe" rel="nofollow" title="Click Here"></a>
        <?php endif; ?>
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
        <?php if ( $eng_title ) : ?>
            <h3 class="eng-text">
                <?php echo $eng_title; ?>
            </h3>
        <?php endif; ?>
        <div class="anchor-wrap">
            <a href="#" class="header-anchor">
                <span class="icon meditech-long-down"></span>
            </a>
        </div>

    </div>
    <div class="header-inner-wrap box-wrap">
        <?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>

        <ul class="entry-details">

            <?php if ( $dates ) : ?>

                <li class="entry-date">
                    <?php
                    $start_date = strtotime( $dates[0]['ActualEventDate'] );
                    $end_date   = strtotime( $dates[ ( count( $dates ) - 1 ) ]['ActualEventDate'] );

                    if ( ( ! empty( $end_date ) && $end_date < $now ) || ( ! $end_date && $date < $now ) ) :

                        ?>
                        <span class="meditech-clock-over icon over"></span>
                        <span class="text over">
                            <?php _e( 'הפעילות הסתיימה', 'ystheme' ); ?>
                        </span>
                    <?php else :  ?>
                        <span class="meditech-calander icon highlight"></span>

                        <span class="text">
                        <?php if ( $end_date ) {
                            echo date_i18n( 'j F', $start_date ) . ' - ' . date_i18n( 'j F, Y', $end_date );
                        }else{
                            echo date_i18n( 'j F, Y', $start_date );
                        } ?>
                         </span>
                    <?php endif; ?>
                </li>

            <?php endif; ?>


            <?php if ( $price ) : ?>
                <li>
                    <span class="meditech-ticket icon"></span>
                    <span class="text">
                        <?php echo wp_sprintf( __('מחיר כרטיס: ₪%s', 'ystheme' ) , $price ); ?>
                    </span>
                </li>
            <?php endif; ?>

        </ul>

        <?php if ( $title ) : ?>
            <h2 class="text-right-border">
                <?php echo $title; ?>
            </h2>
        <?php endif; ?>
    </div>

</div>
