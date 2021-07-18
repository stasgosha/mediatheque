var $ = jQuery.noConflict();
var docHeight = $(document).height();
var position  = $(window).scrollTop();
var months    = ['ינואר', 'פבואר', 'צרץ', 'אפריל', 'מאי', 'יוני', 'יולי', 'אוגוסט', 'ספטמבר', 'אוקטובר', 'נובמבר', 'דצמבר'];
var days      = ['א', 'ב', 'ג', 'ד', 'ה', 'ו', 'ש'];
// $('body').addClass( 'video-playing' );
// $('.video-overlay').fadeIn();

// $(window).on("load",function(e){
// 	$("#load-video source").each(function() {
//
// 		var video_s = $(this).parent().attr('data-video-s');
// 		var video_l = $(this).parent().attr('data-video-l');
// 		if ( is_mobile() ) {
// 			$(this).attr('src', video_s);
//
// 		}else{
// 			$(this).attr('src', video_l);
//
// 		}
//
// 		$("#load-video")[0].load();
//
// 	});
// });
$(document).ready(function () {
	moment.locale('he');

	$('.popup-youtube').magnificPopup({
        disableOn: 320,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

	$("#load-video").on("ended", function() {
	  $('body').removeClass( 'video-playing' );
	  $(this).fadeOut(300);
	  $('.video-overlay').fadeOut(300);

	});

	$('.cart-menu-btn').on('click', function(e){
		e.preventDefault();
		var source = $(this).attr('href');

		if ( source && source != '#' ) {

			$.magnificPopup.open({
			  items: {
				src: source,
			  },
			  type: 'iframe',
			  iframe: {
					patterns: {
						yourcustomsource: {
							index: '',
							src: '%id%'
						}
					}
				}
			  // other options
			});
		}

	});




	toggle_dark_mode();
	ank_toggle();
	init_select();
	init_footer_logos_slider();
	init_homepage_functions();
	mobile_nav();
	mobile_footer_nav_init();				// Turn mobile footer navigation into accordion
	a11y_menu();                            // Accessibility for main menu
	fancybox_init();                        // fancyBox init
	fast_contact_form();                    // Fast contact form init
	search_box_init();                      // Toggle search box
	btn_scroll_to();                        // Scroll-to button
	ajax_load_more();                       // Ajax load more
	side_menu();
	buy_now_form();
	// ajax_form();
	sticky_header_init();
	/* Blocks */
	init_activities_slider();
	init_block_hero_slider();               // Block hero slider
	init_block_slider_with_thumbnails();    // Block slider with thumbnails
	init_block_slider_testimonials();       // Block slider testimonials
	init_block_slider_images();             // Block slider images
	init_block_tabs();                      // Block tabs
	init_block_accordion();                 // Block accordion

	mobile_elements_reposition();
});

$(window).load(function () {
	fade_in_init();							// Fade-in init
});

function mobile_elements_reposition(){
	if( jQuery(window).width() < 577 ){
		console.log('mobile_elements_reposition');
		jQuery('.single-mt_event .event-details .entry-details').insertAfter( jQuery('.single-mt_event .event-details .entry-content') );
	}
}

function ank_toggle(){
	$('.ank-wrap .entry-link').on('click', function(e){
		e.preventDefault();
		$(this).parent().toggleClass('active');
	});
}

function init_select(){
	$('select').not('.month-select, .year-select').selectize({
		create: false,
		showEmptyOptionInDropdown: true,
		closeAfterSelect: true,
		onChange: function( data ){
			hide_mobile_keyboard();
		}
	});
}
function hide_mobile_keyboard(){
	document.activeElement.blur();

}
function toggle_dark_mode(){

	if ( Cookies.get('darkMode' ) ) {
		$('body').addClass('dark-theme');
	}

	$('.dark-mode-btn').on('click', function(){

		if ( $('body').hasClass('dark-theme') ) {
			$('body').removeClass('dark-theme');
			Cookies.remove('darkMode');
		}else{
			$('body').addClass('dark-theme');
			Cookies.set('darkMode', true );
		}


	});
}

function is_home() {
	if ($('body').hasClass('home')) {
		return true;
	} else {
		return false;
	}
}

function is_rtl() {
	if ($('body').hasClass('rtl')) {
		return true;
	} else {
		return false;
	}
}

function is_mobile(width) {
	if (!width) {
		width = 992;
	}

	if ($(window).width() < width) {
		return true;
	} else {
		return false;
	}
}

function buy_now_form(){
	var buy_now_form = {

		date_picker: $('.buy-now-date-picker'),
		hours_select: $('select.hour-select'),
		current_date: '',
		selected_post_id: '',
		current_form: '',

		get_post_ajax: function ( post_id ) {
			var form  = buy_now_form.current_form;
			form.parent().find('.buy-now-results').empty();
			form.find('.hour-select').remove();
			form.find('.hidden-fields').slideUp();

			form.append('<span class="ajax-loader black"></span>');

			if (typeof buy_now_form.date_picker_obj != 'undefined' ) {
				form.find('.buy-now-date-picker').val('');
				buy_now_form.date_picker_obj.remove();
			}

			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: siteObject.ajaxurl,
				data: {
					'action': 'ajax_get_post',
					'post_id': post_id,

				},

				success: function (results) {
					form.find('.ajax-loader').remove();

					if ( results.ok && results.dates && results.html ) {

						buy_now_form.html_append = results.html;
						buy_now_form.show_date_picker( results.dates, form );

					}
				}
			});

		},

		show_date_picker: function( dates, form, append ){

			var formatted_dates = [];
			var parent_class    = form.attr('class').replace(' ', '.');
			if ( Array.isArray( dates ) ) {
				dates.forEach(
					element => formatted_dates.push( new Date( element ) )
				);

			}else{
				formatted_dates = [ new Date( dates ) ];
			}



			buy_now_form.date_picker_obj = datepicker('.' + parent_class + ' .buy-now-date-picker', {
				showAllDates: true,
				customDays: days,
				customMonths: months,
				customOverlayMonths: months,
				startDate: formatted_dates[0],
				minDate: formatted_dates[0],
				maxDate: formatted_dates[ formatted_dates.length - 1 ],
				events: formatted_dates,
				onShow: instance => {
				   hide_mobile_keyboard();
			   	},
				onSelect: (instance) => {
				  // This will display the date as `1/1/2019`.
				  if ( instance.dateSelected ) {
					var i           = new Date( instance.dateSelected );
					var date        = moment(i);
					var new_val     = date.format('ddd - D.M.YYYY');
					form.find('.buy-now-date-picker').val( 'יום ' + new_val );
					buy_now_form.ajax_get_date_hours( date.format('DD.MM.YYYY'), buy_now_form.selected_post_id );

				  }

				},

			});
			$('.buy-now-date-picker').prop('disabled', false );


		},

		ajax_get_date_hours: function( date, post_id ){

			var form = buy_now_form.current_form;

			form.find('.hour-select').remove();
			form.find('.btn').attr('href', '' );

			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: siteObject.ajaxurl,
				data: {
					'action': 'ajax_get_post_date_hours',
					'post_id': post_id,
					'date': date,

				},

				success: function (results) {
					$('.side-menu-wrap .ajax-loader').remove();

					if ( results.ok && results.hours ) {

						var html = '<select class="hour-select" style="display="none">';
						html += '<option value="">בחרו שעה</option>';
						$.each( results.hours, function( key, val ){
							html += '<option value="' + val.url + '">' + val.date + '</option>';
						});

						html += '</select>';

						if ( results.main_link ) {
							form.find('a').attr('href', results.main_link );
						}

						form.find('.date-picker-wrap').after( html );
						init_select();
						form.find('.hidden-fields').slideDown();
						form.parent().find('.buy-now-results').html( buy_now_form.html_append );

					}

				}
			});

		},

		init: (function () {


			$('.buy-form .btn, .buy-btn').on('click', function(e){
				e.preventDefault();
				var source = $(this).attr('href');

				if ( source && source != '#' ) {

					close_side_menu();
					$.magnificPopup.open({
					  items: {
						src: source,
					  },
					  type: 'iframe',
					  iframe: {
							patterns: {
								yourcustomsource: {
									index: '',
									src: '%id%'
								}
							}
						}
					});
				}

			});

			$('form.buy-now-form select.event-select').on('change', function() {
				buy_now_form.current_form     = $(this).parents('form');
				buy_now_form.selected_post_id = $(this).val();

				if ( buy_now_form.selected_post_id ) {
					buy_now_form.get_post_ajax( buy_now_form.selected_post_id );
				}

			});

			$('body').on('change', 'select.hour-select', function() {
				var val = $(this).val();
				var parent = $(this).parents('form');
				if ( val ) {
					 parent.find('.btn').attr( 'href', val );
				}

			});

			if ( $('.single-buy-now-form').length ) {
				$('.single-buy-now-form').each( function(index, value ){
					var post_id = $(this).attr('data-post-id');
					var dates = $.parseJSON( $(this).attr('data-dates') );


					var formatted_dates = [];
					var parent_class = $(this).parent().attr('class');

					if ( Array.isArray( dates ) ) {
						dates.forEach(
							element => formatted_dates.push( new Date( element ) )
						);
					}

					datepicker( $(this).find('.buy-now-date-picker')[0] , {
						showAllDates: true,
						customDays: days,
						customMonths: months,
						customOverlayMonths: months,
						minDate: formatted_dates[0],
						startDate:  formatted_dates[0],
						maxDate: formatted_dates[ formatted_dates.length - 1 ],
						events: formatted_dates,
						onShow: instance => {
						   hide_mobile_keyboard();
						},
						onSelect: (instance) => {
						  // This will display the date as `1/1/2019`.
						  if ( instance.dateSelected ) {
							var i           = new Date( instance.dateSelected );
							var date        = moment(i);
							var new_val     = date.format('ddd - D.M.YYYY');

							buy_now_form.current_form = $(this);

							$(this).find('.buy-now-date-picker').val( 'יום ' + new_val );

							buy_now_form.ajax_get_date_hours( date.format('DD.MM.YYYY'), post_id );
						  }
						},

					});

				});

			}


		}()),
	}
}

