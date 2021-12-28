<?php
if ( ! class_exists( 'H' ) ) {
	return;
}

$mobile_banner_title = get_field( 'mobile_banner_title' );
$banner_title        = get_the_title();
if ( wp_is_mobile() && $mobile_banner_title ) {
    $banner_title = $mobile_banner_title;
}


if ( is_tax() ) {
    $banner_title=single_term_title('',0);

	$design = get_field( 'header_design', $term );
	$color  = get_field( 'header_color', $term );
} else {
	$design = get_field( 'header_design' );
	$color  = get_field( 'header_color' );
}


if ( ! is_singular( 'mt_article' ) and ! is_singular( 'post' ) ) :
	?>

<!-- <div class="header-image <?php echo $color; ?>">
	<?php if ( ! is_singular( 'mt_event' ) ) : ?>

		<div class="bg-wrap" data-design="<?php echo esc_html( $design ); ?>">
			<?php if ( 'lights' === $design ) : ?>
				<span class="hide-mobile">
					<?php echo print_svg( THEME_URI . '/images/lights2.svg' ); ?>
				</span>
				<span class="hide-desktop">
					<?php echo print_svg( THEME_URI . '/images/mobile-lights.svg' ); ?>
				</span>


			<?php else : ?>
				<span class="hide-mobile">
					<?php if ( is_page_template( 'views/tpl-contact.php' ) ) : ?>
						<img src="<?php echo esc_url( THEME_URI . '/images/contact-page-banner.png' ); ?>" alt="">
					<?php else : ?>
						<?php echo print_svg( THEME_URI . '/images/egg.svg' ); ?>
					<?php endif; ?>
				</span>
				<span class="hide-desktop">
					<?php echo print_svg( THEME_URI . '/images/mobile-egg.svg' ); ?>
				</span>

			<?php endif; ?>
		</div>

		<div class="header-image-content">
			<h1 class="entry-title">
				<?php echo $banner_title; ?>
			</h1>

		</div>
		<?php
	else :
		$ages                    = get_field( 'ages', get_the_ID() );
		$type                    = get_field( 'type', get_the_ID() );
		$mobile_video_youtube_id = get_field( 'mobile_video_youtube_id', get_the_ID() );
		?>

	<?php if ( wp_is_mobile() && isset( $mobile_video_youtube_id ) && $mobile_video_youtube_id ) : ?>
		<div class="mobile-video-play-button">
			<a href="http://www.youtube.com/watch?v=<?php echo esc_html( $mobile_video_youtube_id ); ?>" class="popup-youtube">
				<img src="<?php echo esc_url( THEME_URI . '/images/mobile-movie-play-btn.png' ); ?>" alt="">
			</a>
		</div>
	<?php endif; ?>

	<div class="event-entry-details">

		<?php if ( $type ) : ?>

			<?php if ( 'movie' === $type ) : ?>
				<span class="icon movie">
					<span class="meditech-film"></span>
					<span class="text">
						<?php esc_html_e( 'סרט', 'ystheme' ); ?>
					</span>
				</span>
			<?php else : ?>
				<span class="icon meditech-lady"></span>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $ages ) : ?>
			<span class="icon">
				<span class="text">
					<?php echo $ages; ?>
				</span>
				<span class="meditech-plus small"></span>

			</span>
		<?php endif; ?>
	</div>

	<div class="bg-bottom-img">
		<?php echo print_svg( THEME_URI . '/images/banner-mask.svg' ); ?>
	</div>

	<?php endif; ?>

</div> -->

<?php
if(is_tax()){
    $queried_object = get_queried_object();
    $active = get_queried_object()->term_id;
    $parrent = get_queried_object()->parent;
    $taxonomy=$queried_object->taxonomy;
    $option=$taxonomy.'_'.$active;
}else{
    $option=get_the_ID();
}
if(get_field('image_header',$option)){
    $image=get_field('image_header',$option)['url'];

}else{
    $image =get_template_directory_uri().'/images/about-page-header-bg.svg';
}
if(wp_is_mobile() and get_field('image_header_mobile',$option)){
    $image=get_field('image_header_mobile',$option)['url'];
}
$color=get_field('color',$option);
if(!$color){
    $color='#00B0CD';
}

?>
<div class="page-header-section" style="--corner-color: <?php echo $color;?>; background-image: url(<?= $image; ?>);">
	<div class="container container-l">
		<div class="section-inner">
			<?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>

			<h1 class="page-caption"><?= $banner_title ?></h1>
		</div>
	</div>
</div>

<?php if (is_category() or is_tax()) { ?>
    <div class="cat-description">
        <?php echo term_description(); ?>
    </div>
<?php } ?>

<?php endif; ?>

<!-- <div class="container container-l breadcrumbs-wrap">
	<div class="custom-row">
		<?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>
	</div>
</div>
 -->