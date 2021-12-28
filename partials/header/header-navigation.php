<?php
/**
 * Header navigation
 *
 * @package WordPress
 */

$toptix_basket_url       = get_field( 'toptix_basket_url', 'option' );
$toptix_user_account_url = get_field( 'toptix_user_account_url', 'option' );
?>
<div class="header-nav-wrap">
	<ul>
		<!-- <li class="buy">
			<?php echo render_btn( 'לרכישת כרטיסים', 'buy-now-btn' ); ?>
		</li> -->
		<?php if ( $toptix_user_account_url ) : ?>
			<li class="user">
				<a title="<?php esc_html_e( 'אזור אישי', 'ystheme' ); ?>" href="<?php echo esc_url( $toptix_user_account_url ); ?>" class="user-account-menu-btn">
					<svg class="link-icon">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons-sprite.svg#user"></use>
					</svg>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( $toptix_basket_url ) : ?>
			<li>
				<a href="<?php echo esc_url( $toptix_basket_url ); ?>" title="<?php esc_html_e( 'עגלת קניות', 'ystheme' ); ?>" class="cart-menu-btn">
					<svg class="link-icon">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons-sprite.svg#cart"></use>
					</svg>
				</a>
			</li>
		<?php endif; ?>

		<li>
			<a title="<?php esc_html_e( 'חיפוש', 'ystheme' ); ?>" class="search-btn">
				<svg class="link-icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons-sprite.svg#search"></use>
				</svg>
			</a>
		</li>

		<li>
			<a class="dark-mode-btn" title="<?php esc_html_e( 'Dark Mode', 'ystheme' ); ?>">
				<svg class="link-icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons-sprite.svg#brightness"></use>
				</svg>
			</a>
		</li>
	</ul>
</div>
