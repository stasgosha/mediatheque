<?php

$start_date      = get_field( 'availableforsalefrom' );
$end_date        = get_field( 'availableforsaleuntil' );
$add_to_cart_url = get_field( 'addtobasketlinkdelegate' );
$today           = time();
if ( $start_date ) {
    $start_ts   = strtotime( $start_date );
    $start_date = gmdate( 'd.m.y', $start_ts );

}

if ( $end_date ) {
    $end_ts   = strtotime( $end_date );
    $end_date = gmdate( 'd.m.y', $end_ts );
}

?>

<div <?php post_class('entry-product-wide'); ?> id="product-<?php echo $post->ID; ?>">
			<div class="post-thumbnail">
                <?php H::the_post_thumbnail( 'large' ); ?>
			</div>

			<div class="entry-content">

                <?php if ( isset( $end_date ) && $end_date < $today ) : ?>
                    <span class="out-of-stock">
                        <?php _e( 'אזל מהמלאי', 'ystheme' ); ?>
                    </span>
                <?php endif; ?>

				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>


                <?php if ( $start_date ) : ?>
                    <div class="entry-date">
                        <?php
                        echo $start_date;

                        if ( $end_date ) {
                            echo ' - ' . $end_date;
                        }
                        ?>
                    </div>

                <?php endif; ?>
				<p class="entry-excerpt">
					<?php the_field( 'description' ); ?>
				</p>
                <div class="entry-price">
                    <?php echo __('מחיר:', 'ystheme' ) . ' ' . '80 ש״ח';  ?>
                </div>
                <?php if ( $today >= $start_ts && $today <= $end_ts ) : ?>
                    <div class="buy-wrap">
                        <div class="quantity-wrap">
                            <span class="text">
                                <?php _e('כמות:', 'ystheme' ); ?>
                            </span>
                            <select class="" name="">
                                <?php for( $i = 1; $i <= 10; $i++ ) : ?>
                                    <option value="<?php echo $i ?>">
                                        <?php echo $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <?php if ( $add_to_cart_url ) : ?>
                            <a href="<?php echo $add_to_cart_url; ?>" class="entry-link">
                                <span class="text">
                                    <?php _e( 'לרכישה', 'ystheme' ); ?>
                                </span>
                                <span class="icon meditech-long-left"></span>
                            </a>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

			</div>
	</div>
