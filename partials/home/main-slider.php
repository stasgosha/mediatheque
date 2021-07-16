<?php
$slides = get_field( 'slider' );

if ( have_rows( 'slider' ) ) : ?>
<!-- <section class="section slider-section">
		<div class="swiper-container main-slider">
				<div class="swiper-wrapper">
						<?php
						while ( have_rows( 'slider' ) ) :
							the_row();
							$title             = get_sub_field( 'title' );
							$subtitle          = get_sub_field( 'subtitle' );
							$text              = get_sub_field( 'text' );
							?>
							<div class="swiper-slide">
									<div class="bg-img-wrap">
										<?php echo H::get_attachment_image_responsive( 'desktop_image', 'mobile_image' ); ?>
									</div>
									<div class="container container-md">
										<div class="custom-row">
											<div class="col6 col-content">

												<?php if ( $title ) : ?>
													<h2 class="entry-title">
														<?php echo $title; ?>
													</h2>
												<?php endif; ?>


												<?php if ( $subtitle ) : ?>
													<h4 class="entry-subtitle">
														<?php echo $subtitle; ?>
													</h4>
												<?php endif; ?>

												<?php if ( $text ) : ?>
													<p class="entry-text">
														<?php echo $text; ?>
													</p>
												<?php endif; ?>

											</div>
										</div>
									</div>
							</div>



						<?php endwhile; ?>
				</div>
				<div class="button-next">
						<span class="meditech-chevron-left-alt"></span>
				</div>
				<div class="button-prev">
						<span class="meditech-chevron-right-alt"></span>
				</div>
		</div>
		<a href="#featured" class="anchor">
				<?php echo print_svg( THEME_URI .'/images/double-arrow.svg' ); ?>
		</a>

		<div class="bg-img">
				<?php echo print_svg( THEME_URI . '/images/banner-mask.svg'); ?>
		</div>
</section> -->

	<section class="hp-banner-section">
		<div class="hp-banner-slider">
            <?php if( have_rows('slider') ): ?>
                <?php
                $i=0;
                while( have_rows('slider') ): the_row(); ?>
                    <div class="slide">
                        <div class="hp-banner-card">
                            <div class="card-content">
                                <p class="card-category"><?php echo get_sub_field('small_title');?></p>
                                <h3 class="card-caption"><?php echo get_sub_field('title');?></h3>
                                <div class="card-text">
                                    <p><?php echo get_sub_field('text');?></p>
                                </div>

                                <p class="card-date"><?php echo get_sub_field('date');?></p>
                                <a href="<?php echo get_sub_field('link');?>" class="card-more-link">
                                    <span class="link-text"><?php echo get_sub_field('text_button');?></span>
                                </a>
                            </div>
                            <div class="card-image">
                                <svg viewBox="0 0 1099 594" preserveAspectRatio="xMidYMid slice">
                                    <defs>
                                        <mask id="hp-banner-image-mask" width="1099" height="594">
                                            <path fill="#fff" d="M1098.47 563.06l-65.59-532.12c0-17.07-13.44-30.94-30.01-30.94H-29.99C-46.56 0-60 13.87-60 30.94v532.12c0 17.1 13.44 30.94 30.01 30.94h1098.45c16.57 0 30.01-13.84 30.01-30.94z"></path>
                                        </mask>
                                    </defs>
                                    <image width="1099" xlink:href="<?php echo get_sub_field('image')['url'];?>" mask="url(#hp-banner-image-mask)"></image>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
		</div>
	</section>

<?php
endif;
