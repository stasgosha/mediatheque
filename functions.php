<?php
/**
 * Theme functions and definitions.
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Defines
 */
define( 'THEME_URI', get_template_directory_uri() );    // <url>/wp-content/themes/starter
define( 'THEME_URL', get_template_directory() );        // /home/starter/public_html/wp-content/themes/starter
define( 'THEME_VER', wp_get_theme()->get( 'Version' ) );

/**
 * Includes
 */
get_template_part( 'classes/class', 'h' );                      // Helper class
get_template_part( 'classes/class', 'mobile-menu-walker' );     // Mobile Menu Walker

/**
 * Post Thumbnail Support
 */
function ystheme_theme_support() {

	// Add text domain
	load_theme_textdomain( 'ystheme', THEME_URL . '/languages' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add custom image sizes
	add_image_size( 'post-thumbnail', 370, 250, true );
	add_image_size( 'post-slide', 568, 301, true );
	add_image_size( 'upcoming-slide', 516, 273, true );
	add_image_size( 'single-movie-slide', 792, 455, true );
	add_image_size( 'single-movie-small-slide', 122, 82, true );
	add_image_size( 'header-image', 1900, 500, true );
	add_image_size( 'slider-hero', 1900, 500, true );
	add_image_size( 'slider-images', 500, 500, true );
	add_image_size( 'small', 200, 200, false );
	add_image_size( 'search-result-item', 276, 149, true );
}
add_action( 'after_setup_theme', 'ystheme_theme_support' );

/**
 * Enqueue Assets
 *
 */
function ystheme_enqueue_assets() {
	// Assets - CSS
	wp_enqueue_style( 'bootstrap-grid', THEME_URI . '/assets/css/bootstrap-grid.css', array(), THEME_VER );
	wp_enqueue_style( 'aos', THEME_URI . '/assets/css/aos.css', array(), THEME_VER );
	wp_enqueue_style( 'selectize', THEME_URI . '/assets/css/selectize.css', array(), THEME_VER );
	wp_enqueue_style( 'simple-calendar', THEME_URI . '/assets/css/simple-calendar.css', array(), THEME_VER );
	wp_enqueue_style( 'fancybox', THEME_URI . '/assets/css/jquery.fancybox.css', array(), THEME_VER );
	wp_enqueue_style( 'magnific-popup', THEME_URI . '/assets/css/magnific-popup.css', array(), THEME_VER );
	wp_enqueue_style( 'swiper', THEME_URI . '/assets/css/swiper-bundle.css', array(), THEME_VER );
	wp_enqueue_style( 'slick', THEME_URI . '/assets/css/slick.min.css', array(), THEME_VER );
	wp_enqueue_style( 'slick-theme', THEME_URI . '/assets/css/slick-theme.min.css', array(), THEME_VER );

	// Assets - JS
	wp_dequeue_script( 'moment' );
	wp_enqueue_script( 'moment-js', THEME_URI . '/assets/js/moment.js', array( 'jquery' ), THEME_VER, true );
	wp_enqueue_script( 'smoothState', 'https://unpkg.com/swup@latest/dist/swup.min.js', array(), THEME_VER, true );
	wp_enqueue_script( 'fancybox', THEME_URI . '/assets/js/jquery.fancybox.js', array(), THEME_VER, true );
	wp_enqueue_script( 'magnific-popup', THEME_URI . '/assets/js/jquery.magnific-popup.min.js', array(), THEME_VER, true );
	wp_enqueue_script( 'selectize', THEME_URI . '/assets/js/selectize.min.js', array( 'jquery' ), THEME_VER, true );
	wp_enqueue_script( 'simple-calendar', THEME_URI . '/assets/js/jquery.simple-calendar.js', array( 'jquery' ), THEME_VER, true );
	wp_enqueue_script( 'aos', THEME_URI . '/assets/js/aos.js', array(), THEME_VER, true );
	wp_enqueue_script( 'js-cookie', THEME_URI . '/assets/js/js.cookie.min.js', array(), THEME_VER, true );
	wp_enqueue_script( 'jquery-mobile', THEME_URI . '/assets/js/jquery.mobile.custom.js', array(), THEME_VER, true );
	wp_enqueue_script( 'swiper', THEME_URI . '/assets/js/swiper-bundle.js', array(), THEME_VER, true );
	wp_enqueue_script( 'slick', THEME_URI . '/assets/js/slick.js', array(), THEME_VER, true );
	wp_enqueue_script( 'esrojsapi', 'https://tickets.mediatheque.org.il/iframe/esrojsapi.js', array( 'jquery' ), THEME_VER, true );

	if ( is_front_page() ) {
		wp_enqueue_style( 'acmeticker', THEME_URI . '/assets/css/acmeticker.min.css', array(), THEME_VER );
		wp_enqueue_script( 'acmeticker', THEME_URI . '/assets/js/acmeticker.min.js', array( 'jquery' ), '1.0', true );
	}

}
add_action( 'wp_enqueue_scripts', 'ystheme_enqueue_assets' );
add_action( 'admin_enqueue_scripts', 'ystheme_enqueue_assets', 100 );

/**
 * Front-End Enqueue
 */
function ystheme_scripts_and_styles() {
	wp_enqueue_style( 'main-style', THEME_URI . '/build/css/main-style.css?v=5', array(), THEME_VER );
	wp_enqueue_style( 'responsive', THEME_URI . '/build/css/responsive.css?v=5', array(), THEME_VER );
	// wp_enqueue_style( 'dark-mode', THEME_URI . '/build/css/dark-mode.css', array(), THEME_VER );

	if ( is_page_template( 'views/tpl-event-tours.php' ) ) {

		wp_enqueue_script( 'calendar', THEME_URI . '/build/js/events-calendar.js', array( 'jquery' ), THEME_VER, true );

	}

	wp_enqueue_script( 'scripts', THEME_URI . '/build/js/scripts.js?v=5', array(), THEME_VER, true );

	$google_maps_api_key = get_field( 'google_maps_api_key', 'option' );

	if ( $google_maps_api_key && get_field( 'location', 'option' ) ) {
		wp_enqueue_script( 'google-maps', "https://maps.googleapis.com/maps/api/js?key={$google_maps_api_key}", array(), THEME_VER, true );
	}

}
add_action( 'wp_enqueue_scripts', 'ystheme_scripts_and_styles' );

/**
 * Localize Script
 */
function ystheme_localize_script() {
	$today = gmdate( 'Y-m-dTh:s' );

	$site_object = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'homeurl' => get_site_url(),
		'nonce'   => wp_create_nonce(),
		'strings' => array(
			'prev_slide' => __( 'Previous Slide', 'ystheme' ),
			'next_slide' => __( 'Next Slide', 'ystheme' ),
			'no_results' => __( 'No Results Found', 'ystheme' ),
		),
	);

	if ( is_singular( array( 'mt_activity', 'mt_exhibition' ) ) ) {

		$dates      = get_field( 'event_display_dates' );
		$next_dates = array();

		if ( $dates ) {
			foreach ( $dates as $key => $date ) {

				$row_date = gmdate( 'Y-m-dTh:s', strtotime( $date['ActualEventDate'] ) );

				if ( $row_date >= $today ) {
					$next_dates[] = $row_date;
				}
			}
		}

		$site_object['event_display_dates'] = $next_dates;
	}

	wp_localize_script( 'scripts', 'siteObject', $site_object );
	wp_localize_script( 'admin-js', 'siteObject', $site_object );
}
add_action( 'wp_enqueue_scripts', 'ystheme_localize_script' );

