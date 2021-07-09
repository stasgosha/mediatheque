<?php

$term  = get_queried_object();
$text  = get_field( 'text', $term );
$phone = get_field( 'phone', 'option' );
$email = get_field( 'email', 'option' );
get_header();
?>

<div class="container tax-wrap">
	<?php if ( $text ) : ?>
		<div class="top-row">
			<h2 class="text-right-border">
				<?php echo $text; ?>
			</h2>
		</div>
	<?php endif; ?>

    <div class="info-row">
        <div class="info-wrap">
            <span class="highlight">
                <?php _e( 'מחיר מיוחד לרוכשים ישירות מהמוזיאון', 'ystheme' ); ?>
            </span>

            <?php if ( $phone ) : ?>
                <span>
                    <span class="meditech-phone icon"></span>
                    <a href="tel:<?php echo $phone; ?>">
                        <?php echo __( 'בטלפון:', 'ystheme' ) . ' ' . $phone; ?>
                    </a>
                </span>
            <?php endif; ?>


            <?php if ( $email ) : ?>
                <span>
                    <span class="meditech-mail icon"></span>
                    <a href="mailto:<?php echo $email; ?>">
                        <?php echo __( 'בכתובת מייל:', 'ystheme' ) . ' ' . $email; ?>
                    </a>
                </span>
            <?php endif; ?>

        </div>
    </div>


	<div class="custom-row row-posts">

		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'partials/loop-product', 'wide' );
			}
		} else {
			esc_html_e( 'Sorry, no posts found.', 'ystheme' );
		}
		?>
	</div>
</div>

<?php
get_footer();
