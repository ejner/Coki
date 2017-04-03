<?php
/**
 * Plantilla de artículos
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content single clear">
		<!-- section -->
		<section class="clear">

		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			// Carga plantilla del loop.
			get_template_part( 'loop' );

			// Carga comentarios.
			comments_template();

		endwhile;
		endif; ?>

		</section>
		<!-- /section -->
		
	</main>

<?php get_footer(); ?>
