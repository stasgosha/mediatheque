<?php
$categories  = wp_get_post_terms( $post->ID, array( 'category', 'activity_cat' ) );
?>
<div <?php post_class( 'entry-event' ); ?> id="article-<?php echo $post->ID; ?>">
		<a href="<?php the_permalink(); ?>">
			<div class="post-thumbnail">
				<?php H::the_post_thumbnail( 'post-thumbnail' ); ?>

				<?php if ( $categories && ! is_wp_error( $categories ) ) : ?>
					<span class="entry-cat">
							<?php echo $categories[0]->name; ?>
					</span>
				<?php endif; ?>
			</div>
		</a>
		<footer class="entry-footer" data-mh="entry-footer">
			<a href="<?php the_permalink(); ?>">
				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>
			</a>
			<a href="<?php the_permalink(); ?>" class="entry-link">
				<span class="text">
					<?php _e( 'למידע ורכישה', 'ystheme' ); ?>
				</span>
				<span class="icon meditech-long-left"></span>
			</a>

		</footer>
</div>
