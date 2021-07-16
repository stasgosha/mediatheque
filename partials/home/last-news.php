<section class="last-news-section">
	<div class="container">
		<div class="section-inner">
			<div class="section-column">
				<div class="section-caption">
					<!-- From archive -->
					<h2 class="sc-title lightblue"><?php echo get_field('news_title');?></h2>
				</div>

				<div class="last-news-list">
                    <?php
                    // параметры по умолчанию
                    $posts = get_posts( array(
                        'numberposts' => 3,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'post_type'   => 'mt_article',
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        ?>
                        <div class="last-news-card">
                            <div class="card-image">
                                <?php H::the_post_thumbnail( 'medium' ); ?>
                            </div>
                            <div class="card-content">
                                <h3 class="card-caption"><?php the_title(); ?></h3>
                                <div class="card-text">
                                    <p><?php H::the_excerpt( 15 ); ?></p>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="card-more-link">
                                    <span class="link-text"><?php _e( 'קראו עוד', 'ystheme' ); ?></span>
                                </a>
                            </div>
                        </div>
                        <?php
                    }

                    wp_reset_postdata(); // сброс
                    ?>
				</div>

				<div class="column-footer">
					<a href="<?php echo get_permalink(3279);?>" class="btn lightblue"><?php _e( ' לכל הכתבות', 'ystheme' ); ?></a>
				</div>
			</div>
			<div class="section-column">
				<div class="section-caption">
					<!-- Cartoon corner -->
					<h2 class="sc-title"><?php echo get_field('news_title_slider');?></h2>

					<div class="cartoon-slider">
                        <?php if( have_rows('news_slider') ): ?>
                            <?php
                            $i=0;
                            while( have_rows('news_slider') ): the_row(); ?>
                                <div class="slide">
                                    <div class="cartoon-card">
                                        <div class="card-image">
                                            <img src="<?php echo get_sub_field('image')['url'];?>" alt="<?php echo get_sub_field('image')['alt'];?>">
                                        </div>
                                        <div class="card-text">
                                            <p><?php echo get_sub_field('text');?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>