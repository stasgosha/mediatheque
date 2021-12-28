<?php

$subtitle = get_field( 'subtitle', get_the_ID() );
$ages     = get_field( 'ages', get_the_ID() );
$type     = get_field( 'type', get_the_ID() );
global $row_time;
?>
<div class="event-card" id="activity-<?php echo esc_html( $post->ID ); ?>">
	<div class="card-main">
		<p class="card-category"><?php echo wp_get_post_terms(get_the_ID(),'event_cat')[0]->name;?></p>
		<h3 class="card-caption"><?php the_title(); ?></h3>
		<p class="card-subcaption"><?= $subtitle; ?></p>

         <?php if($row_time){ ?>
		<p class="card-date">שעה: <?php print_R($row_time);?></p>
        <?php } ?>
	</div>
	<div class="card-side">
		<div class="card-image">
            <?php
            $thumb_id = get_post_thumbnail_id(get_the_ID());
            $thumb_url = wp_get_attachment_image_src($thumb_id,'search-result', true);
            $image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
            ?>
			<svg viewBox="0 0 186 256">
                <defs>
                    <mask id="event-card-image-mask" width="186" height="256">
                        <path fill="#fff" d="M9.7 255.5l165.7-21c5.3 0 9.6-4.3 9.6-9.6V9.6c0-5.3-4.3-9.6-9.6-9.6H9.7A9.6 9.6 0 000 9.6V246c0 5.3 4.4 9.6 9.7 9.6z"></path>
                    </mask>
                </defs>
                <image width="186" height="256" xlink:href="<?php echo $thumb_url[0]; ?>" mask="url(#event-card-image-mask)" preserveAspectRatio="xMidYMid slice"></image>
            </svg>
		</div>
		<a href="<?php the_permalink(); ?>" class="card-button">מידע נוסף</a>
	</div>
</div>


<!-- <div <?php post_class( 'entry-activity' ); ?> id="activity-<?php echo esc_html( $post->ID ); ?>">

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
</div> -->