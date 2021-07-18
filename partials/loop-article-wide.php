<?php
/**
 * Wide article include
 *
 * @package WordPress
 */

global $is_search;
$thumbnail_size = 'large';
if ( isset( $is_search ) && $is_search ) {
    $thumbnail_size = 'search-result-item';
}
?>

<div <?php post_class( 'entry-article-wide' ); ?> id="article-<?php echo esc_html( $post->ID ); ?>">

    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php H::the_post_thumbnail( $thumbnail_size ); ?>
        </a>
    </div>

    <div class="entry-content">
        <a href="<?php the_permalink(); ?>">
            <h4 class="entry-title">
                <?php the_title(); ?>
            </h4>
        </a>

        <div class="entry-meta">
            וזמג ףסא / 30.01.21
        </div>

        <p class="entry-excerpt">
            <?php if ( ! $is_search ) : ?>
                <?php H::the_excerpt( 15 ); ?>
            <?php else : ?>
                <?php
                $exc     = get_the_excerpt();
                $keys    = implode( '|', explode( ' ', get_search_query() ) );
                $excerpt = preg_replace( '/(' . $keys . ')/iu', '<span class="search-highlight">\0</span>', $exc );
                echo '<p>' . $excerpt . '</p>';
                ?>
            <?php endif; ?>
        </p>

        <a href="<?php the_permalink(); ?>" class="entry-link icon-link">
            <span class="icon meditech-chevron-left purpleArrowIcon"></span>
            <span class="text">
						<?php _e( 'קראו עוד', 'ystheme' ); ?>
					</span>
        </a>
    </div>
</div>
