<?php
$english_name = get_field( 'english_name', $post->ID );
?>
<div <?php post_class('item-overlay'); ?> id="exhibition-<?php echo $post->ID; ?>">
		<div class="post-thumbnail">
			<?php H::the_post_thumbnail( 'post-thumbnail' ); ?>
		</div>
			<a href="<?php the_permalink(); ?>" class="entry-overlay">
				<h4 class="entry-title">
					<?php the_title(); ?>
					<br>
					<?php echo $english_name; ?>
				</h4>
				<div class="entry-link">
					<?php _e( 'להזמנת כרטיסים', 'ystheme' ); ?>
					<span class="icon meditech-long-left"></span>
				</div>
			</a>
	</a>
</div>
