<?php
/**
 * Template Name: Exhibition
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<section class="exhibition-page-section">
		<div class="container container-l">
			<?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>

			<div class="section-inner">
				<div class="section-sidebar">
					<div class="exhibition-card">
						<div class="card-image">
							<svg viewBox="0 0 520 475" preserveAspectRatio="xMidYMid slice">
								<defs>
									<mask id="exhibition-card-image-mask" width="520" height="475">
										<path fill="#fff" d="M492.93 0H27.37A27.05 27.05 0 00.3 27v420.5a27.07 27.07 0 0027.07 27.04l465.56-59.02A27.04 27.04 0 00520 388.48V27.01C520 12.09 507.89 0 492.93 0z"></path>
									</mask>
								</defs>
								<image width="520" xlink:href="//placeimg.com/520/475/any" mask="url(#exhibition-card-image-mask)"></image>
							</svg>
						</div>
						<div class="card-content">
							<div class="card-content-inner">
								<p class="card-category">הכורעת</p>
								<h3 class="card-caption">וקל רבעמ</h3>
								<div class="card-text">
									<p>בצמה לע ןימימ טיבמ הקר'צ יש</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section-content">
					<!-- Вывод через условие -->
					<div class="section-info">
						<ul class="info-list">
							<!-- Выводится когда событие уже прошло -->
							<li class="red">
								<svg class="item-icon">
									<use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#calendar"></use>
								</svg>
								<div class="item-text">
									<strong>הפעילות הסתיימה</strong>
								</div>
							</li>

							<li>
								<svg class="item-icon">
									<use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#tick"></use>
								</svg>
								<div class="item-text">
									<strong>פעילות מאושרת סל תרבות</strong>
								</div>
							</li>
						</ul>

						<hr>

						<ul class="info-list">
							<li>
								<svg class="item-icon">
									<use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#calendar"></use>
								</svg>
								<div class="item-text">
									<strong>תאריך:</strong> יום ש׳ - 5/6/2021, 10:30
								</div>
							</li>
							<li>
								<svg class="item-icon">
									<use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#clock"></use>
								</svg>
								<div class="item-text">
									<strong>משך זמן פעילות:</strong> שעתיים
								</div>
							</li>
							<li>
								<svg class="item-icon">
									<use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#age"></use>
								</svg>
								<div class="item-text">
									<strong>גילים:</strong> +8
								</div>
							</li>
							<li>
								<svg class="item-icon">
									<use xlink:href="<?= get_template_directory_uri() ?>/images/icons-sprite.svg#price"></use>
								</svg>
								<div class="item-text">
									<strong>מחיר כרטיס:</strong> 25 ₪
								</div>
							</li>
						</ul>

						<div class="info-footer">
							<a href="#" class="btn yellow">רכישת כרטיסים</a>
						</div>
					</div>

					<div class="content-wrap">
						<p>.הקר'צ יש ,רייאמה לש םינשה תברו תנווגמה ותריציב ינמי - יטילופה ןפה תא ןוחבל תשקבמ "וקל רבעמ" הכורעתה</p>
						<p> הקר'צ ןתוכזבש תינכטהו תינויערה תולוכיה לשב ,לארשיב סקימוקהו הרוטקירקה ףונב תידוחיי טבמ תדוקנב רבודמ .טרפב תילארשיה הרוטקירקהו ,ללכב ילארשיה הריטאסה םלוע תנבהב חתפמ תומדל ךפוה</p>
						<p>תונש תליחתמ םייטילופ םיעוריאל הבוגתכ ,הקר'צ רציש סקימוק תודובעו תורוטקירק תורשע תוגצומ הכורעתב הרבחה לש םמדמה ימינפה ןוידה בלב םיאצמנ ןיידע םקלחו ויה ,ורחבנש םיעוריאה .הלא ונימיל דעו םייפלאה תוכישממ ,ץראה לע תירוטסיהה תולעבה תשוחתל דעו חוכה תולבגמו רסומ תויגוס ןיב תוענה תולאש .תילארשיה םג ומכ ,רייאמה לש וטבמ תדוקנ תא ריאהל תשקבמ הרוטקירקהו ,םינפבמ תילארשיה הרבחה תא ןיידע עורקל .ותובכרומב ןייפואמה םלוע תפישח ךות עוריאל הבוגתכ ותדמע תא</p>

						<!-- Вывод через условие -->
						<div class="links-list">
							<a href="#" class="entry-link icon-link">
								<span class="icon meditech-chevron-left"></span>
								<span class="text">
									הכורעתב הייפצו ןואיזומב רוקיבל םיסיטרכ תשיכרל
								</span>
							</a>
						</div>
					</div>

					<div class="section-slider">
						<div class="swiper-container images-slider">
							<div class="button-next">
								<span class="meditech-chevron-left-alt"></span>
							</div>
							<div class="button-prev">
								<span class="meditech-chevron-right-alt"></span>
							</div>
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<img width="792" height="455" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3885.jpeg" class="attachment-full size-full" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="516" height="273" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3879.jpeg" class="attachment-full size-full" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="516" height="273" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3898.jpeg" class="attachment-full size-full" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="568" height="301" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/05/Mask-Group2.jpeg" class="attachment-full size-full" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="568" height="301" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/05/image-3885.jpeg" class="attachment-full size-full" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="516" height="273" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3882.jpeg" class="attachment-full size-full" alt="" />
								</div>
							</div>
						</div>
						<div class="swiper-container thumbs-slider">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<img width="300" height="172" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3885-300x172.jpeg" class="attachment-medium size-medium" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="300" height="159" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3879-300x159.jpeg" class="attachment-medium size-medium" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="300" height="159" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3898-300x159.jpeg" class="attachment-medium size-medium" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="300" height="159" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/05/Mask-Group2-300x159.jpeg" class="attachment-medium size-medium" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="300" height="159" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/05/image-3885-300x159.jpeg" class="attachment-medium size-medium" alt="" />
								</div>
								<div class="swiper-slide">
									<img width="300" height="159" src="https://dev.lm-studio.co.il/childmuseum/wp-content/uploads/2021/06/image-3882-300x159.jpeg" class="attachment-medium size-medium" alt="" />
								</div>
							</div>
						</div>
					</div>

					<!-- Вывод через условие -->
					<div class="section-footer content-wrap">
						<h3 class="section-footer-caption">יטרפ רויס תנמזה</h3>
						<div class="section-footer-text">
							<p>םוקנמלא תס תילא גניסיפידא ררוטקסנוק ,טמא טיס רולוד םוספיא םרול ,טמא טיס רולוד םוספיא םרול <br>.קילעב םודיט יסילוס םולוביטסו וגואא לאוו סוטקל תגא סארק רולוד טא </p>
						</div>
						<a href="#" class="btn yellow">הזמנת סיור</a>
					</div>
				</div>
			</div>

		</div>
	</section>

	<?php
		get_template_part( 'partials/related', 'exhibitions' );
	?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>