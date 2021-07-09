<?php

$show   = get_field( 'show_banner', $post->ID );
$active = false;
if ( 'page' == $show ) {

  $active = true;
  $images = H::get_attachment_image_responsive( 'page_banner_bg', 'page_banner_mobile' );
  $link   = get_field( 'page_banner_link', $post->ID );
  $target = get_field( 'page_banner_target', $post->ID );

}else if ( 'site' === $show ) {
  $active = true;
  $images = H::get_attachment_image_responsive( 'site_banner_bg', 'site_banner_mobile' );
  $link   = get_field( 'site_banner_link', 'option' );
  $target = get_field( 'site_banner_target', 'option' );
}

if ( $active ) :
  ?>
<section class="section marketing-banner fp-auto-height">
  <a href="<?php echo $link; ?>" <?php echo $target ? 'target="_blank"' : ''; ?>>
    <?php echo $images; ?>
  </a>
</section>
<?php
  endif;
