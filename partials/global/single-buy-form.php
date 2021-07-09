<?php
$today      = gmdate( 'Y-m-dTh:s' );
$link       = get_field( 'DirectLink' );
$dates      = get_field( 'event_display_dates' );
$next_dates = array();

if ( $dates ) {
    foreach ( $dates as $key => $date ) {

        $row_date = gmdate( 'Y-m-dTh:s', strtotime( $date['ActualEventDate'] ) );

        if ( $row_date >= $today ) {
            $next_dates[] = $row_date;
        }
    }
}

if ( ! $next_dates ) {
    return;

}

?>
<div class="box-wrap">
    <h3 class="entry-title">
        <?php _e( 'בחרו מועד', 'ystheme' ); ?>
    </h3>
    <form class="single-buy-now-form buy-form" data-post-id="<?php echo get_the_ID(); ?>" data-dates="<?php echo htmlspecialchars( json_encode($next_dates), ENT_QUOTES, 'UTF-8'); ?>">
        <div class="date-picker-wrap">
            <input type="text" class="buy-now-date-picker" placeholder="<?php _e( 'בחירת תאריך', 'ystheme' ); ?>">
        </div>

        <a href="<?php echo $link; ?>" class="btn orange" target="_blank">
            <?php _e( 'לרכישת כרטיסים', 'ystheme' ); ?>
        </a>


    </form>
</div>
