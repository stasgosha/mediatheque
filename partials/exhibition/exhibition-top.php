<?php

$text   = get_field( 'top_content' );
$img    = get_field( 'top_img' );
$credit = get_field( 'top_img_credit' );
?>

<div class="exhibition-top-content box-wrap">
    <div class="custom-row">
        <div class="col6">
            <?php if ( $text ) : ?>
                <div class="entry-content">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col6">
            <div class="img-wrap">
                <?php echo H::render_image( 'top_img', 'full' ); ?>

                <?php if ( $credit ) : ?>
                    <div class="bottom-img-credit">
                        <?php echo $credit; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