/**
 * Back-End Enqueue
 */
function ystheme_admin_enqueue_styles() {
	wp_enqueue_style( 'admin-style', THEME_URI . '/admin/admin.css', array(), THEME_VER );
}
add_action( 'admin_enqueue_scripts', 'ystheme_admin_enqueue_styles', 100 );

function ystheme_admin_enqueue_scripts() {
	wp_enqueue_script( 'admin-js', THEME_URI . '/admin/admin.js', array(), THEME_VER, false );
}
add_action( 'admin_enqueue_scripts', 'ystheme_admin_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'ystheme_localize_script' );

/**
 * Preload fonts
 */
function add_preload_fonts() {
	?>

	<link rel="preload" href="<?php echo THEME_URI; ?>/assets/fonts/fontawesome/fontawesome-webfont.woff2" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo THEME_URI; ?>/assets/fonts/assistant/Assistant-Regular.woff" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo THEME_URI; ?>/assets/fonts/assistant/Assistant-Bold.woff" as="font" crossorigin="anonymous">
	<!-- <link rel="preload" href="<?php echo THEME_URI; ?>/assets/fonts/icomoon/icomoon.ttf" as="font" crossorigin="anonymous"> -->

	<?php
}
add_action( 'wp_head', 'add_preload_fonts' );

/**
 * Show Post Thumbnail in Admin Columns
 */
function ystheme_posts_columns( $post_columns, $post_type ) {
	if ( post_type_supports( $post_type, 'thumbnail' ) ) {
		$post_columns['ys_post_thumbnail'] = __( 'Featured Image', 'ystheme' );
	}

	return $post_columns;
}
add_filter( 'manage_posts_columns', 'ystheme_posts_columns', 5, 2 );

function ystheme_posts_custom_columns( $column_name, $post_id ) {
	if ( 'ys_post_thumbnail' === $column_name ) {
		echo the_post_thumbnail( array( 40, 40 ) );
	}
}
add_action( 'manage_posts_custom_column', 'ystheme_posts_custom_columns', 5, 2 );

/**
 * Register Menus
 */
function ystheme_register_menus() {
	register_nav_menus(
		array(
			'main-menu'   => __( 'Main Menu', 'ystheme' ),
			'mobile-menu' => __( 'Main Menu - Mobile', 'ystheme' ),
		)
	);
}
add_action( 'init', 'ystheme_register_menus' );

/**
 * Theme Options
 */
function ystheme_acf_init() {

	// Init options page
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => __( 'Theme Options', 'ystheme' ),
				'menu_title' => __( 'Theme Options', 'ystheme' ),
				'menu_slug'  => 'theme-general-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
			)
		);
	}

	// Init Google Maps
	acf_update_setting( 'google_api_key', get_field( 'google_maps_api_key', 'option' ) );
}
add_action( 'acf/init', 'ystheme_acf_init' );

