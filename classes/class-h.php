<?php
/**
 * Helpers for this theme
 */

class H {

	/**
	 * Debug
	 *
	 * @param array/object $var array or object to debug.
	 */
	static function debug( $var = '' ) {
		echo "<pre style='direction:ltr; text-align:left'>";
		print_r( $var );
		echo '</pre>';
	}

	/**
	 * Check if there is a dev url parameter
	 *
	 * @return boolean
	 */
	static function is_dev() {
		return isset( $_GET['dev'] ) ? true : false;
	}

	/**
	 * Theme Pagination
	 */
	static function theme_pagination() {
		global $wp_query;

		$big = 999999999;
		echo paginate_links(
			array(
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'prev_text' => '&lt',
				'next_text' => '&gt',
				'type'      => 'plain',
				'add_args'  => false,
			)
		);
	}

	/**
	 * Output the post thumbnail or "no-thumbnail image"
	 *
	 * @param string $size image size.
	 */
	static function the_post_thumbnail( $size = '' ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		} elseif ( get_field( 'no_thumbnail', 'option' ) ) {
			$image = get_field( 'no_thumbnail', 'option' );
			echo wp_get_attachment_image( $image, $size );
		} else {
			echo '<div class="no-thumbnail">';
				esc_attr_e( 'Please add thumbnail or "No Thumbnail Image" if you have no thumbnail (see theme options)', 'ystheme' );
			echo '</div>';
		}
	}

	/**
	 * Retrieve the post thumbnail src or "no-thumbnail image"
	 *
	 * @param string $size image size.
	 * @param int $post_id
	 */
	static function get_post_thumbnail( $size = '', $post_id = '' ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		if ( has_post_thumbnail( $post_id ) ) {
			$image = wp_get_attachment_image( get_post_thumbnail_id( $post_id ), $size );
		} elseif ( get_field( 'no_thumbnail', 'option' ) ) {
			$image = wp_get_attachment_image( get_field( 'no_thumbnail', 'option' ), $size );
		}

		return $image;
	}

	/**
	 * Retrieve the post thumbnail src or "no-thumbnail image"
	 *
	 * @param string $size image size.
	 * @param int $post_id
	 */
	static function get_post_thumbnail_src( $size = '', $post_id ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		if ( has_post_thumbnail() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
		} elseif ( get_field( 'no_thumbnail', 'option' ) ) {
			$image = wp_get_attachment_image_src( get_field( 'no_thumbnail', 'option' ), $size );
		}

		return $image[0];
	}

	/**
	 * Output the page title
	 *
	 * @return void
	 */
	static function the_title() {
		if ( is_category() ) {
			single_cat_title();
		} elseif ( is_page() ) {
			echo get_the_title();
		} elseif ( is_archive() && ! is_tax() && ! is_tag() ) {
			post_type_archive_title();
		} elseif ( is_tax() ) {
			single_term_title();
		} elseif ( is_tag() ) {
			echo single_tag_title();
		} elseif ( is_singular() ) {
			single_post_title();
		} elseif ( is_post_type_archive() ) {
			echo post_type_archive_title();
		} elseif ( is_search() ) {
			esc_html_e( 'Search Results', 'ystheme' );
		} elseif ( is_404() ) {
			esc_html_e( '404 - Page Not Found', 'ystheme' );
		}
	}

	/**
	 * Expanded get_field function
	 *
	 * @param string $field_id ACF field id.
	 * @return ACF field
	 */
	static function get_field( $field_id ) {
		$object = get_queried_object();

		if ( get_field( $field_id ) ) {
			$field = get_field( $field_id );
		} elseif ( get_sub_field( $field_id ) ) {
			$field = get_sub_field( $field_id );
		} elseif ( ( is_tax() || is_category() ) && get_field( $field_id, $object ) ) {
			$field = get_field( $field_id, $object );
		} else {
			$field = get_field( $field_id, 'option' );
		}

		return $field;
	}

	/**
	 * Expanded the_field function
	 *
	 * @param  string $field_id ACF field id.
	 * @return void
	 */

	static function the_field( $field_id ) {
		echo self::get_field( $field_id );
	}

	/**
	 * Get field including default field, archive fields and tax\cat field
	 *
	 * @param string $field_id ACF field id.
	 * @return mixed ACF field
	 */
	static function mega_get_field( $field_id = '' ) {
		if ( is_post_type_archive() ) {
			// acf archive fields must have a prefix with single post name, i.e: product-content.
			$obj   = get_queried_object();
			$name  = $obj->name;
			$field = get_field( "{$name}_{$field_id}", 'option' );
		} elseif ( is_tax() || is_category() ) {
			$term = get_queried_object();

			if ( get_field( $field_id, $term ) ) {
				$field = get_field( $field_id, $term );
			} elseif ( $term->parent && get_field( $field_id, $term->taxonomy . '_' . $term->parent ) ) {
				$field = get_field( $field_id, $term->taxonomy . '_' . $term->parent );
			}
		} elseif ( get_field( $field_id ) ) {
			$field = get_field( $field_id );
		}

		if ( ! isset( $field ) && get_field( $field_id, 'option' ) ) {
			$field = get_field( $field_id, 'option' );
		}

		if ( isset( $field ) ) {
			return $field;
		}
	}

	/**
	 * Render WPC7 Form
	 *
	 * @param int $field_id CF7 form id.
	 */
	static function render_cf7( $field_id = '' ) {
		$form_id = self::get_field( $field_id );
		echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' );
	}

	/**
	 * Get post term (first only)
	 *
	 * @param string $taxonomy taxonomy name.
	 * @return obj              term object.
	 */
	static function get_post_term( $taxonomy = '' ) {
		global $post;
		$terms = get_the_terms( $post, $taxonomy );
		if ( ! empty( $terms ) ) {
			$term = reset( $terms );
		}
		$term = isset( $term ) ? $term : '';
		return $term;
	}

	/**
	 * Returns the primary term for the chosen taxonomy set by Yoast SEO or the first term selected.
	 *
	 * @param integer $post The post id.
	 * @param string  $taxonomy The taxonomy to query. Defaults to category.
	 * @return term object
	 */
	static function get_primary_term( $taxonomy = 'category', $post = 0 ) {
		if ( ! $post ) {
			$post = get_the_ID();
		}

		$terms = get_the_terms( $post, $taxonomy );

		if ( $terms ) {
			$term_display = '';
			$term_slug    = '';
			$term_link    = '';

			if ( class_exists( 'WPSEO_Primary_Term' ) ) {
				$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post );
				$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
				$term               = get_term( $wpseo_primary_term );
			} else {
				$term = $terms[0];
			}
		}

		return $term;
	}

	/**
	 * Get post term title (first only)
	 *
	 * @param string $taxonomy taxonomy name.
	 * @return string first term.
	 */
	static function get_post_term_title( $taxonomy = '' ) {
		$term = self::get_post_term( $taxonomy );
		return $term->name;
	}

	/**
	 * Check if term has children or not
	 * @return boolean
	 */
	static  function term_has_children() {
		$term = get_queried_object();

		$children = get_terms(
			$term->taxonomy,
			array(
				'parent'     => $term->term_id,
				'hide_empty' => false,
			)
		);

		return $children ? true : false;
	}

	/**
	 * Highlight given words in a sting
	 *
	 * @param  string $text  String.
	 * @param  string $words Words to highlight.
	 * @return string        String with highlighted words
	 */
	static function highlight( $text = '', $words = '' ) {
		$highlighted = preg_filter( '/' . preg_quote( $words ) . '/i', '<strong class="highlight">$0</strong>', $text );

		if ( ! empty( $highlighted ) ) {
			$text = $highlighted;
		}

		return $text;
	}

	/**
	 * numbers of words to show.
	 *
	 * @param integer $int number of words to trim to
	 * @param string $after
	 * @return void
	 */
	static function the_excerpt( $int = 10, $after = '...' ) {
		$content         = has_excerpt() ? get_the_excerpt() : get_the_content();
		$trimmed_content = wp_trim_words( $content, $int, $after );
		echo esc_attr( $trimmed_content );
	}

	/**
	 * Get trim words
	 *
	 * @param integer $int Number of words to trim out of string.
	 * @return string Trimmed content
	 */
	static function get_the_excerpt( $int = 10 ) {
		if ( has_excerpt() ) {
			$content = get_the_excerpt();
		} else {
			$content = get_the_content();
		}

		return wp_trim_words( $content, $int );
	}

	/**
	 * Get first term name of current post
	 *
	 * @param  string $taxonomy taxonomy name
	 * @return string Term Name
	 */
	static function get_first_term_name( $taxonomy = '' ) {
		global $post;

		$terms = get_the_terms( $post, $taxonomy );

		if ( ! empty( $terms ) ) {
			return $terms[0]->name;
		} else {
			return;
		}
	}

	/**
	 * Get terms names of current post
	 *
	 * @param  string|array $taxonomy taxonomy name
	 * @return string Terms Names
	 */
	static function get_terms_names( $taxonomy = '' ) {
		global $post;

		return join( ', ', wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) ) );
	}

	/**
	 * Get post type title
	 *
	 * @param string $post_type
	 * @return string Post type title
	 */
	static function get_post_type_title( $post_type = '' ) {
		$pt = get_post_type_object( $post_type );

		if ( is_object( $pt ) ) {
			$label = $pt->label;

			switch ( $label ) {
				case 'Exhibitions':
					return __( 'תערוכות', 'meditech' );
					break;
				case 'Activities':
					return __( 'פעילויות', 'meditech' );
					break;
				default:
					// code...
					break;
			}
		}

	}

	/**
	 * Get nav menu name
	 *
	 * @return string
	 */
	static function get_nav_menu_name( $location = '' ) {
		$locations = get_nav_menu_locations();
		$menu_id   = $locations[ $location ];

		$nav_menu = wp_get_nav_menu_object( $menu_id );
		return $nav_menu->name;
	}

	/**
	 * Get social link URL
	 *
	 * @param string $network Network name
	 * @return string array with URL and screen-reader text
	 */
	static function get_social_link( $network ) {
		$networks = get_field( 'social_networks', 'option' );

		foreach ( $networks as $n ) {
			if ( $n['network'] === $network ) {
				return $n['url'];
			}
		}
	}

	/**
	 * Get post terms terms
	 * @param  string $post_id
	 * @param  string $taxonomy
	 * @param  string $field     to retrieve out of the $term object
	 * @param  string $prefix    prefix to add before the field
	 * @param  string $separator separator between the fields
	 * @return string a string of joined terms
	 */
	static function get_joined_post_terms( $post_id = '', $taxonomy = '', $field = '', $prefix = '', $separator = ', ' ) {
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		$terms = wp_list_pluck( get_the_terms( $post_id, $taxonomy ), $field );

		if ( $prefix ) {
			$terms = substr_replace( $terms, 'term-', 0, 0 );
		}

		return join( $terms, $separator );
	}

	/**
	 * Get joined terms of a post
	 *
	 * @param  string $post_id
	 * @param  string $taxonomy
	 * @return string jonied terms separated by comma, e.g. "Dogs, Cats, Hamsters"
	 */
	static function get_the_joined_terms( $post_id = '', $taxonomy = '' ) {
		return self::get_joined_post_terms( $post_id, $taxonomy, 'name', null, ', ' );
	}

	/**
	 * Get terms classes of a post
	 *
	 * @param  string $post_id
	 * @param  string $taxonomy
	 * @return string of post terms classes, e.g. "term-31 term-54 term-28"
	 */
	static function get_the_terms_classes( $post_id = '', $taxonomy = '' ) {
		return self::get_joined_post_terms( $post_id, $taxonomy, 'term_id', 'term-', ' ' );
	}

	/**
	 * Count words in a given string
	 *
	 * @param string $string
	 * @return int Word count
	 */
	static function count_words( $string = '' ) {
		return sizeof( explode( ' ', $string ) );
	}

	/**
	 * Get second level terms
	 *
	 * @param string $taxonomy
	 * @return array of terms
	 */
	static function get_second_level_terms( $taxonomy = array() ) {
		$all_terms = get_terms( $taxonomy, array( 'hide_empty' => 0 ) );

		$terms = array_filter(
			$all_terms,
			function ( $t ) {
				return 0 !== $t->parent && get_term( $t->parent, $taxonomy )->parent === 0;
			}
		);

		return $terms;
	}

	/**
	 * Check if a number is phone number
	 *
	 * @param string $string
	 * @return boolean
	 */
	static function is_phone( $string = array() ) {
		return preg_match( '/^\+?\d+$/', $string ) ? true : false;
	}

	/**
	 * Check if Flexible Content field has specific component
	 *
	 * @param string $field_id Layout name in ACF
	 * @return boolean
	 */
	static function have_row_layout( $field_id = '' ) {
		$flag = false;

		while ( have_rows( 'flexible_content' ) ) {
			the_row();
			if ( get_row_layout() === $field_id ) {
				$flag = true;
			}
		}

		return $flag;
	}

	/**
	 * Load more button
	 *
	 * @param array $args Array of query args
	 * @param array $params Array of params (see defaults)
	 * @return HTML
	 */
	static function render_load_more_btn( $args = array(), $params = array() ) {
		$defaults = array(
			'label'    => __( 'Load More', 'ystheme' ),
			'offset'   => $args['posts_per_page'],
			'load'     => $args['posts_per_page'],
			'append'   => '.posts',
			'template' => false,
		);

		$params = wp_parse_args( $params, $defaults );

		$json_query = htmlspecialchars( json_encode( $args ), ENT_QUOTES, 'UTF-8' );
		?>

		<div class="load-more-wrap">
			<button class="btn btn-load-more btn-load-more-<?php echo $args['post_type']; ?>" data-template="<?php echo $params['template']; ?>" data-append="<?php echo $params['append']; ?>" data-offset="<?php echo $params['offset']; ?>" data-load="<?php echo $params['load']; ?>" data-query="<?php echo $json_query; ?>">
				<span class="btn-text">
					<?php echo $params['label']; ?>
				</span>
			</button>

			<div class="loader-wrap"></div>
		</div>

		<?php
	}



	// @codingStandardsIgnoreStart

	/**
	 * Get embed URL for YouTube, Vimeo and Facebook videos from default watch url
	 * @param  string $url Regular video url
	 * @return string Embed video url
	 */

	static function get_video_embed_url( $url = '' ) {
		$final_url = '';

		// YouTube - Case 1
		if ( strpos( $url, 'youtube.com/' ) !== false ) {
			$video_id = explode( 'v=', $url )[1];

			if ( strpos( $video_id, '&' ) !== false ) {
				$video_id = explode( '&', $video_id )[0];
			}

			$final_url .= 'https://www.youtube.com/embed/' . $video_id;
		}

		// YouTube - Case 2
		elseif ( strpos( $url, 'youtu.be/' ) !== false ) {
			$video_id = explode( 'youtu.be/', $url )[1];

			if ( strpos( $video_id, '&' ) !== false ) {
				$video_id = explode( '&', $video_id )[0];
			}

			$final_url .= 'https://www.youtube.com/embed/' . $video_id;
		}

		// Vimeo
		elseif ( strpos( $url, 'vimeo.com/' ) !== false ) {
			$video_id = explode( 'vimeo.com/', $url )[1];

			if ( strpos( $video_id, '&' ) !== false ) {
				$video_id = explode( '&', $video_id )[0];
			}

			$final_url .= 'https://player.vimeo.com/video/' . $video_id;
		}

		// Facebook
		elseif ( strpos( $url, 'facebook.com/' ) !== false ) {
			$final_url .= 'https://www.facebook.com/plugins/video.php?href=' . rawurlencode( $url ) . '&show_text=1&width=200';
		}

		return $final_url;
	}

	// @codingStandardsIgnoreEnd

	/**
	 * Get attributes
	 * @param  array $styles key\value array of styles
	 * @return string of html attribute
	 */
	static function get_attributes( $atts ) {
		$attributes = '';

		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$attributes .= ' ' . $attr . '="' . $value . '"';
			} elseif ( is_array( $value ) ) {
				$attributes .= ' ' . $attr . '="' . join( ' ', $value ) . '"';
			}
		}

		return $attributes;
	}
	/**
	 * Render edit post link HTML
	 * @return void
	 */
	static function render_edit_post() {
		if ( current_user_can( 'administrator' ) ) :
			?>

			<a href="<?php echo get_edit_post_link(); ?>" class="edit-post" target="_blank">
				<span class="fa fa-pencil" aria-hidden="true"></span>
				<span class="sr-only">
					<?php _e( 'Edit post', 'ystheme' ); ?>
				</span>
			</a>

			<?php
		endif;
	}

	/**
	 * Render block start
	 * @param  string $block Block name
	 * @return void
	 */
	static function render_block_start( $block ) {
		$block_name = str_replace( 'acf/', '', $block['name'] );

		$atts['class'] = array(
			'block',
			'block-' . $block_name,
		);

		if ( isset( $block['className'] ) ) {
			$atts['class'][] = $block['className'];
		}

		$atts['class'] = apply_filters( 'block_class', $atts['class'], $block_name );

		$atts['id'] = isset( $block['anchor'] ) ? $block['anchor'] : null;
		$attributes = self::get_attributes( $atts );

		echo '<div' . $attributes . ' data-id="' . $block['id'] . '">';
	}


	/**
	 * Render block end
	 *
	 * @return void
	 */
	static function render_block_end() {
		?>
		</div>

		<?php
	}

	/**
	 * Print ACF Link
	 *
	 * @param string $field_id
	 * @param string $button_class
	 * @param string $icon_class
	 * @param boolean $icon_before_text
	 * @return HTML of button
	 */
	static function render_link( $field_id, $class = 'entry-link' ) {
		$link = self::get_field( $field_id );

		if ( $link ) {
			self::render_link_start( $field_id, $class );
			echo '<span class="btn-text">' . $link['title'] . '</span>';
			self::render_link_end( $field_id );
		}
	}

	/**
	 * Render link start
	 *
	 * @param string $field_id
	 * @param string $class
	 */
	static function render_link_start( $field_id, $class = 'entry-link' ) {
		$link = self::get_field( $field_id );

		if ( $link ) {
			$target = $link['target'] ? ' target="_blank"' : '';
			$rel    = $link['target'] ? ' rel="noopener"' : '';

			$explode = explode( ':', $link['url'] );
			$action  = str_replace( '//', '', $explode[0] );

			if ( isset( $explode[1] ) ) {
				$data = $explode[1];
			}

			switch ( $action ) {
				case 'js':
					// Usage: //js:myFunction(event)
					echo '<a href="#" rel="nofollow" class="' . $class . '" onclick="' . $data . '">';
					break;

				case 'scrollto':
					// Usage: //scrollto:.site-header
					echo '<a href="#" rel="nofollow" class="btn-scroll-to" data-scrollto="' . $data . '">';
					break;

				case 'fancybox':
						// Usage: //fancybox:<url>
						echo '<a href="' . $link['url'] . '" rel="nofollow" data-fancybox>';
					break;

				default:
					echo '<a href="' . $link['url'] . '" class="' . $class . '"' . $target . $rel . '>';
					break;
			}
		}
	}

	/**
	 * Render link end
	 */
	static function render_link_end( $field_id ) {
		$link = self::get_field( $field_id );

		if ( $link ) {
			echo '</a>';
		}
	}

	/**
	 * Render link title
	 *
	 * @param string $field_id
	 * @param string $before Markup to prepend to the title.
	 * @param string $after Markup to append to the title.
	 */
	static function render_link_title( string $field_id, string $before = '', string $after = '' ) {
		$link = self::get_field( $field_id );

		echo $before . $link['title'] . $after;
	}

	/**
	 * ACF Image
	 *
	 * @param string $field_id Field ID
	 * @param string $class Container class
	 * @param string $size Image size
	 */
	static function render_image( $field_id, $size = 'full', $class = '', $image_id = false ) {

		if ( ! $image_id ) {
			$image    = self::get_field( $field_id );
			$image_id = isset( $image['ID'] ) ? $image['ID'] : $image;
		}

		$credits = self::get_caption( $image_id );

		if ( ! $class ) {
			$class = 'entry-image';
		} else {
			$class = 'entry-image ' . $class;
		}

		if ( ! empty( $image ) || $image_id ) {
			?>

			<figure class="<?php echo $class; ?>">
				<?php echo wp_get_attachment_image( $image_id, $size ); ?>
			</figure>

			<?php
		}
	}


	/**
	 * Render Gallery
	*
	 * @param string $field_id Field ID
	 * @param string $size Image size
	 * @param string $class Container class
	 */
	static function render_gallery( $field_id, $size = '', $class = 'gallery' ) {
		$images = self::get_field( $field_id );
		?>

		<div class="<?php echo $class; ?>">

			<?php foreach ( $images as $image ) : ?>

				<figure class="gallery-item">
					<?php echo wp_get_attachment_image( $image, $size ); ?>
				</figure>

			<?php endforeach; ?>

		</div>

		<?php
	}

	/**
	 * Inline Background in HTML element
	 *
	 * @param $field
	 * @param string $size
	 * @return string
	 */
	static function render_inline_bg( $field_id = '', $size = 'full' ) {
		$image    = self::get_field( $field_id );
		$image_id = isset( $image['ID'] ) ? $image['ID'] : $image;
		$bg_url   = wp_get_attachment_image_url( $image_id, $size );

		echo ' style="background-image:url(' . $bg_url . ' )"';
	}

	/**
	 * Format text (wrap in span when using *text*)
	 *
	 * @param string $text_or_field_id
	 * @param string $class
	 * @return void
	 */
	static function render_formatted_text( $text_or_field_id, $class = 'styled' ) {
		if ( self::get_field( $text_or_field_id ) ) {
			$text = self::get_field( $text_or_field_id );
		} else {
			$text = $text_or_field_id;
		}

		$pattern     = '/(.*)\*(.*)\*(.*)/';
		$replacement = '$1<span class="' . $class . '">$2</span>$3';

		echo preg_replace( $pattern, $replacement, $text );
	}

	/**
	 * Render social networks links
	 *
	 * @param string $networks
	 * @return void
	 */
	static function render_socials( $networks = array() ) {

		if ( have_rows( 'social_networks', 'option' ) ) :
			?>

			<div class="socials">

				<?php
				while ( have_rows( 'social_networks', 'option' ) ) :
					the_row();
					$url     = get_sub_field( 'url' );
					$network = get_sub_field( 'network' );

					if ( ! $networks ) :
						?>

						<a href="<?php echo $url; ?>" class="<?php echo $network; ?>" target="_blank" rel="noopener" aria-label="<?php the_sub_field( 'title' ); ?>">
							<span class="fa fa-<?php echo $network; ?>" aria-hidden="true"></span>
						</a>

					<?php elseif ( $networks && is_array( $networks ) && in_array( $network, (array) $networks, true ) ) : ?>

						<a href="<?php echo $url; ?>" class="<?php echo $network; ?>" target="_blank" rel="noopener" aria-label="<?php the_sub_field( 'title' ); ?>">
							<span class="fa fa-<?php echo $network; ?>" aria-hidden="true"></span>
						</a>

						<?php
					endif;
				endwhile;
				?>

			</div>

			<?php
		endif;
	}

	/**
	 * Render share buttons
	 *
	 * @param string $network - email, facebook, twitter, linkedin, pinterest, whatsapp
	 */
	static function render_share_button( $network = '' ) {
		$post_id    = get_the_ID();
		$permalink  = get_permalink( $post_id );
		$post_title = get_the_title();

		switch ( $network ) {
			case 'email':
				$site_name = get_bloginfo( 'name' );

				$href    = 'mailto:?subject=' . sprintf( __( 'Link to %s ', 'ystheme' ), $site_name ) . '&body=' . $post_title . ' - ' . $permalink;
				$icon    = 'fa fa-envelope';
				$sr_text = __( 'Share by Email', 'ystheme' );

				break;

			case 'facebook':
				$href    = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
				$icon    = 'fa fa-facebook';
				$sr_text = __( 'Share on Facebook', 'ystheme' );

				break;

			case 'twitter':
				$href    = 'https://twitter.com/intent/tweet?url=' . $permalink;
				$icon    = 'fa fa-twitter';
				$sr_text = __( 'Share on Twitter', 'ystheme' );

				break;

			case 'linkedin':
				$href    = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $permalink;
				$icon    = 'fa fa-linkedin';
				$sr_text = __( 'Share on LinkedIn', 'ystheme' );

				break;

			case 'pinterest':
				$href    = 'https://pinterest.com/pin/create/button/?url=' . $permalink;
				$icon    = 'fa fa-pinterest-p';
				$sr_text = __( 'Share on Pinterest', 'ystheme' );

				break;

			case 'whatsapp':
				$href    = 'https://api.whatsapp.com/send?text=' . $permalink;
				$icon    = 'fa fa-whatsapp';
				$sr_text = __( 'Share on WhatsApp', 'ystheme' );

				break;
		}

		?>

		<a class="btn-share btn-share-<?php echo $network; ?>" href="<?php echo $href; ?>" target="_blank">
			<span class="<?php echo $icon; ?>" aria-hidden="true"></span>
			<span class="sr-only">
				<?php echo $sr_text; ?>
			</span>
		</a>

		<?php
	}

	static function array_walk_recursive( $array, $callback ) {
		if ( ! is_array( $array ) ) {
			return;
		}

		foreach ( $array as $key => $value ) {
			$callback( $value, $key );
			self::array_walk_recursive( $value, $callback );
		}
	}

	static function get_caption( $attachment_id ) {

		$caption = wp_get_attachment_caption( $attachment_id );

		if ( $caption ) {
			return __( 'צילום:', 'ystheme' ) . ' ' . $caption;
		}
	}
	static function get_attachment_image_responsive( $field_id, $field_id_mobile = false, $size = 'full', $icon = false, $attr = '' ) {
		$attachment_id        = self::get_field( $field_id );
		$attachment_id_mobile = self::get_field( $field_id_mobile );
		$html                 = '';
		$image                = wp_get_attachment_image_src( $attachment_id, $size, $icon );
		if ( $image ) {
			list( $src, $width, $height ) = $image;
			$attachment                   = get_post( $attachment_id );
			$hwstring                     = image_hwstring( $width, $height );
			$size_class                   = $size;
			if ( is_array( $size_class ) ) {
				$size_class = implode( 'x', $size_class );
			}
			$default_attr = array(
				'src'   => $src,
				'class' => "attachment-$size_class size-$size_class",
				'alt'   => trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
			);
			if ( wp_lazy_loading_enabled( 'img', 'wp_get_attachment_image' ) ) {
				$default_attr['loading'] = 'lazy';
			}
			$attr = wp_parse_args( $attr, $default_attr );
			if ( array_key_exists( 'loading', $attr ) && ! $attr['loading'] ) {
				unset( $attr['loading'] );
			}
			if ( empty( $attr['srcset'] ) ) {
				$image_meta = wp_get_attachment_metadata( $attachment_id );
				if ( is_array( $image_meta ) ) {
					$size_array = array( absint( $width ), absint( $height ) );
					$srcset     = wp_calculate_image_srcset( $size_array, $src, $image_meta, $attachment_id );
					$sizes      = wp_calculate_image_sizes( $size_array, $src, $image_meta, $attachment_id );
					if ( $srcset && ( $sizes || ! empty( $attr['sizes'] ) ) ) {
						$attr['srcset'] = $srcset;
						if ( empty( $attr['sizes'] ) ) {
							$attr['sizes'] = $sizes;
						}
					}
				}
			}
			$attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, $attachment, $size );
			$attr = array_map( 'esc_attr', $attr );
			$html = rtrim( "<img $hwstring" );
			foreach ( $attr as $name => $value ) {
				$html .= " $name=" . '"' . $value . '"';
			}
			$html .= ' />';
			if ( $attachment_id_mobile ) {
				$mobile_srcset = wp_get_attachment_image_srcset( $attachment_id_mobile );
				$mobile_sizes  = wp_get_attachment_image_sizes( $attachment_id_mobile );
				$credits       = self::get_caption( $attachment_id );
				$html          = '<picture><source media="(max-width:640px)" sizes="' . $mobile_sizes . '" srcset="' . $mobile_srcset . '">' . $html . '</picture>';
			}
		}
		return apply_filters( 'wp_get_attachment_image', $html, $attachment_id, $size, $icon, $attr );
	}

}
