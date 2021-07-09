<?php

$date     = get_the_date( 'j F, Y' );
$subtitle = get_field( 'subtitle' );
$cat      = wp_get_post_terms( $post->ID, array( 'article_cat' ) );
?>
<div class="entry-details">
    <?php if ( $cat ) : ?>
        <div class="entry-cat">
            <span class="text">
                <?php _e( 'קטגוריה: ', 'ystheme' ); ?>
            </span>
            <a href="<?php echo get_term_link( $cat[0]->term_id ); ?>">
                <?php echo $cat[0]->name; ?>
            </a>
        </div>
    <?php endif; ?>


    <?php if ( $date ) : ?>
        <div class="entry-date">
            <?php
            echo $date;

            if ( $subtitle ) {
                echo ' / ' . $subtitle;
            }
            ?>
        </div>
    <?php endif; ?>
</div>
