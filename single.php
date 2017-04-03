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
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			// Carga plantilla del loop.
			get_template_part( 'loop' );

			// Carga comentarios.
			comments_template();

		endwhile;
		endif; ?>

		</section>
		<!-- /.single-post -->
	</main>
	<!-- /.content -->

<?php get_footer(); ?>
