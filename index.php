<?php
/**
 * Plantilla principal
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content index clear">
		<!-- section -->
		<section>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

				// Carga plantilla del loop.
				get_template_part( 'loop' );

			endwhile;
		?>
		<?php else : ?>

			<!-- article -->
			<article>
				<?php coki_icon( 'results' ); ?>
				<h1><?php esc_html_e( 'No hay artículos para mostrar.', 'coki' ); ?></h1>
				<p><?php esc_html_e( 'Tal vez aún no ha publicado artículos, pero es un hecho que no hay qué mostrar en este momento.' ); ?></p>
			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->

		<!-- .pagination -->
		<div class="pagination">
			<?php coki_pagination(); ?>
		</div>
		<!-- /.pagination -->
	
	</main>

<?php get_footer(); ?>
