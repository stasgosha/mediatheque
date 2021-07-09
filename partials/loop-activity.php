<?php

$subtitle = get_field( 'subtitle', get_the_ID() );
$ages     = get_field( 'ages', get_the_ID() );
$type     = get_field( 'type', get_the_ID() );

?>
<div <?php post_class( 'entry-activity' ); ?> id="activity-<?php echo esc_html( $post->ID ); ?>">

	<a href="<?php the_permalink(); ?>" class="post-thumbnail">
		<?php H::the_post_thumbnail( 'upcoming-slide' ); ?>

		<div class="event-entry-details">
			<?php if ( $type ) : ?>

				<?php if ( 'movie' === $type ) : ?>
					<span class="icon meditech-film"></span>
				<?php else : ?>
					<span class="icon meditech-lady"></span>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( $ages ) : ?>
				<span class="icon">
					<span class="text">
						<?php echo $ages; ?>
					</span>
					<span class="meditech-plus small"></span>

				</span>
			<?php endif; ?>
		</div>
	</a>

	<div class="entry-content">
		<div class="entry-date">
			<div class="date-large">
				<?php echo get_the_date( 'd.m' ); ?>
			</div>
			<div class="date-sm">
				<?php echo get_the_date( 'יום D׳, h:i' ); ?>
			</div>
		</div>
		<a href="<?php the_permalink(); ?>" class="entryContentTitleLink">
			<h4 class="entry-title">
				<?php the_title(); ?>
			</h4>

			<?php if ( $subtitle ) : ?>
				<div class="entry-subtitle">
					<?php echo $subtitle; ?>
				</div>
			<?php endif; ?>
		</a>
		<a href="<?php the_permalink(); ?>" class="entry-link icon-hover">
			<span class="icon meditech-arrow-left"></span>
			<span class="icon meditech-arrow-left clone"></span>

		</a>
	</div>

	<?php if ( get_the_excerpt() ) : ?>
		<div class="entry-excerpt">
			<?php echo wp_trim_words( get_the_excerpt(), 15); ?>
		</div>
	<?php endif; ?>
</div>
