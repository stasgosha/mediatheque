<?php
$contact          = get_field( 'contact_box', 'option' );
$service          = get_field( 'service_box', 'option' );
$sales            = get_field( 'sales_box', 'option' );
$contact_title    = get_field( 'footer_contact_title', 'option' );
$contact_text     = get_field( 'footer_contact_text', 'option' );
$contact_subtitle = get_field( 'footer_contact_subtitle', 'option' );
$form_title       = get_field( 'footer_newsletter_title', 'option' );
?>
<div class="footer-top">
	<div class="d-md-flex footer-cols">
		<?php while ( have_rows( 'footer_widgets', 'option' ) ) :
			the_row();
			$type  = get_sub_field( 'type' );
			$title = get_sub_field( 'title' );
			?>

			<div class="footer-col footer-col-<?php echo $type; ?>">
				<?php if ( $title ) : ?>
					<h4 class="entry-title">
						<?php echo $title; ?>
					</h4>
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

		<?php if ( $contact ) : ?>
			<div class="footer-col footer-col-menu contact-col">
				<?php if ( $contact['title'] ) : ?>
					<h4 class="entry-title">
						<?php echo $contact['title']; ?>
					</h4>
				<?php endif; ?>

				<nav class="footer-nav">
					<ul class="menu">
						<li>
							<span class="text">
								<?php echo $contact['address']; ?>
							</span>
						</li>
						<li>
							<span class="text">
								<?php _e( 'טלפון: ', 'ystheme' ); ?>
							</span>
							<a href="tel:<?php echo $contact['phone']; ?>">
								<?php echo $contact['phone']; ?>
							</a>
						</li>

						<?php if ( $contact['fax'] ) : ?>

							<li>
								<span class="text">
									<?php _e( 'פקס: ', 'ystheme' ); ?>
								</span>
								<a href="#">
									<?php echo $contact['fax']; ?>
								</a>
							</li>

						<?php endif; ?>
					</ul>

				</nav>

				<?php if ( $sales ) : ?>
					<?php if ( $sales['title'] ) : ?>
						<h4 class="entry-title m-top">
							<?php echo $sales['title']; ?>
						</h4>
					<?php endif; ?>

					<nav class="footer-nav">
						<ul class="menu">

							<li>
								<span class="text">
									<?php _e( 'טלפון: ', 'ystheme' ); ?>
								</span>
								<a href="tel:<?php echo $sales['phone']; ?>">
									<?php echo $sales['phone']; ?>
								</a>
							</li>

							<?php if ( $sales['fax'] ) : ?>

								<li>
									<span class="text">
										<?php _e( 'פקס: ', 'ystheme' ); ?>
									</span>
									<a href="#">
										<?php echo $sales['fax']; ?>
									</a>
								</li>

							<?php endif; ?>
						</ul>

					</nav>

				<?php endif; ?>

			</div>
		<?php endif; ?>

		<?php if ( $service ) : ?>
			<div class="footer-col footer-col-menu hide-mobile">
				<?php if ( $service['title'] ) : ?>
					<h4 class="entry-title">
						<?php echo $service['title']; ?>
					</h4>
				<?php endif; ?>

				<nav class="footer-nav">
					<ul class="menu">

						<li>
							<span class="text">
								<?php _e( 'טלפון: ', 'ystheme' ); ?>
							</span>
							<a href="tel:<?php echo $service['phone']; ?>">
								<?php echo $service['phone']; ?>
							</a>
						</li>

						<?php if ( $service['fax'] ) : ?>

							<li>
								<span class="text">
									<?php _e( 'פקס: ', 'ystheme' ); ?>
								</span>
								<a href="#">
									<?php echo $service['fax']; ?>
								</a>
							</li>

						<?php endif; ?>
					</ul>

				</nav>
			</div>
		<?php endif; ?>




		<div class="footer-col form-col">
			<div class="wrap">
				<?php if ( $form_title ) : ?>
					<h4 class="entry-title">
						<?php echo $form_title; ?>
					</h4>
				<?php endif; ?>

				<?php echo H::render_cf7( 'footer_cf' ); ?>
			</div>
			<div class="wrap social-wrap">
				<?php get_template_part( 'partials/global/socials' ); ?>
			</div>
		</div>
	</div>

</div>
