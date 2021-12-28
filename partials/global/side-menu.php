<div class="side-menu-wrap" id="buy-now">
    <div class="entry-header">
        <button class="side-menu-close-btn">
            <span class="meditech-close"></span>
        </button>

        <h4 class="entry-title">
            <?php _e( 'רכישת כרטיסים', 'ystheme' ); ?>
        </h4>
    </div>
    <div class="container">

        <div class="entry-body">
            <?php get_template_part( 'partials/global/buy-now-form' ); ?>
            <div class="buy-now-results"></div>
        </div>
    </div>
</div>

<div class="side-menu-wrap" id="book-tour">
    <div class="entry-header">
        <button class="side-menu-close-btn">
            <span class="meditech-close"></span>
        </button>

        <h4 class="entry-title">
            <?php _e( 'הזמנת סיור פרטי', 'ystheme' ); ?>
        </h4>
    </div>
    <div class="container">

        <div class="entry-body">
            <div class="book-tour-form">
                <?php echo do_shortcode('[contact-form-7 id="10845" title="הזמנת סיור פרטי"]');?>
            </div>
        </div>
    </div>
</div>