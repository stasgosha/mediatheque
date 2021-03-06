<?php
$slides = get_field( 'slider' );

if ( have_rows( 'slider' ) ) : ?>
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

                                <div class="card-footer">
                                    <p class="card-date"><?php echo get_sub_field('date');?></p>
                                    <a href="<?php echo get_sub_field('links');?>" class="card-more-link">
                                        <span class="link-text"><?php echo get_sub_field('text_button');?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-image">
                                <svg viewBox="0 0 1134 594" preserveAspectRatio="xMidYMid slice" class="desktop-image">
                                    <defs>
                                        <mask id="hp-banner-image-mask" width="1134" height="594">
                                            <path fill="#fff" d="M1133.6 563L1066 31a31 31 0 00-31-31H-29a31 31 0 00-31 31v532a31 31 0 0031 31h1131.7a31 31 0 0030.9-31z"></path>
                                        </mask>
                                    </defs>
                                    <image width="100%" height="100%" x='0' y='0' xlink:href="<?php echo get_sub_field('image')['url'];?>" mask="url(#hp-banner-image-mask)" preserveAspectRatio="xMinYMin slice"></image>
                                </svg>

                                <svg viewBox="0 0 345 280" preserveAspectRatio="xMidYMid slice" class="mobile-image">
                                    <defs>
                                        <mask id="hp-banner-image-mask-mobile" width="345" height="280">
                                            <path fill="#fff" d="M327.03 0H17.97A17.96 17.96 0 000 17.93v243.96c0 9.9 8.06 17.95 17.97 17.95l309.06-39.18c9.93 0 17.97-8.03 17.97-17.95V17.93C345 8.03 336.96 0 327.03 0z"></path>
                                        </mask>
                                    </defs>
                                    <image width="100%" height="100%" x='0' y='0' xlink:href="<?php echo get_sub_field('image')['url'];?>" mask="url(#hp-banner-image-mask-mobile)" preserveAspectRatio="xMidYMid slice"></image>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
		</div>
	</section>
<?php endif ?>