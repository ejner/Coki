<?php
/**
 * Plantilla de artículos individuales
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<!-- .content -->
	<main class="content single">
		<!-- .single-post -->
		<section class="single-post">

		<?php
		if ( have_posts() ) :

			get_template_part( 'loop' ); // Carga plantilla del loop.
			comments_template(); // Carga comentarios.

		endif; ?>

		</section>
		<!-- /.single-post -->
	</main>
	<!-- /.content -->

<?php get_footer(); ?>
