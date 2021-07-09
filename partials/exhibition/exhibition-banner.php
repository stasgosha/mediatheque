<?php

$title    = get_field( 'bottom_banner_title' );
$content  = get_field( 'bottom_banner_content' );
$post_obj = get_field( 'bottom_banner_post_object' );


if ( ! $post_obj ) {
    return;
}

$args = array(
    'post_type'      => 'mt_exhibition',
    'posts_per_page' => 1,
    'p'              => $post_obj,
    'meta_query'	 => array(
        array(
            'key'	  => 'event_display_dates_$_ActualEventDate',
            'compare' => '>=',
            'value'	  => gmdate( 'Y-m-dTH:i:s'),
        ),
    )

);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {

?>
<div class="box-wrap black">
    <div class="custom-row">
        <div class="col7 banner-content">

            <?php if ( $title ) : ?>
                <h3 class="entry-title">
                    <?php echo $title; ?>
                </h3>
            <?php endif; ?>

            <div class="entry-content">
                <?php echo H::render_image( 'bottom_banner_img' ); ?>

                <?php if ( $content ) : ?>
                    <div class="content-wrap">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="col5 banner-buy-form">
            <?php
            while( $query->have_posts() ){
                $query->the_post();
                get_template_part( 'partials/global/single-buy-form' );
            }

            wp_reset_query();
            ?>

        </div>
    </div>
</div>
<?php
}
