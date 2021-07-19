<?php
$title    = get_field( 'featured_title' );
$text     = get_field( 'featured_text' );
$featured = get_field( 'featured_posts' );

if ( $featured ) :
?>

<section class="hp-featured-section">
	<div class="container">
		<div class="section-caption">
			<h2 class="sc-title"><?php echo get_field('events_title');?></h2>
		</div>

		<div class="section-grid">
            <?php if( have_rows('events') ): ?>
                <?php
                $i=0;
                while( have_rows('events') ): the_row(); $i++; ?>
                    <div class="hp-featured-card">
                        <div class="card-content" data-theme-color="<?php echo get_sub_field('color');?>">
                            <p class="card-category"><?php echo get_sub_field('small_title');?></p>
                            <h3 class="card-caption"><?php echo get_sub_field('title');?></h3>
                            <div class="card-text">
                                <p><?php echo get_sub_field('text');?></p>
                            </div>

                            <a href="<?php echo get_sub_field('link');?>" class="card-btn">
                                <span class="btn-text"><?php echo get_sub_field('text_button');?></span>
                            </a>
                        </div>
                        <div class="card-image">
                            <svg viewBox="0 0 269 457" preserveAspectRatio="xMidYMid slice">
                                <defs>
                                	<?php if ($i % 2 == 1): ?>
                                		<!-- Для нечетных -->
	                                    <mask id="hp-featured-card-image-mask" width="269" height="457">
	                                        <path fill="#fff" d="M0 433.2V23.78C0 10.65 9.86 0 22.02 0h226.43c12.16 0 20.4 10.65 20.4 23.78L217.54 433.2c0 13.15-9.86 23.8-22.02 23.8H22.02C9.86 457 0 446.35 0 433.2z"></path>
	                                    </mask>
	                                <?php else: ?>
	                                	<!-- Для четных -->
	                                    <mask id="hp-featured-card-image-mask-reverse" width="269" height="457">
	                                        <path fill="#fff" d="M269 433.2V23.78C269 10.65 259.14 0 246.98 0H20.55C8.4 0 .15 10.65.15 23.78L51.46 433.2c0 13.15 9.86 23.8 22.02 23.8h173.49c12.16 0 22.02-10.65 22.02-23.8z"></path>
	                                    </mask>
                                	<?php endif ?>
                                </defs>
                                <image width="269" xlink:href="<?php echo get_sub_field('image')['url'];?>" mask="url(#hp-featured-card-image-mask<?= $i % 2 == 1 ? '' : '-reverse'; ?>)"></image>
                            </svg>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
		</div>

		<div class="section-footer">
			<a href="<?php echo get_field('events_button_link');?>" class="btn"><?php echo get_field('events_button');?></a>
		</div>
	</div>
</section>
<?php
endif;
