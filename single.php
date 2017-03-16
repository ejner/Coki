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

		endwhile;
		?>
		<?php else : ?>

			<!-- article -->
			<article>
				<h2><?php esc_html_e( 'No hay artículos para mostrar.', 'coki' ); ?></h2>
			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
		
	</main>

<?php get_footer(); ?>
