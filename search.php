<?php
/**
 * Search results page template
 *
 * @package WordPress
 */

get_header();
global $wp_query, $is_search;
$total        = $wp_query->found_posts;
$search_query = get_search_query();
$is_search    = true;
?>

    <div class="container container-l">

    <div class=" searchsection">
        <div class="section-inner">
            <?php yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ); ?>
        </div>
    </div>


	<div class="custom-row row-results">

		<div class="col12">
			<div class="search-header-wrap">
				<h2 class="search-title">
					<?php
					if ( 0 !== $total ) {
						printf( __( 'למונח <span>"%2$s"</span> נמצאו  %1$s תוצאות', 'ystheme' ), $total, $search_query );
					} else {
						printf( esc_html__( 'No results found for the term %1$s.', 'ystheme' ), $search_query );
					}
					?>
				</h2>

				<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
					<input class="search-input" type="search" name="s" placeholder="<?php _e( 'מה ברצונכם לחפש...', 'ystheme' ); ?>" value="<?php echo $search_query; ?>">
					<button class="search-submit" type="submit" role="button" aria-label="<?php _e( 'Search', 'ystheme' ); ?>" title="<?php _e( 'Search', 'ystheme' ); ?>">
						<span class="icon meditech-search" aria-hidden="true"></span>
					</button>
				</form>
			</div>

		</div>
		<div class="col12">
			<div class="custom-row row-posts search-wrap">

				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'partials/loop-article', 'wide' );
					}
				} 
				// else {
				// 	esc_html_e( 'Sorry, no posts found.', 'ystheme' );
				// }
				?>
			</div>

			<?php get_template_part( 'pagination' ); ?>
		</div>
	</div>
</div>

<?php
get_footer();
