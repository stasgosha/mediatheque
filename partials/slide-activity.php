<?php
/**
 * Activity slide
 *
 * @package WordPress
 */

$item_cat = get_the_terms( $post->ID, 'activity_cat' );
?>
<div <?php post_class( 'item-overlay' ); ?> id="exhibition-<?php echo esc_html( $post->ID ); ?>">
		<div class="post-thumbnail">
			<?php H::the_post_thumbnail( 'post-slide' ); ?>
		</div>
			<a href="<?php the_permalink(); ?>" class="entry-overlay">
				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>
				<?php if ( $item_cat ) : ?>
					<h6 class="entry-cat">
						<?php echo esc_html( $item_cat[0]->name ); ?>
					</h6>
				<?php endif; ?>
				<div class="entry-link">
					<?php esc_html_e( 'להזמנת כרטיסים', 'ystheme' ); ?>
					<span class="icon meditech-long-left"></span>
				</div>
			</a>
	</a>
</div>
