<div class="col-lg-12 col-md-4 loop-post">
    <div <?php post_class(); ?> id="post-<?php echo $post->ID; ?>">
        <?php H::render_edit_post(); ?>

        <div class="post-block">
            <div class="post-thumbnail">
                <?php H::the_post_thumbnail( 'post-thumbnail' ); ?>
            </div>

            <footer class="entry-footer" data-mh="entry-footer">
                <h4 class="entry-title">
                    <?php the_title(); ?>
                </h4>
                <h5 class="entry-subtitle">
                    <?php echo get_field('subtitle_post');?>
                </h5>
                <p class="entry-excerpt">
                    <?php H::the_excerpt( 13 ); ?>
                </p>
                <a href="<?php echo get_permalink(); ?>">                    למידע נוסף
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 10 14" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.21374 0.623901L9.23623 2.83965L4.44997 7.20843L9.23623 11.5772L7.21374 13.793L0 7.20843L7.21374 0.623901Z" fill="white"/>
                    </svg>
                </a>
            </footer>

        </div>
    </div>
</div>

