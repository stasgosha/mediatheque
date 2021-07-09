<?php

$white_logo          = get_field( 'white_logo', 'option' );
$black_logo          = get_field( 'black_logo', 'option' );
$meditech_white_logo = get_field( 'meditech_white_logo', 'option' );
$meditech_black_logo = get_field( 'meditech_black_logo', 'option' );

?>

<div class="site-logo">
	<a href="<?php echo home_url(); ?>" aria-label="<?php _e( 'Logo', 'ystheme' ); ?>">
		<span class="white">
			<?php echo wp_get_attachment_image( $white_logo, 'full' ); ?>
		</span>
	</a>
	<span class="white">
		<?php echo wp_get_attachment_image( $meditech_white_logo, 'full' ); ?>
	</span>
</div>
