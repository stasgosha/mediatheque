<?php

$white_logo          = get_field( 'white_logo', 'option' );
$black_logo          = get_field( 'black_logo', 'option' );
$meditech_white_logo = get_field( 'meditech_white_logo', 'option' );
$meditech_black_logo = get_field( 'meditech_black_logo', 'option' );
$white_logo_link = get_field( 'white_logo_link', 'option' );
$meditech_white_logo_link = get_field( 'meditech_white_logo_link', 'option' );

?>

<div class="site-logo">
	<a href="<?php echo $white_logo_link; ?>" aria-label="<?php _e( 'Logo', 'ystheme' ); ?>">
		<span class="white">
			<?php echo wp_get_attachment_image( $white_logo, 'full' ); ?>
		</span>
	</a>
    <a href="<?php echo $meditech_white_logo_link; ?>" class="white">
		<?php echo wp_get_attachment_image( $meditech_white_logo, 'full' ); ?>
	</a>
</div>