/**
 * Add ACF Options to Admin Bar
 */
function ystheme_options_adminbar( $wp_admin_bar ) {
	if ( current_user_can( 'administrator' ) ) {
		$args = array(
			'id'    => 'theme_options',
			'title' => __( 'Theme Options', 'ystheme' ),
			'href'  => home_url() . '/wp-admin/admin.php?page=theme-general-settings',
		);
		$wp_admin_bar->add_node( $args );
	}
}
add_action( 'admin_bar_menu', 'ystheme_options_adminbar', 999 );

/**
 * ACF Local JSON - Save
 */
function ys_acf_json_save_point( $path ) {
	$path = THEME_URL . '/admin/acf-json';

	return $path;

}
add_filter( 'acf/settings/save_json', 'ys_acf_json_save_point' );

/**
 * ACF Local JSON - Load
 */
function ys_acf_json_load_point( $paths ) {
	unset( $paths[0] );

	$paths[] = THEME_URL . '/admin/acf-json';

	return $paths;
}
add_filter( 'acf/settings/load_json', 'ys_acf_json_load_point' );

/**
 * Head CSS
 */
function ystheme_wp_head_css() {

	if ( ! is_singular( 'mt_event' ) ) {
		return;
	}
	$header_image            = get_field( 'header_image' );
	$header_image_mobile     = get_field( 'header_image_mobile' );

	if ( is_search() ) {
		$header_image = H::mega_get_field( 'search_bg' );
	}
	$header_image_url        = ! empty( $header_image ) ? $header_image['url'] : '';
	$header_image_mobile_url = ! empty( $header_image_mobile ) ? $header_image_mobile['url'] : '';
	if( wp_is_mobile() && $header_image_mobile_url ) {
		$header_image_url = $header_image_mobile_url;
	}
	?>

	<style type="text/css">

	<?php if ( $header_image_url ) : ?>
	.header-image {
		background-image: url(<?php echo $header_image_url; ?> );
	}

	<?php endif; ?>

		<?php

		if ( is_singular() ) {
			$parse_blocks = parse_blocks( get_the_content() );

			H::array_walk_recursive(
				$parse_blocks,
				function ( $value, $key ) use ( &$blocks ) {
					if ( isset( $value['id'] ) ) {
						$blocks[] = $value;
					}
				}
			);

			$resolutions = array(
				'styling',
				'styling_mobile',
			);

			foreach ( $resolutions as $resolution ) {
				if ( 'styling_mobile' === $resolution ) {
					echo "\n";
					echo "@media only screen and (max-width:992px) { \n";
				}

				foreach ( $blocks as $block ) {
					if ( isset( $block['id'] ) ) {
						$css = '';
						$el  = '.block-' . str_replace( 'acf/', '', $block['name'] ) . '[data-id="' . $block['id'] . '"]';

						$properties = array(
							'margin',
							'padding',
							'background-color',
						);
						//block_603f7d51dcccb
						foreach ( $properties as $property ) {
							if ( isset( $block['data'][ $resolution . '_' . $property ] ) && ( $block['data'][ $resolution . '_' . $property ] || '0' === $block['data'][ $resolution . '_' . $property ] ) ) {
								$css .= $property . ':' . $block['data'][ $resolution . '_' . $property ] . ';';
							}
						}

						if ( $css ) {
							echo $el . ' { ' . $css . ' }';
							echo "\n";
						}
					}
				}

				if ( 'styling_mobile' === $resolution ) {
					echo ' }';
				}
			}
		}

		?>
	</style>

	<?php
}
add_action( 'wp_head', 'ystheme_wp_head_css' );

