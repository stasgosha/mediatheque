<section class="section mag-header" data-scroll-section>
    <div class="container">
        <div class="title-wrap">
            <div class="entry-behind">
                <?php _e( 'magazine', 'ystheme' ); ?>
            </div>
            <h1 class="entry-title" data-scroll data-scroll-speed="-1">
                <?php
                if ( is_tax( 'article_cat' ) ) {
                    single_cat_title( '' );
                }else{
                    the_title();
                }
                ?>
            </h1>

        </div>
        <?php yoast_breadcrumb( '<div class="breadcrumbs" data-scroll data-scroll-speed="-1">', '</div>' ); ?>

    </div>
</section>
