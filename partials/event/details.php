<?php
$award = get_field( 'award' );
$content = get_field( 'content' );
$review = get_field( 'review' );
$price = get_field( 'price' );
$duration = get_field( 'duration' );
$dates = get_field( 'event_display_dates' );
$now   = strtotime( 'now' );
$show = false;
if ( $dates ) {
    $start_date = strtotime( $dates[0]['ActualEventDate'] );
    $end_date   = strtotime( $dates[ ( count( $dates ) - 1 ) ]['ActualEventDate'] );
    if (  ( ! empty( $end_date ) && $end_date > $now ) || ( ! $end_date && $date > $now ) ) {
        $show = true;
    }
}
?>
<section class="event-details">
    <div class="container container-l">
        <div class="custom-row">
            <div class="col6 col-content eventPageContentWrap">
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
                <?php if ( $award ) : ?>
                    <div class="entry-award">
                        <span class="meditech-star icon"></span>
                        <?php echo $award; ?>
                        <span class="meditech-star icon"></span>
                    </div>
                <?php endif; ?>
                <?php if ( $content ) : ?>
                    <div class="entry-content">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
                <?php if ( $review ) : ?>
                    <div class="entry-review">
                        <h3 class="entry-title">
                            <?php _e( 'המלצת הצוות', 'ystheme' ); ?>
                        </h3>
                        <?php echo $review; ?>
                    </div>
                <?php endif; ?>
                <div class="d-flex eventPageLastContentRow">
                    <ul class="entry-details">
                        <?php if ( ! $show ) : ?>
                            <li class="entry-date">
                                    <span class="meditech-over icon over"></span>
                                    <span class="text over">
                                        <?php _e( 'הפעילות הסתיימה', 'ystheme' ); ?>
                                    </span>
                            </li>
                        <?php endif; ?>
                        <?php if ( $duration ) : ?>
                            <li>
                                <img src="/wp-content/themes/starter/images/clock.svg" alt="" class="icon" style="width:20px;height:20px;" />
                                <span class="text">
                                    <?php echo __( 'משך הפעילות:', 'ystheme' ) . ' ' . $duration; ?>
                                </span>
                            </li>
                        <?php endif; ?>
                        <?php if ( $price ) : ?>
                            <li>
                                <img src="/wp-content/themes/starter/images/ticket.svg" alt="" class="icon" style="width:20px;height:16px;" />
                                <span class="text">
                                    <?php echo wp_sprintf( __( 'מחיר כרטיס: ₪%s', 'ystheme' ), $price ); ?>
                                </span>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php
                    if ( $show ) {
                        render_btn( __('לרכישת כרטיסים', 'ystheme' ), 'buy-now-btn' );
                    }
                    ?>
                </div>
            </div>
            <div class="col6 event-gallery-column">
                <?php get_template_part( 'partials/event/gallery' ); ?>
            </div>
        </div>
    </div>
</section>
