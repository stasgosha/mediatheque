	<div <?php post_class( 'qa-item' ); ?> id="qa-<?php echo $post->ID; ?>">
		<div class="entry-header">
			<h4 class="entry-title">
				<?php the_title(); ?>
			</h4>
			<span class="meditech-plus icon"></span>
		</div>
		<div class="entry-body">
			<?php the_content(); ?>
		</div>
	</div>
