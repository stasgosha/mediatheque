<div class="col-lg-12 loop-post ">

    <?php if (wp_is_mobile()) { ?>

        <div class="post">
            <div <?php post_class(); ?> id="post-<?php echo $post->ID; ?>">
                <?php H::render_edit_post(); ?>

                <div class="post-block">
                    <div class="post-thumbnail">
                        <?php H::the_post_thumbnail('post-thumbnail'); ?>
                    </div>

                    <footer class="entry-footer" data-mh="entry-footer">
                        <h4 class="entry-title">
                            <?php the_title(); ?>
                        </h4>
                        <h5 class="entry-subtitle">
                            <?php echo get_field('subtitle_post'); ?>
                        </h5>
                        <p class="entry-excerpt">
                            <?php H::the_excerpt(13); ?>
                        </p>
                        <a href="<?php echo get_permalink(); ?>"> מידע נוסף
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 10 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.21374 0.623901L9.23623 2.83965L4.44997 7.20843L9.23623 11.5772L7.21374 13.793L0 7.20843L7.21374 0.623901Z" fill="white" />
                            </svg>
                        </a>
                    </footer>

                </div>
            </div>
        </div>

        <!-- <div class="event-card" id="activity-<?php echo esc_html($post->ID); ?>">
    <div class="card-main">
        <p class="card-category"><?php echo wp_get_post_terms(get_the_ID(), 'event_cat')[0]->name; ?></p>
        <h3 class="card-caption"><?php the_title(); ?></h3>
        <p class="card-subcaption"><?= $subtitle; ?></p>

        <?php if ($row_time) { ?>
            <p class="card-date">שעה: <?php print_R($row_time); ?></p>
        <?php } ?>
    </div>
    <div class="card-side">
        <div class="card-image">
            <?php
            $thumb_id = get_post_thumbnail_id(get_the_ID());
            $thumb_url = wp_get_attachment_image_src($thumb_id, 'search-result', true);
            $image_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
            ?>
            <svg viewBox="0 0 186 256">
                <defs>
                    <mask id="event-card-image-mask" width="186" height="256">
                        <path fill="#fff" d="M9.7 255.5l165.7-21c5.3 0 9.6-4.3 9.6-9.6V9.6c0-5.3-4.3-9.6-9.6-9.6H9.7A9.6 9.6 0 000 9.6V246c0 5.3 4.4 9.6 9.7 9.6z"></path>
                    </mask>
                </defs>

                <?php if (get_field('mobile_featured_image')) { ?>
                    <image width="186" height="256" xlink:href="<?php echo get_field('mobile_featured_image'); ?>" mask="url(#event-card-image-mask)" preserveAspectRatio="xMidYMid slice"></image>
                <?php } else { ?>
                    <image width="186" height="256" xlink:href="<?php echo $thumb_url[0]; ?>" mask="url(#event-card-image-mask)" preserveAspectRatio="xMidYMid slice"></image>
                <?php } ?>

            </svg>
        </div>
        <a href="<?php the_permalink(); ?>" class="card-button">למידע נוסף</a>
    </div>
</div> -->

    <?php } else { ?>


        <div class="post">
            <div <?php post_class(); ?> id="post-<?php echo $post->ID; ?>">
                <?php H::render_edit_post(); ?>

                <div class="post-block">
                    <div class="post-thumbnail">
                        <?php H::the_post_thumbnail('post-thumbnail'); ?>
                    </div>

                    <footer class="entry-footer" data-mh="entry-footer">
                        <h4 class="entry-title">
                            <?php the_title(); ?>
                        </h4>
                        <h5 class="entry-subtitle">
                            <?php echo get_field('subtitle_post'); ?>
                        </h5>
                        <p class="entry-excerpt">
                            <?php H::the_excerpt(13); ?>
                        </p>
                        <a href="<?php echo get_permalink(); ?>"> מידע נוסף
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 10 14" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.21374 0.623901L9.23623 2.83965L4.44997 7.20843L9.23623 11.5772L7.21374 13.793L0 7.20843L7.21374 0.623901Z" fill="white" />
                            </svg>
                        </a>
                    </footer>

                </div>
            </div>
        </div>

    <? } ?>

</div>