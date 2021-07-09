<?php
$date = gmdate( 'Y-m-d' );
$year = gmdate( 'Y' );
$week = gmdate( 'W', strtotime( $year ) );

$days = array();

?>
<section class="section events-results toggle-white-bg">
	<div class="container container-l">
		<div class="custom-row">
			<div class="col12">
				<div class="results-wrap">
					<?php echo events_query_by_day( $date, $year, (int) $week + 1 ); ?>
				</div>
			</div>
		</div>

	</div>
</section>
