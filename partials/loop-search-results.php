<div <?php post_class('entry-activity-wide entry-search-results'); ?> id="post-<?php echo $post->ID; ?>">
		<?php H::render_edit_post(); ?>

			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php H::the_post_thumbnail( 'large' ); ?>
				</a>
			</div>

			<div class="entry-content">
				<a href="<?php the_permalink(); ?>">
					<h4 class="entry-title">
						<?php the_title(); ?>
					</h4>
				</a>
				<p class="entry-excerpt">
					<?php H::the_excerpt( 25 ); ?>
				</p>
				<a href="<?php the_permalink(); ?>" class="entry-link">
					<span class="text">
						<?php _e( 'קראו עוד', 'ystheme' ); ?>
					</span>
					<span class="icon meditech-long-left"></span>

				</a>
			</div>
	</div>
