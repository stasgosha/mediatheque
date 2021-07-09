<?php

$logos = get_field( 'footer_logos', 'option' );

if ( $logos ) : ?>
<div class="swiper-container footer-logos">
    <div class="swiper-wrapper">
        <?php
        foreach( $logos as $logo ) :
            ?>

            <div class="swiper-slide">
                <?php echo wp_get_attachment_image( $logo, 'full' ); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
