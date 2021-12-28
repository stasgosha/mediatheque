<?php
$contact          = get_field( 'contact_box', 'option' );
$service          = get_field( 'service_box', 'option' );
$sales            = get_field( 'sales_box', 'option' );
$contact_title    = get_field( 'footer_contact_title', 'option' );
$contact_text     = get_field( 'footer_contact_text', 'option' );
$contact_subtitle = get_field( 'footer_contact_subtitle', 'option' );
$form_title       = get_field( 'footer_newsletter_title', 'option' );
$form_sub_title   = get_field( 'footer_newsletter_sub_title', 'option' );
$form_title_mobile   = get_field( 'footer_newsletter_title_mobile', 'option' );
?>
<div class="footer-top">
	<div class="d-md-flex footer-cols">
		<?php while ( have_rows( 'footer_widgets', 'option' ) ) :
			the_row();
			$type  = get_sub_field( 'type' );
			$title = get_sub_field( 'title' );
			$link = get_sub_field( 'link' );
			?>

			<div class="footer-col footer-col-<?php echo $type; ?>">
				<?php if ( $title ) : ?>
                    <div class="footer-content">
                        <a href="<?php echo $link; ?>" class="entry-title">
                            <?php echo $title; ?>
                        </a>
                    </div>
				<?php endif; ?>

				<?php if ( 'menu' === $type ) : ?>

					<nav class="footer-nav">
						<?php the_sub_field( 'menu' ); ?>
					</nav>

				<?php else : ?>

					<div class="entry-content">
						<?php the_sub_field( 'content' ); ?>
					</div>

				<?php endif; ?>
			</div>

		<?php endwhile; ?>

        <?php if (have_rows('menus_footer', 'option')): ?>
            <?php
            $i = 0;
            while (have_rows('menus_footer', 'option')): the_row();
                $i++;
                if ($i < 3) { ?>
                    <div class="footer-col footer-col-menu contact-col">
                        <div class="footer-content" >
                            <a href="<?php echo get_sub_field('link'); ?>" class="entry-title">
                                <?php echo get_sub_field('title'); ?>
                            </a>
                        </div>
                        <nav class="footer-nav">
                            <ul class="menu">
                                <?php if (get_sub_field('contacts')): ?>
                                    <?php while (has_sub_field('contacts')): ?>
                                        <li>
                                                    <span class="text">
                                                        <?php echo get_sub_field('text'); ?>
                                                    </span>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>

                        </nav>

                    </div>
                <?php } endwhile; ?>
        <?php endif; ?>



			<div class="footer-col footer-col-menu hide-mobile">
                <?php if( have_rows('menus_footer','option') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('menus_footer','option') ): the_row(); $i++; if($i>2){ ?>
                        <h4 class="entry-title">
                            <?php echo get_sub_field('title');?>
                        </h4>
                        <nav class="footer-nav">
                            <ul class="menu">

                                <?php if( get_sub_field('contacts') ): ?>
                                    <?php while( has_sub_field('contacts') ): ?>
                                        <li>
                                                    <span class="text">
                                                        <?php echo get_sub_field('text');?>
                                                    </span>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </ul>

                        </nav>
                    <?php } endwhile; ?>
                <?php endif; ?>
			</div>





		<div class="footer-col form-col">
			<div class="wrap">
            
                <?php
                    if( wp_is_mobile() ) {
                    
                        if ( $form_title_mobile ) : ?>
                            <h4 class="entry-title mobile">
                                <?php echo $form_title_mobile; ?>
                            </h4>
                        <?php endif; 
                        
                        if ( $form_sub_title ) : ?>
                            <p class="entry-sub-title">
                                <?php echo $form_sub_title; ?>
                            </p>
                        <?php endif; 
                        
                    } else { ?>

                        <?php if ( $form_title ) : ?>
                            <h4 class="entry-title">
                                <?php echo $form_title; ?>
                            </h4>
                        <?php endif; ?>

                <?php } ?>

				<?php echo H::render_cf7( 'footer_cf' ); ?>
			</div>
			<div class="wrap social-wrap">
				<?php get_template_part( 'partials/global/socials' ); ?>
			</div>
		</div>
	</div>

</div>