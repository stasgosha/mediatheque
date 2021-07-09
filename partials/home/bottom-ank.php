<?php

$active  = get_field( 'ank_active_2' );

if ( ! $active ) {
    return;
}

$type   = get_field( 'ank_type_2' );
$color  = get_field( 'ank_color_2' );
$title  = get_field( 'ank_title_2' );
$text   = get_field( 'ank_text_2' );
$answer = get_field( 'ank_answer_2' );
$img    = get_field( 'ank_image_2' );

?>

<section class="section ank bottom-ank <?php echo $color . ' ' . 'type-' . $type; ?>">

    <div class="ank-wrap">
        <?php if ( $title ) : ?>
            <h3 class="entry-title">
                <?php echo $title; ?>
            </h3>
        <?php endif; ?>

        <?php if ( $text ) : ?>
            <p class="entry-text">
                <?php echo $text; ?>
            </p>
        <?php endif; ?>


        <?php if ( '1' == $type ): ?>
            <a href="#" class="entry-link icon-link">
                <span class="icon meditech-chevron-left"></span>
                <span class="text">
                    <?php _e( 'תשובה', 'ystheme' ); ?>
                </span>
            </a>

            <?php if ( $answer ) : ?>
                <div class="answer-wrap">
                    <h4 class="entry-title">
                        <?php _e( 'תשובה', 'ystheme' ); ?>
                    </h4>

                    <p class="entry-text">
                        <?php echo $answer; ?>
                    </p>
                    <hr>
                    <p class="entry-text">
                        <?php _e( 'אם צדקתם סימן שאתם ממש אלופים בסרטים :)', 'ystheme' ); ?>
                    </p>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>

    <div class="img-wrap">
        <?php echo wp_get_attachment_image( $img, 'full' );?>
    </div>

    <div class="bg-wrap">
        <?php echo print_svg( THEME_URI . '/images/teeth.svg' ); ?>
    </div>

</section>