function fade_in_init() {
	$('.fade-in').css('opacity', 1);
}

function mobile_nav() {
	mobileNav = {
		triggerClick: function () {
			$('.mobile-menu-btn').on( 'click' ,function () {
				// $('.mobile-menu-wrap').slideDown( 700 );
				$('.mobile-menu-wrap').addClass( 'opened' );
				$('body').addClass('menu-open');
			});

			$('.mobile-menu-close-btn').on( 'click' ,function () {
				// $('.mobile-menu-wrap').slideUp(700);
				$('.mobile-menu-wrap').removeClass( 'opened' );
				$('body').removeClass('menu-open');

			});

			$('.mobile-menu-wrap .menu-item-has-children > a').on( 'click' ,function (e) {
				e.preventDefault();

				var parent = $(this).parent();
				parent.siblings('.is-active').removeClass('is-active').find('.sub-menu').slideUp(700);
				parent.find('.sub-menu').slideToggle(700);
				parent.toggleClass('is-active');

			});
		},

		menuItemClick: function () {
			$('.mn-menu ul > li.menu-item-has-children > a, .toggle-sub-menu').click(function (e) {
				e.preventDefault();
				$(this).parent().toggleClass('menu-item-open').find('> ul.sub-menu').slideToggle();
			});

			$('.mn-menu li:not(.menu-item-has-children) a').click(function () {
				$('body').removeClass('mn-active');
			});
		},

		swipe: function () {
			$(".mn-menu").on("swiperight", function () {
				$('body').removeClass('mn-active');
			});
		},

		init: function () {
			mobileNav.triggerClick();
			mobileNav.menuItemClick();
			mobileNav.swipe();
		}
	}

	mobileNav.init();
}



