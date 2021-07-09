<?php
$date = get_field( 'date', $post->ID );
?>
<div <?php post_class('item-overlay'); ?> id="exhibition-<?php echo $post->ID; ?>">
		<div class="post-thumbnail">
			<?php H::the_post_thumbnail( 'post-thumbnail' ); ?>
		</div>
			<a href="<?php the_permalink(); ?>" class="entry-overlay">
				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>

				<h6 class="entry-date">
						<?php echo $date; ?>
				</h6>
				<div class="entry-link">
					<?php _e( 'להזמנת כרטיסים', 'ystheme' ); ?>
					<span class="icon meditech-long-left"></span>
				</div>
			</a>
	</a>
</div>
