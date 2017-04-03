<?php
/**
 * Plantilla de búsqueda y resultados
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<!-- .content -->
	<main class="content posts">

	<?php if ( have_posts() ) : ?>
		<!-- .results -->
		<section class="results">

			<?php coki_icon( 'results unique' ); ?>

			<!-- .title-page -->
			<h1 class="title-page"><?php
				printf( /* translators: %s término de búsqueda */
					esc_html__( 'Resultados para "%s"', 'coki' ),
					get_search_query()
				); ?></h1>
			<!-- /.title-page -->
		
		<?php
			while ( have_posts() ) : the_post();

				// Carga plantilla del loop.
				get_template_part( 'loop' );

			endwhile; ?>
		</section>
		<!-- /.results -->

		<?php else : ?>
			
			<!-- .none -->
			<section class="none">

				<!-- .type -->
				<?php coki_icon( 'results' ); ?>
				<!-- /.type -->

				<!-- .post-title -->
				<h1 class="post-title"><?php
					printf( /* translators: %s término de búsqueda */
						esc_html__( 'No hay resultados para "%s"', 'coki' ),
						get_search_query()
					); ?></span></h1>
				<!-- /.post-title -->

				<p><?php esc_html_e( 'Prueba buscando con otras palabras. Si no funciona, prueba revisando que la palabra exista realmente. De cualquier forma, esto es indignante.', 'coki' ); ?></p>

			</section>
			<!-- /.none -->

		<?php endif; ?>
		
		<!-- .pagination -->
		<div class="pagination">
			<?php coki_pagination(); ?>
		</div>
		<!-- /.pagination -->
		
	</main>
	<!-- /.content -->

<?php get_footer(); ?>