/**
 * Remove Comments From Admin Screen
 */
function ystheme_remove_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'ystheme_remove_menus' );

/**
 * Remove comments from admin bar
 */
function ys_remove_comments_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'ys_remove_comments_admin_bar' );

/**
 * Disable Gutenberg for pages
 */
function ystheme_disable_gutenberg() {
	//add_filter( 'use_block_editor_for_post', '__return_false', 10 );
}
add_action( 'current_screen', 'ystheme_disable_gutenberg' );

/**
 * Open head scripts
 */
function ystheme_wp_head_scripts() {
	the_field( 'scripts_head', 'option' );
}
add_action( 'wp_head', 'ystheme_wp_head_scripts' );

/**
 * Open body scripts
 */
function ystheme_wp_body_open_scripts() {
	the_field( 'scripts_open_body', 'option' );
}
add_action( 'wp_body_open', 'ystheme_wp_body_open_scripts' );

/**
 * Footer scripts
 */
function ystheme_wp_footer_scripts() {
	the_field( 'scripts_footer', 'option' );
}
add_action( 'wp_footer', 'ystheme_wp_footer_scripts', 20 );

/**
 * Body Class
 */
function ystheme_body_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $is_edge;

	if ( is_tax() ) {
		$object = get_queried_object();

		if ( $object->parent ) {
			$classes[] = 'has_parent';
		} else {
			$classes[] = 'no_parent';
		}
	}
	if ( $is_lynx ) {
		$classes[] = 'lynx';
	} elseif ( $is_gecko ) {
		$classes[] = 'firefox';
	} elseif ( $is_opera ) {
		$classes[] = 'opera';
	} elseif ( $is_NS4 ) {
		$classes[] = 'ns4';
	} elseif ( $is_safari ) {
		$classes[] = 'safari';
	} elseif ( $is_chrome ) {
		$classes[] = 'chrome';
	} elseif ( $is_edge ) {
		$classes[] = 'edge';
	} elseif ( $is_IE ) {
		$classes[] = 'ie';
	} else {
		$classes[] = 'unknown';
	}

	if ( $is_iphone ) {
		$classes[] = 'iphone';
	}

	return $classes;
}
add_filter( 'body_class', 'ystheme_body_class' );

/**
 * Enable font size in the editor
 */
