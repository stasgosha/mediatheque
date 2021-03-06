<?php
/**
 * Template Name: About
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="about-text-and-slider-section">
		<div class="container container-l">
			<div class="section-inner">
				<div class="section-content content-wrap">
                    <?php the_content(); ?>

					<div class="mobile-visible">
						<div class="section-slider">
							<div class="swiper-container images-slider">
								<div class="button-next">
									<span class="meditech-chevron-left-alt"></span>
								</div>
								<div class="button-prev">
									<span class="meditech-chevron-right-alt"></span>
								</div>
								<div class="swiper-wrapper">
							                            <?php $slider=get_field('gallery');
							                            if($slider){
							                                foreach ($slider as  $value){?>
							                                    <div class="swiper-slide">
							                                        <img width="792" height="455" src="<?php print_R($value['url']);?>" class="attachment-full size-full" alt="" />
							                                    </div>
							                                <?php } } ?>
								</div>
							</div>
							<div class="swiper-container thumbs-slider">
								<div class="swiper-wrapper">
							                            <?php $slider=get_field('gallery');
							                            if($slider){
							                                foreach ($slider as  $value){?>
							                                    <div class="swiper-slide">
							                                        <img  width="300" height="172"  src="<?php print_R($value['sizes']['search-result-item']);?>" class="attachment-full size-medium" alt="" />
							                                    </div>
							                                <?php } } ?>
								</div>
							</div>
						</div>
					</div>

					<hr>
					
					<?php echo get_field('contact_text');?>
					
					<h2><?php echo get_field('links_title');?></h2>

					<div class="links-list">
                        <?php if( have_rows('links') ): ?>
                            <?php
                            $i=0;
                            while( have_rows('links') ): the_row(); ?>
                                <a href="<?php echo get_sub_field('link');?>" class="entry-link icon-link">
                                    <span class="icon meditech-chevron-left"></span>
                                    <span class="text">
								<?php echo get_sub_field('text');?>
							</span>
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
					</div>
				</div>
				<div class="section-slider mobile-hidden">
					<div class="swiper-container images-slider">
						<div class="button-next">
							<span class="meditech-chevron-left-alt"></span>
						</div>
						<div class="button-prev">
							<span class="meditech-chevron-right-alt"></span>
						</div>
						<div class="swiper-wrapper">
                            <?php $slider=get_field('gallery');
                            if($slider){
                                foreach ($slider as  $value){?>
                                    <div class="swiper-slide">
                                        <img width="792" height="455" src="<?php print_R($value['url']);?>" class="attachment-full size-full" alt="" />
                                    </div>
                                <?php } } ?>
						</div>
					</div>
					<div class="swiper-container thumbs-slider">
						<div class="swiper-wrapper">
                            <?php $slider=get_field('gallery');
                            if($slider){
                                foreach ($slider as  $value){?>
                                    <div class="swiper-slide">
                                        <img  width="300" height="172"  src="<?php print_R($value['sizes']['search-result-item']);?>" class="attachment-full size-medium" alt="" />
                                    </div>
                                <?php } } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php get_template_part( 'partials/event/related' ); ?>

	<div class="block block-q-and-a">
		<div class="container container-sm">
			<div class="title-wrap">
				<h2 class="entry-title text-center">
					<?php echo get_field('faq_title');?>
				</h2>
			</div>
			<div class="qa-wrap">
                <?php if( have_rows('faq') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('faq') ): the_row(); ?>
                        <div class="qa-item post-3062 mt_qa type-mt_qa status-publish hentry">
                            <div class="entry-header">
                                <h4 class="entry-title">
                                    <?php echo get_sub_field('title');?>
                                </h4>
                                <span class="meditech-plus icon"></span>
                            </div>
                            <div class="entry-body">
                                <p><?php echo get_sub_field('text');?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
			</div>
		</div>
	</div>

	<div class="block block-instagram">
		<div class="container container-l">
			<div class="title-wrap">
				<h2 class="entry-title text-center">
					<?php echo get_field('instagram_title');?>
				</h2>

				<p class="entry-text eng-text">
					<?php echo get_field('instagram_nicname');?>
				</p>
			</div>

			<div class="ig-wrap">
				<?php echo do_shortcode(get_field('instagram_shortcode'));?>
			</div>
		</div>
	</div>


	<div class="block block-iframe-banner">
		<div class="container container-l">
			<div class="custom-row">
				<div class="col4 col-content">
					<div class="title-wrap">
						<h2 class="entry-title">
							<?php echo get_field('iframe_title');?>
						</h2>

						<div class="entry-text">
							<?php echo get_field('iframe_texz');?>
						</div>
					</div>
				</div>
				<div class="col8">
					<?php echo get_field('iframe');?>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>