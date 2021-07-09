<?php

if ( ! class_exists( 'H' ) ) {
	return;
}
$pt       = get_post_type( get_the_ID() );
$pt_title = H::get_post_type_title( $pt );
?>
<div <?php post_class( 'entry-buy-now' ); ?> id="activity-<?php echo get_the_ID(); ?>">
		<a href="<?php the_permalink(); ?>">
            <h4 class="entry-title">
                <?php
                the_title();
                echo 'mt_exhibition' === $pt ? '<br><span class="eng-text">' . get_field( 'english_name' ) . '</span>' : '';
                ?>
            </h4>
            <p class="entry-excerpt">
                <?php H::the_excerpt( 200 ); ?>
            </p>
			<div class="post-thumbnail">
				<?php H::the_post_thumbnail(); ?>
			</div>
		</a>

</div>