function ystheme_mce_buttons( $buttons ) {
	array_unshift( $buttons, 'fontsizeselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'ystheme_mce_buttons' );

/**
 * Customize font sizes in the editor
 */
function ystheme_mce_text_sizes( $init_array ) {
	$init_array['fontsize_formats'] = '1rem 1.2rem 1.3rem 1.4rem 1.6rem 1.8rem 2.0rem 2.2rem 2.4rem 2.6rem 2.8rem 3.0rem 3.2rem 3.4rem 3.6rem';
	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'ystheme_mce_text_sizes' );

/**
 * Allow SVG Upload
 */
function ystheme_cc_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';

	return $mimes;
}
add_filter( 'upload_mimes', 'ystheme_cc_mime_types' );

/**
 * Add CSS class "current-menu-item" to archive nav item when on custom post type single page
 */
function ystheme_add_current_class_to_archive_nav_item( $classes = array(), $menu_item = false ) {
	if ( is_singular() ) {
		global $post;
		if ( $menu_item->url ) {
			$classes[] = ( get_post_type_archive_link( $post->post_type ) === $menu_item->url ) ? 'current-menu-item' : '';
		}
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'ystheme_add_current_class_to_archive_nav_item', 10, 2 );
/**
 * Ajax get post - buy now form
 */
function ajax_get_post() {
	$today   = gmdate( 'Y-m-dTh:s' );
	$post_id = sanitize_text_field( $_POST['post_id'] );

	$results = array(
		'ok' => false,
	);

	if ( $post_id ) {
		$args = array(
			'post_type'      => array( 'mt_event' ),
			'posts_per_page' => 1,
			'p'              => $post_id,
		);

		$dates = '';

		$query = new WP_Query( $args );

		ob_start();

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$dates      = get_field( 'event_display_dates' );
				$next_dates = array();

				if ( $dates ) {
					foreach ( $dates as $key => $date ) {

						$row_date = gmdate( 'Y-m-dTh:s', strtotime( $date['ActualEventDate'] ) );

						if ( $row_date >= $today ) {
							$next_dates[] = $row_date;
						}
					}
				}
				get_template_part( 'partials/loop-buy-now' );
			}

			wp_reset_query();

			$results = array(
				'html'  => ob_get_clean(),
				'ok'    => true,
				'dates' => $next_dates,
			);
		}
	}

	wp_send_json( $results );
}
add_action( 'wp_ajax_nopriv_ajax_get_post', 'ajax_get_post' );
add_action( 'wp_ajax_ajax_get_post', 'ajax_get_post' );

function ajax_get_post_date_hours() {
	$post_id = sanitize_text_field( $_POST['post_id'] );
	$date    = sanitize_text_field( $_POST['date'] );

	$results = array(
		'ok' => false,
	);

	if ( $post_id && $date ) {

		$date = date( 'Y-m-d', strtotime( $date ) );
		$args = array(
			'post_type'      => array( 'mt_event' ),
			'posts_per_page' => 1,
			'p'              => $post_id,
		);

		$hours     = array();
		$main_link = '';

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$dates = get_field( 'event_display_dates' );

				if ( $dates ) {
					foreach ( $dates as $row ) {

						$row_date = gmdate( 'Y-m-d', strtotime( $row['ActualEventDate'] ) );
						if ( $row_date == $date ) {
							$main_link = get_field( 'DirectLink' );
							$hours[]   = array(
								'date' => gmdate( 'H:i', strtotime( $row['ActualEventDate'] ) ),
								'url'  => $row['DirectLink'],
							);
						}
					}
				}
			}

			wp_reset_query();

			$results = array(
				'ok'        => true,
				'hours'     => $hours,
				'main_link' => $main_link,
			);
		}
	}

	wp_send_json( $results );
}
add_action( 'wp_ajax_nopriv_ajax_get_post_date_hours', 'ajax_get_post_date_hours' );
add_action( 'wp_ajax_ajax_get_post_date_hours', 'ajax_get_post_date_hours' );


/**
 * Ajax load more
 */
function ajax_load_more() {
	$args = $_POST['args'];

	$offset   = isset( $_POST['offset'] ) ? intval( $_POST['offset'] ) : wp_send_json( 'Invalid offset param' );
	$load     = isset( $_POST['load'] ) && $_POST['load'] < 30 ? intval( $_POST['load'] ) : wp_send_json( 'Invalid load param' );
	$template = ! empty( $_POST['template'] ) ? sanitize_text_field( $_POST['template'] ) : 'loop-' . $args['post_type'];

	$args['post_status']    = 'publish';
	$args['offset']         = $offset;
	$args['posts_per_page'] = $load;

	if ( $load > 30 ) {
		wp_send_json( 'Too many posts per load' );
	}
	ob_start();

	$query = new WP_Query( $args );

	$total = $query->found_posts;

	while ( $query->have_posts() ) {
		$query->the_post();

		get_template_part( 'partials/' . $template );
	}

	wp_reset_query();

	$results = array(
		'html' => ob_get_clean(),
		'more' => $offset + $load < $total ? true : false,
	);

	wp_send_json( $results );
}
add_action( 'wp_ajax_nopriv_ajax_load_more', 'ajax_load_more' );
add_action( 'wp_ajax_ajax_load_more', 'ajax_load_more' );

