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
            ?>
        </div>
    </div>

    <button class="mobile-nav-bottom-btn buy-now-btn">רכישת כרטיסים</button>
</div>
