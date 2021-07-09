<?php
$value = get_search_query() ? ' value="' . get_search_query() . '"' : '';
?>

<div class="header-search">

	<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
		<button class="search-submit" type="submit" role="button" aria-label="<?php _e( 'Search', 'ystheme' ); ?>" title="<?php _e( 'Search', 'ystheme' ); ?>">
			<span class="icon meditech-search" aria-hidden="true"></span>
		</button>
		<input class="search-input" type="search" name="s" placeholder="<?php _e( 'מה ברצונכם לחפש...', 'ystheme' ); ?>"<?php echo $value; ?>>

		<button class="search-close" aria-label="<?php _e( 'Close', 'ystheme' ); ?>" title="<?php _e( 'Close', 'ystheme' ); ?>">
			<span class="icon meditech-close" aria-hidden="true"></span>
		</button>
	</form>
</div>
