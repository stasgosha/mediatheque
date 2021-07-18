<?php
/**
 * Events calendar module
 *
 * @package WordPress
 */

$current = gmdate( 'Y-m-d' );
$year    = gmdate( 'Y' );
$month   = date_i18n( 'F', strtotime( gmdate( 'F' ) ) );
$day     = gmdate( 'j' );
$week    = (int) gmdate( 'W', strtotime( $year ) ) + 1; // get week.
$years   = array_combine( range( gmdate( 'Y' ), 2030 ), range( gmdate( 'Y' ), 2030 ) );
$months  = get_months();
$num     = gmdate( 'm', strtotime( $current ) );

?>
<section class="section events-calendar toggle-white-bg">
	<div class="container container-l">
		<div class="custom-row">
			<div class="col12">
				<div class="section-top-text">
					<?php the_content(); ?>
				</div>
				<div class="header-wrap">
					<div class="days-slider swiper-container">
						<div class="days-slider-wrapper">
							<?php
								$day_num  = gmdate( 'j' );
								$day_text = date_i18n( 'יום D׳, j F Y' );
							?>
								<div class="slide" data-value="<?php echo $day_num; ?>" data-date="<?php echo $current; ?>">
									<div class="text">
										<?php echo $day_text; ?>
									</div>
								</div>
						</div>
						<div class="button-next button">
							<span class="meditech-chevron-left"></span>
						</div>
						<div class="button-prev button">
							<span class="meditech-chevron-right"></span>

						</div>
					</div>

					<span role="button" class="calendar-sort-btn">סינון</span>
					<span class="meditech-calander calendar-btn"></span>

				</div>

				<div class="select-wrap">

					<select class="month-select events-select">
						<?php
						for ( $x = $num; $x < $num + 12; $x++ ) {
							$g = date_i18n( 'F', mktime( 0, 0, 0, $x, 1 ) );
							$m = date( 'm', mktime( 0, 0, 0, $x, 1 ) );
							?>

						<option value="<?php echo $m; ?>">
							<?php echo $g; ?>
						</option>

						<?php } ?>

					</select>

					<select class="year-select events-select">

						<?php foreach ( $years as $key => $value ) : ?>
							<option value="<?php echo $value; ?>">
								<?php echo $value; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="col12">
				<div class="calendar-wrap">
					<button type="button" name="prev" class="prev" disabled>
						<span class="meditech-arrow-right icon"></span>
						<span class="text">
							<?php _e( 'לשבוע הקודם', 'ystheme' ); ?>
						</span>
					</button>
					<div class="days-wrap">
						<ul>
							<?php
							for ( $i = 0; $i <= 6; $i++ ) :
								$ts             = strtotime( '+' . $i . ' day' );
								$day_num        = gmdate( 'j', $ts );
								$day_text       = str_replace( 'יום', '', date_i18n( 'l', $ts ) );
								$day_text_short = date_i18n( 'D', $ts );
								?>
								<li <?php echo $day_num === $day ? 'class="active"' : ''; ?> data-value="<?php echo $day_num; ?>">
									<a href="#day-<?php echo $i + 1; ?>">
										<span class="text">
											<span class="hide-desktop">
												<?php echo $day_text_short; ?>
											</span>
											<span class="hide-mobile">
												<?php echo $day_text; ?>
											</span>
										</span>
										<span class="num">
											<?php echo $day_num; ?>
										</span>
									</a>
								</li>
							<?php endfor; ?>
						</ul>
					</div>

					<button type="button" name="next" class="next">
						<span class="text">
							<?php _e( 'לשבוע הבא', 'ystheme' ); ?>
						</span>
						<span class="meditech-arrow-left icon"></span>

					</button>

				</div>

			</div>

		</div>
	</div>
</section>