function open_side_menu(){
	$('.side-menu-wrap').addClass('active');
	$('body').addClass('menu-open');


	if ( $('.mobile-menu-wrap').length) {
		$('.mobile-menu-wrap').slideUp(700);
		$('body').removeClass('menu-open');
	}
}

function close_side_menu(){
	$('.side-menu-wrap').removeClass('active');
	$('body').removeClass('menu-open');

}


function side_menu(){
	$('.buy-now-btn').on('click' ,function(e){
		e.preventDefault();
		open_side_menu();
	});

	$('.side-menu-close-btn').on('click' ,function(){
		close_side_menu();
	});


	$(document).mouseup(function(e) {
		var container = $(".side-menu-wrap");

		if (!container.is(e.target) && container.has(e.target).length === 0){

			if ( container.hasClass('active') ) {
				container.removeClass('active');
				$('body').removeClass('menu-open');

			}
		}
	});
}

function sticky_header_init(){

	var sticky = $('header.site-header'),
		body   = $('body');

		$(window).on('scroll', function () {
			var scroll = $(window).scrollTop();

			if ( $(window).width() >= 320) {
				// if (scroll < 100) {
				// 	sticky.removeClass('is-sticky');
				// 	body.removeClass('is-sticky');
				//
				// } else {
				// 	sticky.addClass('is-sticky');
				// 	body.addClass('is-sticky');
				// }
			}

			if(scroll > position) {
				if (scroll > 250) {
					// sticky.addClass('is-hide');
				}
			}else{
				if (scroll > 150) {
					// sticky.addClass('is-sticky');
					// body.addClass('is-sticky');
					// sticky.removeClass('is-hide');

				}else{
					// sticky.removeClass('is-hide');
					// sticky.removeClass('is-sticky');
					// body.removeClass('is-sticky');
				}

			}

			position = scroll;

	    });
}

