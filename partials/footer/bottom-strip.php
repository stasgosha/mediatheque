<div class="bottom-strip d-lg-none d-flex">
	<a href="tel:<?php the_field( 'phone', 'option' ); ?>" class="btn">
		<span class="fa fa-phone" aria-hidden="true"></span>
		<span class="entry-text"><?php _e( 'Call Us', 'ystheme' ); ?></span>
	</a>
	<a href="#" class="btn btn-hidden-form-toggle js" rel="nofollow">
		<span class="fa fa-envelope" aria-hidden="true"></span>
		<span class="entry-text"><?php _e( 'Contact Us', 'ystheme' ); ?></span>
	</a>

	<div class="bottom-strip-hidden-form">
		<button class="btn-close-hidden-form" aria-label="<?php _e( 'Toggle Main Menu', 'ystheme' ); ?>" title="<?php _e( 'Toggle Main Menu', 'ystheme' ); ?>">
			<span class="icomoon icomoon-close" aria-hidden="true"></span>
		</button>
		<?php H::render_cf7( 'footer_hidden_cf' ); ?>
	</div>
</div>
