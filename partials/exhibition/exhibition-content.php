<div class="exhibition-content">
    <div class="custom-row">
        <div class="col7 content">
            <div class="box-wrap">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php if ( get_field( 'DirectLink' ) ) : ?>
                    <div class="btn-wrap">
                        <a href="<?php echo get_field( 'DirectLink' ); ?>" class="btn black buy-btn">
                            <?php _e( 'לצפייה ורכישת קטלוג התערוכה', 'ystheme' ); ?>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="col5 sidebar">
            <?php
            get_template_part( 'partials/global/single-buy-form' );
            get_template_part( 'partials/exhibition/exhibition', 'sidebar' );
            ?>
        </div>
    </div>
</div>
