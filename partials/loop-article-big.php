<?php
$subtitle = get_field( 'subtitle' );
$is_tax   = is_tax( 'article_cat' );

?>
<div <?php post_class( 'entry-article big' ); ?> id="article-<?php echo $post->ID; ?>">
		<a href="<?php the_permalink(); ?>">
			<div class="post-thumbnail">
				<?php H::the_post_thumbnail( 'full' ); ?>
			</div>
		</a>
		<footer class="entry-footer" data-mh="entry-footer">
			<a href="<?php the_permalink(); ?>">
				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>
			</a>

			<p class="entry-excerpt">
				<?php H::the_excerpt( 100 ); ?>
			</p>
			<a href="<?php the_permalink(); ?>" class="entry-link icon-link">
				<span class="icon meditech-chevron-left purpleArrowIcon"></span>
				<span class="text">
					<?php _e( 'קראו עוד', 'ystheme' ); ?>
				</span>
			</a>

		</footer>
</div>
