<div class="mobile-menu-wrap">
    <div class="container">
        <div class="entry-header">

            <?php get_template_part( 'partials/header/header-navigation' ); ?>
            <button class="mobile-menu-close-btn">
                <span class="meditech-close"></span>
            </button>
        </div>
        <div class="entry-body">
            <?php
            wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) );
            render_btn( __( 'לרכישת כרטיסים', 'ystheme' ), 'buy-now-btn' );
            ?>


        </div>
        <?php echo print_svg( THEME_URI . '/images/mobile-menu-bg.svg' ); ?>
    </div>
</div>
