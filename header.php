<?php
/**
 * Cabecera del tema
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<!-- .wrap -->
		<div class="wrap">

			<!-- header -->
			<header class="header clear">

					<!-- .logo -->
					<div class="logo floatleft">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<?php echo get_avatar( get_option( 'admin_email' ), 120 ); ?>
							<?php
								if ( is_home() ) {
									echo '<h1 class="blog-name">' . esc_url( get_bloginfo( 'name' ) ) . '</h1>';
								} else {
									echo '<h2 class="blog-name">' . esc_url( get_bloginfo( 'name' ) ) . '</h2>';
								} ?>
						</a>
					</div>
					<!-- /.logo -->

					<!-- nav -->
					<nav class="nav floatright">
						<?php coki_menu(); ?>
					</nav>
					<!-- /nav -->

			</header>
			<!-- /header -->
