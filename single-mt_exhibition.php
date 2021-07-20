<?php
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <section class="exhibition-page-section">
        <div class="container container-l">
            <?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>

            <div class="section-inner">
                <div class="section-sidebar">
                    <div class="exhibition-card">
                        <div class="card-image">
                            <?php
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'slider-images', true);
                            $image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
                            ?>

                            <svg viewBox="0 0 520 475" preserveAspectRatio="xMidYMid slice">
                                <defs>
                                    <mask id="exhibition-card-image-mask" width="520" height="475">
                                        <path fill="#fff" d="M492.93 0H27.37A27.05 27.05 0 00.3 27v420.5a27.07 27.07 0 0027.07 27.04l465.56-59.02A27.04 27.04 0 00520 388.48V27.01C520 12.09 507.89 0 492.93 0z"></path>
                                    </mask>
                                </defs>
                                <image width="520" xlink:href="<?php echo $thumb_url[0]; ?>" mask="url(#exhibition-card-image-mask)"></image>
                            </svg>
                        </div>
                        <div class="card-content">
                            <div class="card-content-inner">
                                <p class="card-category"><?php echo wp_get_post_terms( get_the_ID(), 'exhibition_cat' )[0]->name; ?></p>
                                <h3 class="card-caption"><?php the_title(); ?></h3>
                                <div class="card-text">
                                    <p><?php echo get_field('subtitle_post');?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <!-- Вывод через условие -->
                    <?php if(get_field('show_exhibition_information')){ ?>
                    <div class="section-info">
                        <ul class="info-list">
                            <!-- Выводится когда событие уже прошло -->
                            <?php

                            $currentdate = date('H:i d/m/Y');
                            $date = get_field('date', false, false);
                            $date = new DateTime($date);
                            $date_post = $date->format('H:i d/m/Y');
                            $date_post2 = $date->format('Y-m-d');

                            if (strtotime("now") > strtotime($date_post2)) {

                                ?>
                            <li class="red">
                                <svg class="item-icon">
                                    <use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#calendar"></use>
                                </svg>
                                <div class="item-text">
                                    <strong>הפעילות הסתיימה</strong>
                                </div>
                            </li>
                            <?php }else{ ?>

                                <li>
                                    <svg class="item-icon">
                                        <use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#tick"></use>
                                    </svg>
                                    <div class="item-text">
                                        <strong>פעילות מאושרת סל תרבות</strong>
                                    </div>
                                </li>
                            <?php } ?>

                        </ul>

                        <hr>

                        <ul class="info-list">
                            <li>
                                <svg class="item-icon">
                                    <use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#calendar"></use>
                                </svg>
                                <div class="item-text">

                                    <strong>תאריך:</strong> <?php
                                    echo $date_post.' - ';
                                    echo date_i18n( 'l', $date->format('l') );
                                    ?>

                                </div>
                            </li>
                            <li>
                                <svg class="item-icon">
                                    <use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#clock"></use>
                                </svg>
                                <div class="item-text">
                                    <strong>משך זמן פעילות:</strong><?php echo get_field('duration');?>
                                </div>
                            </li>
                            <li>
                                <svg class="item-icon">
                                    <use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#age"></use>
                                </svg>
                                <div class="item-text">
                                    <strong>גילים:</strong> <?php echo get_field('ages');?>
                                </div>
                            </li>
                            <li>
                                <svg class="item-icon">
                                    <use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#price"></use>
                                </svg>
                                <div class="item-text">
                                    <strong>מחיר כרטיס:</strong> <?php echo get_field('price');?>
                                </div>
                            </li>
                        </ul>
                        <?php   if (strtotime("now") < strtotime($date_post2)) {?>
                            <div class="info-footer">

                                <a href="#" class="buy-now-btn btn yellow">רכישת כרטיסים</a>
                            </div>
                        <?php }    ?>

                    </div>
                    <?php } ?>
                    <div class="content-wrap">
                       <?php the_content(); ?>
                        <?php if( have_rows('links') ): ?>
                            <div class="links-list">
                                <?php
                                $i=0;
                                while( have_rows('links') ): the_row(); ?>
                                    <a href="<?php echo get_sub_field('link');?>" class="entry-link icon-link">
                                        <span class="icon meditech-chevron-left"></span>
                                        <span class="text"><?php echo get_sub_field('text');?></span>
                                    </a>
                                <?php endwhile; ?>

                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="section-slider">
                        <div class="swiper-container images-slider">
                            <div class="button-next">
                                <span class="meditech-chevron-left-alt"></span>
                            </div>
                            <div class="button-prev">
                                <span class="meditech-chevron-right-alt"></span>
                            </div>
                            <div class="swiper-wrapper">
                                <?php $slider=get_field('gallery');
                                if($slider){
                                    foreach ($slider as  $value){?>
                                        <div class="swiper-slide">
                                            <img width="792" height="455" src="<?php print_R($value['url']);?>" class="attachment-full size-full" alt="" />
                                        </div>
                                    <?php } } ?>
                            </div>
                        </div>
                        <div class="swiper-container thumbs-slider">
                            <div class="swiper-wrapper">
                                <?php $slider=get_field('gallery');
                                if($slider){
                                    foreach ($slider as  $value){?>
                                        <div class="swiper-slide">
                                            <img  width="300" height="172"  src="<?php print_R($value['sizes']['search-result-item']);?>" class="attachment-full size-medium" alt="" />
                                        </div>
                                    <?php } } ?>
                            </div>
                        </div>
                    </div>
                     <?php   if (get_field('show_gallery_text')) {?>
                    <div class="section-footer content-wrap">
                        <h3 class="section-footer-caption"><?php echo get_field('title_gallery');?></h3>
                        <div class="section-footer-text">
                            <p><?php echo get_field('text_gallery');?></p>
                        </div>

                        <a href="#" class="buy-now-btn btn yellow"> <?php echo get_field('gallery_text_button');?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </section>

    <?php
    get_template_part( 'partials/related', 'exhibitions' );
    ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>