function init_homepage_functions(){

	// var home_banner = new Swiper('.main-slider', {
	// 	navigation: {
	// 	nextEl: ".main-slider .button-next",
	// 	prevEl: ".main-slider .button-prev",
	//   },

	// });

	$('.hp-banner-slider').slick({
		rtl: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		arrows: false,
		dots: true,
		// fade: true
	});

	$('.cartoon-slider').slick({
		rtl: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		arrows: true,
		dots: false,
	});

	$('.hp-featured-card').each(function(i, el){
		const themeColor = $(el).find('.card-content').data('theme-color');
		const svgThemeColor = themeColor.split('#').join('%23');

		$(el).find('.card-content')[0].style.setProperty('--card-theme-color', themeColor);

		if (i % 2 == 0) {
			$(el).find('.card-content')[0].style.setProperty('--card-bg', `url("data:image/svg+xml,%3Csvg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 297 457'%3E%3Cpath d='M297 23.78V433.2c0 13.15-9.86 23.8-22.02 23.8H21.2C9.02 457 .77 446.35.77 433.2L52.1 23.78C52.1 10.65 61.97 0 74.13 0h200.85C287.14 0 297 10.65 297 23.78z' fill='${svgThemeColor}'/%3E%3C/svg%3E")`);
		} else{
			$(el).find('.card-content')[0].style.setProperty('--card-bg', `url("data:image/svg+xml,%3Csvg width='297' height='457' viewBox='0 0 297 457' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 23.78V433.2C0 446.35 9.86 457 22.02 457H275.8c12.19 0 20.44-10.65 20.44-23.8L244.9 23.78C244.9 10.65 235.03 0 222.87 0H22.02C9.86 0 0 10.65 0 23.78z' fill='${svgThemeColor}'/%3E%3C/svg%3E%0A")`);
		}
	});

	if ( $('body').hasClass('home') ) {
		var news_bar = $('.news-bar-ticker');

		if ( ! is_mobile() ) {
			var activities_slider = new Swiper('.activities-slider', {
				slidesPerView: 3,
				spaceBetween: 33,
			});
		}


		var upcoming_slider = new Swiper('.upcoming-slider', {
			slidesPerView: 3,
        	spaceBetween: 36,
			navigation: {
				nextEl: ".upcoming-section .button-next",
				prevEl: ".upcoming-section .button-prev",
		  	},
		  	pagination: {
			 	el: ".upcoming-section .swiper-pagination",
			 	clickable: true,
		   	},
			breakpoints: {
				1440: {
					slidesPerView: 3,
					spaceBetween: 36,
				},
				1024: {
					slidesPerView: 2,
					spaceBetween: 35,
				},
				640: {
					slidesPerView: 1,
					spaceBetween: 20,
				},
			},
		});


		if ( news_bar.length ) {
			$('.news-bar-ticker').AcmeTicker({
				autoplay     : 10,
				type         :'marquee',/*horizontal/horizontal/Marquee/type*/
				direction    : 'right',/*up/down/left/right*/
				pauseOnFocus : false,
				pauseOnHover : true,
				speed        : 0.05,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
				controls : {
					toggle : $('.acme-news-ticker-pause'),/*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
				}
			});

			$('.acme-news-ticker-pause').on('click', function(){
				$(this).toggleClass('play');
			});
		}



	}

}

function mobile_footer_nav_init() {

	if ($(window).width() <= 990) {

		$('.footer-col-menu .entry-title').click(function (e) {
			e.preventDefault();

			if ( !$(this).parent().hasClass( 'active') ) {
				$(this).parent().addClass('active').find('.footer-nav').slideDown(100);
				$(this).parent().siblings().removeClass('active').find('.footer-nav').slideUp(100);
			}
			// $('.footer-col-menu.active').removeClass('active').find('.footer-nav').slideUp(100);
			// $('.footer-col-menu.active').not($(this).closest('.footer-col-menu')).removeClass('active').find('.footer-nav').slideUp(100);
		});

      }

}

function a11y_menu() {
	$('#main-navigation ul li.menu-item-has-children a').on('focusin', function (e) {
		e.preventDefault();
		var this_el = $(this);
		this_el.parent().addClass('hover');
	});

	$('body').on('focusout', '#main-navigation ul li.menu-item-has-children.hover ul li:last-child a', function (e) {
		e.preventDefault();
		var this_el = $(this);
		this_el.parent().parent().parent().removeClass('hover');
	});
}

function fancybox_init() {
	$('[data-fancybox]').fancybox({
		loop: true,
		baseClass: 'fancybox-gallery',
	});
}

function fast_contact_form() {
	$('.btn-hidden-form-toggle, .btn-close-hidden-form').click(function (e) {
		e.preventDefault();
		$(this).toggleClass('active');
		$('.bottom-strip-hidden-form, .header-hidden-form').toggleClass('active');
	});
}

function search_box_init() {
	$('.search-btn').click(function () {
		$('.mobile-menu-wrap').slideUp(700);
		$('body').removeClass('menu-open');
		$('.header-search').toggleClass('open');
		$('.header-search').find('.search-input').focus();

	});

	$('.search-close').click(function () {
		$('.header-search').toggleClass('open');
	});

	$('.search').submit(function (e) {
		if (!$(this).find('.search-input').val()) {
			e.preventDefault();
		}
	});

	$(document).mouseup(function(e) {
	    var container = $(".header-search");

		if (!container.is(e.target) && container.has(e.target).length === 0){

			if ( container.hasClass('open') ) {
				container.removeClass('open');

			}
	    }
	});
}

function btn_scroll_to() {
	$('body').on('click', '.btn-scroll-to', function (e) {
		e.preventDefault();

		target = $($(this).data('scrollto'));
		$('html, body').animate({ scrollTop: target.offset().top }, 700);
		return false;
	});

	$(window).scroll(function () {
		if ($(window).scrollTop() > 0) {
			$('.btn-scroll-to-top').fadeIn(300);
		} else {
			$('.btn-scroll-to-top').fadeOut(300);
		}
	});
}

function ajax_load_more() {
	$('.btn-load-more').click(function (e) {
		btn = $(this);
		append = $(this).data('append');
		query = $(this).data('query');
		load = $(this).data('load');
		offset = $(this).data('offset');
		template = $(this).data('template');

		e.preventDefault();
		if (!$('.loader-wrap .loader').length) {
			$('.loader-wrap').append('<div class="loader"></div>');
		}

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: siteObject.ajaxurl,
			data: {
				'action': 'ajax_load_more',
				'args': query,
				'offset': offset,
				'load': load,
				'template': template
			},

			success: function (results) {
				$(append).append(results.html);
				$('.loader-wrap .loader').remove();
				if (!results.more) {
					$('.btn-load-more').remove();
				}
			}
		});

		offset = $(this).data('offset') + load;
		btn.attr('data-offset', offset).data('offset', offset);
	});
}



function share_buttons() {
	$('a.btn-share').click(function (e) {
		e.preventDefault();
		var popup_window;

		var width = 555;
		var height = 500;
		var center_left = (screen.width / 2) - (width / 2);
		var center_top = (screen.height / 2) - (height / 2);
		var url = $(this).attr("href");

		popup_window = window.open(url, "Title", "scrollbars=1, width=" + width + ", height=" + height + ", left=" + center_left + ", top=" + center_top);
		popup_window.focus();
	});
}

function ajax_form() {
	$('.form-ajax').on('submit', function (e) {
		e.preventDefault();

		var $form = $(this);
		var $status = $form.find('.form-status');
		var action = $form.attr('action');

		$status.html('<div class="loader"></div>');

		$.post({
			dataType: 'json',
			url: siteObject.ajaxurl,
			data: {
				action: action,
				data: $(this).serialize(),
				nonce: siteObject.nonce
			},

			success: function (response) {
				$status.html('<div class="form-message form-message-' + response.status + '">' + response.message + '</div>');

				if ((action == 'ajax_login' || action == 'ajax_register') && response.status === 'success') {
					document.location.href = siteObject.homeurl;
				}
			}
		});
	});
}

function init_block_hero_slider() {
	$('.slider-hero').each(function () {
		var swiper = new Swiper($(this)[0], {
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			loop: true,
			autoplay: {
				delay: 5000,
			},
			keyboard: {
				enabled: true,
				onlyInViewport: true
			},
			a11y: {
				prevSlideMessage: siteObject.strings.prev_slide,
				nextSlideMessage: siteObject.strings.next_slide,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	});
}

function init_footer_logos_slider(){
	var galleryThumbs = new Swiper('.footer-logos', {
		spaceBetween: 20,
		slidesPerView: 4,
		loop: true,
		breakpoints: {
          640: {
            slidesPerView: 4,
          },
          768: {
            slidesPerView: 6,
          },
          1024: {
            slidesPerView: 6,
          },
		  1440: {
			slidesPerView: 9,
		  },
        },

	});
}

function init_block_slider_with_thumbnails() {
	var galleryThumbs = new Swiper('.gallery-thumbs', {
		spaceBetween: 10,
		slidesPerView: 5,
		loop: true,
		centeredSlides: true,
		keyboard: {
			enabled: true,
			onlyInViewport: true
		},
	});

	var galleryTop = new Swiper('.gallery-top', {
		loop: true,
		thumbs: {
			swiper: galleryThumbs,
		},
		keyboard: {
			enabled: true,
			onlyInViewport: true
		},
	});
}

function init_block_slider_testimonials() {
	$('.slider-testimonials').each(function () {
		var swiper = new Swiper($(this)[0], {
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			loop: true,
			autoplay: {
				delay: 5000,
			},
			keyboard: {
				enabled: true,
				onlyInViewport: true
			},
		});
	});
}

function init_block_slider_images() {
	$('.images-slider').each(function () {
		var galleryTop = new Swiper($(this)[0], {
			navigation: {
				nextEl: $(this).find('.button-next')[0],
				prevEl: $(this).find('.button-prev')[0],
			},

			loop: true,
			loopedSlides: 4

		});


		var galleryThumbs = new Swiper($(this).siblings('.thumbs-slider')[0] , {
		  spaceBetween: 25,
		  slidesPerView: 5,
		  slideToClickedSlide: true,
		  centeredSlides: true,
		  loop: true,
		  loopedSlides: 4
			});

		galleryTop.controller.control = galleryThumbs;
		galleryThumbs.controller.control = galleryTop;
	});
}

function init_activities_slider() {
	$('.activities-block-slider, .related-slider').each(function () {
		var swiper = new Swiper($(this)[0], {
			slidesPerView: 4,
			spaceBetween: 50,
			navigation: {
				nextEl: $(this).parent().find('.button-next')[0],
				prevEl: $(this).parent().find('.button-prev')[0],
		  	},
			pagination: {
			 	el: $(this).parent().find('.swiper-pagination')[0],
			 	clickable: true,
			},
			breakpoints: {
			  1600: {
				slidesPerView: 4,
				spaceBetween: 50,

			  },
			  1200: {
				slidesPerView: 3,
				spaceBetween: 36,

			  },
			  768: {
				slidesPerView: 2,
				spaceBetween: 20,
			  },
			  640: {
				slidesPerView: 1,
				spaceBetween: 20,

			  },
			},

		});

	});
}


function init_block_tabs() {
	$('.tabs-nav a').click(function (e) {
		e.preventDefault();
		var tab = $(this).data('tab');

		$('.tabs-nav .tab-item').removeClass('tab-item-active');
		$(this).parent().addClass('tab-item-active');

		$('[data-tabcontent]').removeClass('tab-content-active');
		$('[data-tabcontent="' + tab + '"]').addClass('tab-content-active');
		history.pushState({}, null, '#' + tab);
	});
}

function init_block_accordion() {
	var accordion = {
		closeItems: function ($siblings) {
			$siblings
				.removeClass('active')
				.attr('aria-expanded', false)
				.find('.icon').removeClass('meditech-minus').addClass('meditech-plus')
				.parents('.qa-item').find('.entry-body').slideUp(500);
		},

		openItem: function ($item) {
			$item
				.addClass('active')
				.attr('aria-expanded', true)
				.find('.icon').removeClass('meditech-plus').addClass('meditech-minus')
				.parents('.qa-item').find('.entry-body').slideDown(500)

		},

		init: (function () {
			$('.qa-item .entry-header').click( function () {
				var $this = $(this).parent();
				var $siblings = $this.siblings();

				accordion.closeItems($siblings);

				if (!$this.hasClass('active')) {
					accordion.openItem($this);
				} else {
					accordion.closeItems($this);
				}
			});
		}()),
	}
}

if(document.querySelectorAll('.events-results').length){
	var daysMenuHeight = $('.events-calendar').height();
	window.addEventListener('scroll',function(){
		if(document.querySelector('html').clientWidth > 992){
			var daysMenuOffsetBottom = $('.events-calendar').offset().top + daysMenuHeight;
			$('.events-results .entry-result').each(function(i){
				var dayBtnParent = $('.events-calendar .days-wrap a[href="#day-'+(i+1)+'"]').parent();
				if($(this).offset().top <= daysMenuOffsetBottom){
					dayBtnParent.addClass('active1');
				}else{
					dayBtnParent.removeClass('active1');
				}
			});
			$('.events-calendar .days-wrap li.active1').last().siblings().removeClass('active');
			$('.events-calendar .days-wrap li.active1').last().addClass('active');
		}
	});
}

//אם יש סולמית בכתובת
if(window.location.href.indexOf('#') > -1){
	var theHashTag = window.location.href.replace(/.+#/,'#');
	if($(theHashTag).length){
		$('html, body').animate({scrollTop:$(theHashTag).offset().top},1000);
	}
}
//אם יש סולמית בקישור
$('a[href*="#"]').click(function(e){
	var theHashTag = $(this).attr('href').replace(/.+#/,'#');
	if($(theHashTag).length){
		e.preventDefault();
		history.pushState(null, null, theHashTag);
		$('html, body').animate({scrollTop:$(theHashTag).offset().top},1000);
	}
});