/**
 * Ajax login
 */
function ajax_login() {
	$data = $_POST['data'];
	//check_ajax_referer( -1, 'nonce' );

	//parse_str( $_POST['data'], $data );

	if ( is_email( $data['username'] ) ) {
		$info['user_login'] = get_user_by( 'email', $data['email'] );
		$info['user_login'] = $info['user_login']->user_login;
	} else {
		$info['user_login'] = sanitize_text_field( $data['email'] );
	}
	$info['user_password'] = sanitize_text_field( $data['password'] );
	$info['remember']      = $data['remember'] ? true : false;

	$user_signon = wp_signon( $info, false );

	if ( is_wp_error( $user_signon ) ) {
		$results = array(
			'status'  => 'error',
			'message' => __( 'Incorrect username or password', 'ystheme' ),
		);
	} else {
		$results = array(
			'status'  => 'success',
			'message' => __( 'Login Completed', 'ystheme' ),
		);
	}

	wp_send_json( $results );
}

add_action( 'wp_ajax_nopriv_ajax_login', 'ajax_login' );
add_action( 'wp_ajax_ajax_login', 'ajax_login' );



function get_events() {

	$results = array(
		'ok' => false,
	);

	if ( isset( $_POST['end_week'] ) && ! empty( $_POST['end_week'] ) ) {

		$start_week = strtotime( sanitize_text_field( $_POST['start_week'] ) );
		$end_week   = strtotime( sanitize_text_field( $_POST['end_week'] ) );
		$date       = gmdate( 'Y-m-d', $start_week );
		$year       = gmdate( 'Y', $end_week );
		$week       = gmdate( 'W', $end_week );

		$html = events_query_by_day( $date, $year, $week );

		$results = array(
			'ok'   => true,
			'html' => $html,
		);
	}

	wp_send_json( $results );
}

add_action( 'wp_ajax_nopriv_get_events', 'get_events' );
add_action( 'wp_ajax_get_events', 'get_events' );

function events_query_by_day( $date, $year, $week ) {

	ob_start();

	$days = array();
	$html = '';
	for ( $i = 0; $i <= 6; $i++ ) {
		$ts       = strtotime( $date . ' +' . $i . ' day' );
		$day_num  = gmdate( 'j', $ts );
		$day_text = date_i18n( 'l,j M Y', $ts );
		$days[]   = array(
			'num'  => $day_num,
			'text' => $day_text,
			'time' => $ts,
		);
	}

	foreach ( $days as $key => $day ) {
		$loop_date = gmdate( 'Ymd', $day['time'] );

		$args = array(
			'post_type'      => array( 'mt_event' ),
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'meta_query'	 => array(
				array(
					'key'	=> 'event_display_dates_$_ActualEventDate',
					'type'  => 'DATE',
					'value'	=> gmdate( 'Ymd', $day['time'] ),
				),
			)

		);

		$query = new WP_Query( $args );
		?>
		<div class="entry-result <?php echo 0 !== $key ? 'hide-mobile' : ''; ?>" data-day="<?php echo $day['num']; ?>" id="day-<?php echo $key + 1; ?>">

			<?php if ( $query->have_posts() ) : ?>

			<div class="entry-header">
				<h2 class="entry-day-title">
					<span class="icon meditech-calander"></span>
					<span class="text">
						<?php echo $day['text']; ?>
					</span>
				</h2>
			</div>


			<div class="entry-body">
				<div class="results-grid">
					<?php

					$has_posts = false;
					while ( $query->have_posts() ) {
						$query->the_post();
						$show = false;

						$dates = get_field( 'event_display_dates' );
						$loop_date = gmdate( 'Y-m-d', $day['time'] );

						if ( $dates ) {
							foreach ( $dates as $date ) {

								$row_date = gmdate( 'Y-m-d', strtotime( $date['ActualEventDate'] ) );

								if ( $row_date === $loop_date ) {
									$show      = true;
									$has_posts = true;

									break;
								}
							}

							if ( $show ) {
								get_template_part( 'partials/loop', 'activity' );
							}
						}
					}

					wp_reset_postdata();
					?>

				</div>
			</div>
			<?php else : ?>
			<div class="entry-header">
				<h2 class="entry-day-title">
					<span class="icon meditech-no-calander"></span>
					<span class="text">
						<?php echo $day['text']; ?>
					</span>
				</h2>
				<span class="no-posts">
					<?php _e( 'אין אירועים להצגה במועד זה.', 'ystheme' ); ?>
				</span>
			</div>
		<?php endif; ?>
		</div>
		<?php

	}

	$html = ob_get_contents();
	ob_end_clean();

	return $html;
}
function get_calendar_item( $day_num, $day_text, $active ) {

	$item = '<li data-value="' . $day_num . '"' . ( $active ? 'class="active"' : '' ) . '>' .
			'<span class="text">' . $day_text . '</span>' .
			'<span class="num">' . $day_num . '</span>' .
			'</li>';

			return $item;
}

