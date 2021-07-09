<?php
/**
 * Register post types:
 * product, testimonial
 */
function register_post_types() {

	// Product post type
	register_post_type(
		'product',
		$args = array(
			'label'               => __( 'Product', 'ystheme' ),
			'description'         => __( 'Product', 'ystheme' ),
			'labels'              => array(
				'name'           => __( 'Products', 'ystheme' ),
				'singular_name'  => __( 'Product', 'ystheme' ),
				'menu_name'      => __( 'Products', 'ystheme' ),
				'name_admin_bar' => __( 'Product', 'ystheme' ),
			),
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			'hierarchical'        => false,                     // default: false
			'public'              => true,                      // default: false
			'show_ui'             => true,                      // default: value of $public
			'show_in_menu'        => true,                      // default: value of $show_in_menu
			'menu_position'       => 5,                         // default: null
			'show_in_admin_bar'   => true,                      // default: value of $public
			'show_in_nav_menus'   => true,                      // default: value of $public
			'can_export'          => true,                      // default: true
			'has_archive'         => true,                      // default: false
			'exclude_from_search' => false,                     // default: opposite value of $public
			'publicly_queryable'  => true,                      // default: false
			'capability_type'     => 'page',                    // default: 'post'
			'menu_icon'           => 'dashicons-cart',
		)
	);

	// Testimonial post type
	register_post_type(
		'testimonial',
		array(
			'label'       => __( 'Testimonial', 'ystheme' ),
			'description' => __( 'Testimonial', 'ystheme' ),
			'labels'      => array(
				'name'           => __( 'Testimonials', 'ystheme' ),
				'singular_name'  => __( 'Testimonial', 'ystheme' ),
				'menu_name'      => __( 'Testimonials', 'ystheme' ),
				'name_admin_bar' => __( 'Testimonial', 'ystheme' ),
			),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'show_ui'     => true,
			'menu_icon'   => 'dashicons-testimonial',
		)
	);
}
// add_action( 'init', 'register_post_types', 0 );

/**
 * Register taxonomies:
 * testimonials_cat, product_cat
 */
function register_taxonomies() {

	// Testimonials category taxonomy
	register_taxonomy(
		'testimonial_cat',
		array( 'testimonial' ),
		$args = array(
			'labels'            => array(
				'name'          => __( 'Testimonials Categories', 'ystheme' ),
				'singular_name' => __( 'Testimonial Category', 'ystheme' ),
				'menu_name'     => __( 'Testimonials Categories', 'ystheme' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		)
	);

	// Product category taxonomy
	register_taxonomy(
		'product_cat',
		array( 'product' ),
		$args = array(
			'labels'            => array(
				'name'          => __( 'Products Categories', 'ystheme' ),
				'singular_name' => __( 'Product Category', 'ystheme' ),
				'menu_name'     => __( 'Products Categories', 'ystheme' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		)
	);
}
// add_action( 'init', 'register_taxonomies', 0 );
