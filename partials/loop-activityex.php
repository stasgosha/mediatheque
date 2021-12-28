<?php

$subtitle = get_field( 'subtitle_post', get_the_ID() );
$ages     = get_field( 'ages', get_the_ID() );
$type     = get_field( 'type', get_the_ID() );
global $row_time;
?>
<div class="event-card" id="activity-<?php echo esc_html( $post->ID ); ?>">
	<div class="card-main">
		<p class="card-category"><?php echo wp_get_post_terms(get_the_ID(),'exhibition_cat')[0]->name;?></p>
		<h3 class="card-caption"><?php the_title(); ?></h3>
		<p class="card-subcaption"><?= $subtitle; ?></p>

         <?php if($row_time){ ?>
		<p class="card-date">שעה: <?php print_R($row_time);?></p>
        <?php } ?>
        <p class="card-subcaption"><?= $subtitle; ?></p>

        <?php
        $currentdate = date('d/m/Y');
        $date = get_field('date', false, false);
        $date = new DateTime($date);
        $date_post = $date->format('d/m/Y');
        $date_post2 = $date->format('Y-m-d');

        if (strtotime("now") < strtotime($date_post2)) {

            ?>
            <p class="card-date">שעה: <?php echo $date_post;?></p>
        <?php } ?>
	</div>
	<div class="card-side">
		<div class="card-image">
            <?php
            $thumb_id = get_post_thumbnail_id(get_the_ID());
            $thumb_url = wp_get_attachment_image_src($thumb_id,'search-result', true);
            $image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
            ?>
			<svg viewBox="0 0 185 245" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <mask id="event-card-image-mask" width="185" height="245">
                        <path fill="#fff" d="M9.63 244.52l165.74-21c5.32 0 9.63-4.3 9.63-9.62V9.62c0-5.3-4.31-9.61-9.63-9.61H9.63A9.63 9.63 0 000 9.61v225.3c0 5.3 4.31 9.61 9.63 9.61z"></path>
                    </mask>
                </defs>
                <image width="185" xlink:href="<?php echo $thumb_url[0]; ?>" mask="url(#event-card-image-mask)"></image>
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