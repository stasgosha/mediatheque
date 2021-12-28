<?php
/**
 * News bar
 *
 * @package WordPress
 */

$show_news_ticker = get_field( 'show_news_ticker' );

if ( ! $show_news_ticker ) {
	return;
}

$today = gmdate( 'Ymd' );

$args = array(
	'post_type'  => 'mt_news',
	'meta_query' => array(
		array(
			'key'     => 'start_date',
			'compare' => '<=',
			'value'   => $today,
		),
		array(
			'key'     => 'end_date',
			'compare' => '>=',
			'value'   => $today,
		),
	),
);


$query = new WP_Query( $args );

if ( $query->have_posts() ) {

	?>
<div class="news-bar-wrap">

	<div class="acme-news-ticker">
		<!-- <div class="acme-news-ticker-label">
			<?php esc_html_e( 'חדשות', 'ystheme' ); ?>
		</div> -->

		<div class="acme-news-ticker-box">
			<ul class="news-bar-ticker">

				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					$text       = get_field( 'news_text' );
					$start_date = get_field( 'start_date' );

					if ( $text && $start_date ) {

						?>
					<li>
						<span class="date">
							<?php echo $start_date; ?>
						</span>
						<span class="text">

						</span>
						<?php echo $text; ?>
					</li>

						<?php
					}
				endwhile;
				wp_reset_postdata();
				?>
			</ul>

		</div>
		<div class="acme-news-ticker-controls acme-news-ticker-horizontal-controls">
			<button class="acme-news-ticker-pause">
				<span class="meditech-pause pause-icon"></span>
				<span class="meditech-play play-icon"></span>
			</button>
		</div>
	</div>
</div>
	<?php
}
