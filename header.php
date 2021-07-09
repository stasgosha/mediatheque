<!doctype html>
<html <?php language_attributes(); ?> class="no-js" xmlns:esro=http://toptix.com>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<title><?php wp_title( '' ); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php
		wp_body_open();
		get_template_part( 'partials/global/side-menu' );
		?>

		<div id="site-wrap" class="site-wrap">

			<header id="masthead" class="site-header" role="banner">
				<?php
				get_template_part( 'partials/header/header', 'desktop' );
				get_template_part( 'searchform' );
				get_template_part( 'partials/header/header-mobile', 'menu' );
				?>

			</header>

			<?php
			if ( ! is_front_page() && ! is_404() ) {
				get_template_part( 'partials/header/header-image' );
			}
			?>

			<div id="content" class="site-content">