/**
 * Render block by device
 *
 * @param string $block_content The block content about to be appended.
 * @param array $block The full block, including name and attributes.
 * @return void
 */
function render_block_by_device( $block_content, $block ) {
	$visibility = isset( $block['attrs']['data']['visibility'] ) ? $block['attrs']['data']['visibility'] : '';

	if ( ! $visibility ) {
		return $block_content;
	}

	if ( ( wp_is_mobile() && 'desktop' === $visibility ) || ! wp_is_mobile() && 'mobile' === $visibility ) {
		$block_content = '';
	}

	return $block_content;
}
add_filter( 'render_block', 'render_block_by_device', 10, 2 );


add_filter( 'upload_mimes', 'add_custom_mime_types' );

function add_custom_mime_types( $mimes ) {
	return array_merge(
		$mimes,
		array(
			'xml' => 'text/xml',
		)
	);
}

function get_months() {
	$array = array(
		'01' => __( 'ינואר', 'ystheme' ),
		'02' => __( 'פבואר', 'ystheme' ),
		'03' => __( 'מרץ', 'ystheme' ),
		'04' => __( 'אפריל', 'ystheme' ),
		'05' => __( 'מאי', 'ystheme' ),
		'06' => __( 'יוני', 'ystheme' ),
		'07' => __( 'יולי', 'ystheme' ),
		'08' => __( 'אוגוסט', 'ystheme' ),
		'09' => __( 'ספטמבר', 'ystheme' ),
		'10' => __( 'אוקטובר', 'ystheme' ),
		'11' => __( 'נובמבר', 'ystheme' ),
		'12' => __( 'דצמבר', 'ystheme' ),
	);

	return $array;
}

function event_filter_by_repatear_dates( $where ) {

	$where = str_replace( "meta_key = 'event_display_dates_$", "meta_key LIKE 'event_display_dates_%", $where);

	return $where;
}

add_filter('posts_where', 'event_filter_by_repatear_dates');


add_action( 'init', 'hide_admin_bar_homepage' );

function hide_admin_bar_homepage() {
	if ( is_front_page() ) {
		add_filter( 'show_admin_bar', '__return_false' );
	}
}


function render_btn( $text, $class = false, $link = false ) {
 ?>
 <a class="hover-flip-item-wrapper <?php echo $class ? $class : ''; ?>" href="<?php echo $link ? $link : '#'; ?>">
	 <span class="hover-flip-item">
		 <span data-text="<?php echo $text; ?>">
			 <?php echo $text; ?>
		 </span>
	 </span>
	 <span class="icon">
		 <span class="meditech-arrow-left"></span>
		 <span class="meditech-arrow-left clone"></span>
	 </span>
 </a>
 <?php
}



function limit_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'posts_per_page', 5 );
    }
}
add_action( 'pre_get_posts', 'limit_search_results' );


/**
 * print_svg - Print SVG
 * @param  string $path svg url
 * @return string svg image
 */
function print_svg( $path ) {
	try {
		return file_get_contents( $path );
	} catch ( \Exception $e ) {
		return '';
	}
}


/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );
