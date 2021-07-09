<?php

if ( ! class_exists( 'H' ) ) {
	return;
}
$date     = get_field( 'date' );
$pt       = get_post_type( get_the_ID() );
$pt_title = H::get_post_type_title( $pt );
$cat      = wp_get_post_terms( get_the_ID(), array( 'category', 'article_cat', 'news_cat', 'activity_cat' ) );
?>
<div <?php post_class( 'entry-article featured' ); ?> id="featured-<?php echo get_the_ID(); ?>">
		<a href="<?php the_permalink(); ?>">
			<div class="post-thumbnail">
				<?php H::the_post_thumbnail(); ?>
			</div>
			<div class="entry-overlay">

				<?php if ( $pt_title ) : ?>
					<div class="entry-cat">
						<?php echo $pt_title; ?>
					</div>
				<?php endif; ?>

				<div class="entry-content">
					<h4 class="entry-title">
						<?php
						the_title();

						echo 'mt_exhibition' === $pt ? '<br><span class="eng-text">' . get_field( 'english_name' ) . '</span>' : '';
						?>
					</h4>

					<?php if ( 'mt_event' === $pt && $date ) : ?>
						<div class="entry-subtitle">
							<?php echo date_i18n( 'd.m - יום D', strtotime( $date ) ); ?>
						</div>
					<?php elseif ( 'mt_activity' === $pt && $cat ) : ?>
						<div class="entry-subtitle">
							<?php echo $cat[0]->name; ?>
						</div>
					<?php endif; ?>
					<a href="<?php the_permalink(); ?>" class="entry-link">
						<span class="text">
							<?php _e( 'להזמנת כרטיסים', 'ystheme' ); ?>
						</span>
						<span class="icon meditech-long-left"></span>

					</a>
				</div>
			</div>
		</a>

</div>
