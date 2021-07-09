<?php
/**
 * Register blocks
 */
function register_acf_block_types() {
	acf_register_block_type(
		array(
			'name'           => 'accordion',
			'title'          => __( 'Accordion', 'ystheme' ),
			'enqueue_style'  => THEME_URI . '/partials/blocks/block-accordion/block-accordion.css',
			'enqueue_script' => THEME_URI . '/partials/blocks/block-accordion/block-accordion.js',
			'category'       => 'custom',
			'icon'           => 'star-filled',
			'keywords'       => array( 'accordion' ),
			'supports'       => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'contact-form',
			'title'           => __( 'Contact Form', 'ystheme' ),
			'render_template' => 'partials/blocks/block-contact-form/block-contact-form.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-contact-form/block-contact-form.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'contact form' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'contact-page',
			'title'           => __( 'Contact Page', 'ystheme' ),
			'render_template' => 'partials/blocks/block-contact-page/block-contact-page.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-contact-page/block-contact-page.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'contact' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'editor',
			'title'           => __( 'Editor', 'ystheme' ),
			'render_template' => 'partials/blocks/block-editor/block-editor.php',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'editor' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'embed',
			'title'           => __( 'Embed', 'ystheme' ),
			'render_template' => 'partials/blocks/block-embed/block-embed.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-embed/block-embed.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'embed' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'icon-title-text',
			'title'           => __( 'Icon + Title + Text', 'ystheme' ),
			'render_template' => 'partials/blocks/block-icon-title-text/block-icon-title-text.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-icon-title-text/block-icon-title-text.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'icon title text' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'image',
			'title'           => __( 'Image', 'ystheme' ),
			'render_template' => 'partials/blocks/block-image/block-image.php',
			'enqueue_script'  => THEME_URI . '/partials/blocks/block-image/block-image.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'image' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'quote',
			'title'           => __( 'Quote', 'ystheme' ),
			'render_template' => 'partials/blocks/block-quote/block-quote.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-quote/block-quote.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'quote' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'shortcode',
			'title'           => __( 'Shortcode', 'ystheme' ),
			'render_template' => 'partials/blocks/block-shortcode/block-shortcode.php',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'shortcode' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'slider-images',
			'title'           => __( 'Images Slider', 'ystheme' ),
			'render_template' => 'partials/blocks/block-slider-images/block-slider-images.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-slider-images/block-slider-images.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'images slider' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'slider-posts',
			'title'           => __( 'Posts Slider', 'ystheme' ),
			'render_template' => 'partials/blocks/block-slider-posts/block-slider-posts.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-slider-posts/block-slider-posts.css',
			'enqueue_script'  => THEME_URI . '/partials/blocks/block-slider-posts/block-slider-posts.js',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'posts slider' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'slider-testimonials',
			'title'           => __( 'Testimonials Slider', 'ystheme' ),
			'render_template' => 'partials/blocks/block-slider-testimonials/block-slider-testimonials.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-slider-testimonials/block-slider-testimonials.css',
			'enqueue_script'  => THEME_URI . '/partials/blocks/block-slider-testimonials/block-slider-testimonials.js',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'testimonials' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'slider-with-thumbnails',
			'title'           => __( 'Thumbnails Slider', 'ystheme' ),
			'render_template' => 'partials/blocks/block-slider-with-thumbnails/block-slider-with-thumbnails.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-slider-with-thumbnails/block-slider-with-thumbnails.css',
			'enqueue_script'  => THEME_URI . '/partials/blocks/block-slider-with-thumbnails/block-slider-with-thumbnails.js',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'slider with thumbnails' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'spacer',
			'title'           => __( 'Spacer', 'ystheme' ),
			'render_template' => 'partials/blocks/block-spacer/block-spacer.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-spacer/block-spacer.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'spacer' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'strong-text',
			'title'           => __( 'Strong Text', 'ystheme' ),
			'render_template' => 'partials/blocks/block-strong-text/block-strong-text.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-strong-text/block-strong-text.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'strong text' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'tabs',
			'title'           => __( 'Tabs', 'ystheme' ),
			'render_template' => 'partials/blocks/block-tabs/block-tabs.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-tabs/block-tabs.css',
			'enqueue_script'  => THEME_URI . '/partials/blocks/block-tabs/block-tabs.js',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'tabs' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'title',
			'title'           => __( 'Title', 'ystheme' ),
			'render_template' => 'partials/blocks/block-title/block-title.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-title/block-title.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'title' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'video-lightbox',
			'title'           => __( 'Video Lightbox', 'ystheme' ),
			'render_template' => 'partials/blocks/block-video-lightbox/block-video-lightbox.php',
			'enqueue_style'   => THEME_URI . '/partials/blocks/block-video-lightbox/block-video-lightbox.css',
			'category'        => 'custom',
			'icon'            => 'star-filled',
			'keywords'        => array( 'video lightbox' ),
			'supports'        => array(
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);
}

/**
 * Check if function exists and hook into setup.
 */
if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'register_acf_block_types' );
}

/**
 * Custom Blocks category
 */
function ys_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'custom',
				'title' => __( 'Custom Blocks', 'ystheme' ),
			),
		)
	);
}
add_filter( 'block_categories', 'ys_block_category', 10, 2 );

