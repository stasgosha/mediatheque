<?php
$today = gmdate( 'Ymd h:s' );

$args = array(
    'post_type'      => array( 'mt_event' ),
    'posts_per_page' => -1,
    'meta_query'	=> array(
		array(
			'key'		=> 'event_display_dates_$_ActualEventDate',
			'compare'	=> '>=',
			'value'		=> gmdate( 'Y-m-dTH:i:s' ),
		),
	)
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
?>

<form class="buy-now-form buy-form">

    <select class="event-select" name="">
        <option value="">בחרו פעילות</option>
        <?php
        while( $query->have_posts() ) :
            $query->the_post();
            $dates = get_field( 'event_display_dates' );
            $show  = false;

            if ( $dates ) {
                foreach ( $dates as $key => $date ) {

                    $row_date = gmdate( 'Ymd h:s', strtotime( $date['ActualEventDate'] ) );

                    if ( $row_date >= $today ) {
                        $show = true;
                    }

                }
            }

            if ( $show ) :
                ?>

                <option value="<?php echo get_the_ID(); ?>">
                    <?php echo get_the_title(); ?>
                </option>

            <?php
            endif;
            endwhile;
            wp_reset_postdata();
            ?>
    </select>
    <div class="date-picker-wrap">
        <input type="text" class="buy-now-date-picker" placeholder="<?php _e( 'בחרו תאריך', 'ystheme' ); ?>" disabled="disabled">
    </div>
    <div class="hidden-fields">
        <?php render_btn( __( 'לרכישת כרטיסים', 'ystheme' ) ); ?>
    </div>


</form>
<?php else : ?>
<p class="no-events">
    <?php _e( 'אין אירועים קרובים', 'ystheme' ); ?>
</p>
<?php endif; ?>
