<?php
/**
 * Home banner
 *
 * @package WordPress
 */

$active = get_field( 'banner_active', $post->ID );
$title  = get_field( 'banner_title', $post->ID );
$text   = get_field( 'banner_text', $post->ID );
$link   = get_field( 'banner_link', $post->ID );

if ( $active ) : ?>
<section class="section banner-section">
	  <div class="container container-s">
		<div class="custom-row">
			  <div class="col6">

				<h2 class="entry-title">
					<?php echo $title; ?>
				</h2>

				<?php if ( $text ) : ?>
					<p class="entry-text">
						<?php echo $text; ?>
					</p>
				<?php endif; ?>

				<?php
				if ( $link ) {
					render_btn( $link['title'], false, $link['url'] );
				}
				?>
			</div>
		</div>

		<?php H::render_image( 'banner_image', 'full' ); ?>
	  </div>
</section>
	<?php
endif;
