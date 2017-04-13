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

			<!-- .header -->
			<header class="header flex big">

					<!-- .logo -->
					<div class="logo flex small">
						
							<?php
							if ( has_custom_logo() ) {
								the_custom_logo();
							} else {
							?>
								<a href="<?php echo esc_url( home_url() ); ?>" rel="home" itemprop="url">
									<?php echo get_avatar( get_option( 'admin_email' ), 120 ); ?>
								</a>
							<?php
							}

							if ( is_home() ) {
								echo '<h1 class="logo-name">' . esc_html( get_bloginfo( 'name' ) ) . '</h1>';
							} else {
								echo '<h2 class="logo-name">' . esc_html( get_bloginfo( 'name' ) ) . '</h2>';
							} ?>
						</a>
					</div>
					<!-- /.logo -->

					<!-- .search -->
					<div class="search flex medium">
						<?php get_search_form(); ?>
					</div>
					<!-- /.search -->

					<!-- .nav -->
					<nav class="nav">
						<?php coki_menu(); ?>
					</nav>
					<!-- /.nav -->

			</header>
			<!-- /.header -->
