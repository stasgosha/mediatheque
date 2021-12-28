<?php /* Template Name: Arhive */

get_header();

?>

	<div class="archive-top-section">
		<div class="container container-l">
			<div class="section-inner">
                <?php if( have_rows('text') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('text') ): the_row(); ?>
                        <div class="section-column">
                            <?php if(get_sub_field('title')){ ?>
                            <h3 class="column-caption"><?php echo get_sub_field('title');?></h3>
                            <?php } ?>
                            <p><?php echo get_sub_field('text');?></p>

                            <?php if(get_sub_field('link_button')){ ?>
                            <a href="<?php echo get_sub_field('link_button');?>" class="btn btn-small"><?php echo get_sub_field('text_link');?></a>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container container-l">
		<div class="archive-grid">
			<?php
            query_posts(array(

                'post_type' => array('post','mt_exhibition','mt_event','mt_news','mt_article','products'),
                'post__in' => get_field('posts'),
                'posts_per_page' => -1,
            ));

       
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>

						<div class="post-card">
							<a href="<?php echo get_permalink();?>" class="card-image">
                                <?php H::the_post_thumbnail( 'post-thumbnail' ); ?>
							</a>
							<div class="card-content">
								<h3 class="card-caption">
									<a href="<?php echo get_permalink();?>"><?php the_title(); ?></a>
								</h3>
								<div class="card-text">
									<p>    <?php H::the_excerpt( 13 ); ?></p>
								</div>

								<a href="<?php echo get_permalink();?>" class="entry-link icon-link">
									<span class="icon meditech-chevron-left"></span>
									<span class="text">
										קראו עוד
									</span>
								</a>
							</div>
						</div>

					<?php
				}
			} else {
				esc_html_e( 'Sorry, no posts found.', 'ystheme' );
			}
			?>
		</div>

        <?php if(get_sub_field('link_button')){ ?>
			<div class="archive-mobile-footer">
        	    <a href="<?php echo get_sub_field('link_button');?>" class="btn btn-small"><?php echo get_sub_field('text_link');?></a>
			</div>
        <?php } ?>

		<?php // get_template_part( 'pagination' ); ?>
	</div>

<?php
	get_footer();
?>