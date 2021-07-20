
<div <?php post_class( 'entry-article' ); ?> id="article-<?php echo $post->ID; ?>">
		<a href="<?php the_permalink(); ?>">
			<div class="post-thumbnail">
				<?php H::the_post_thumbnail( 'medium' ); ?>
			</div>
		</a>
		<footer class="entry-footer" data-mh="entry-footer">
			<a href="<?php the_permalink(); ?>">
				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>
            </a>

            <div class="entry-meta">
                <?php echo get_the_date('d.m.y');?> <?php if(get_field('author')){ ?> /<?php } ?>  <?php echo get_field('author');?>
            </div>

			<p class="entry-excerpt">
				<?php H::the_excerpt( 15 ); ?>
			</p>
			<a href="<?php the_permalink(); ?>" class="entry-link icon-link">
				<span class="icon meditech-chevron-left purpleArrowIcon"></span>
				<span class="text">
					<?php _e( 'קראו עוד', 'ystheme' ); ?>
				</span>
			</a>
		</footer>
</div>
