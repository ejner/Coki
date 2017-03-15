<?php
/**
 * Plantilla de etiquetas
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content tags clear">
		<!-- section -->
		<section class="small-post">
			
		<?php if ( have_posts() ) : ?>

			<?php coki_icon( 'tags unique', '#00796B' ); ?>
			<h1 class="title-page"><?php single_tag_title(); ?></h1>
			<?php echo tag_description(); ?>

		<?php
			while ( have_posts() ) : the_post();

				// Carga plantilla del loop.
				get_template_part( 'loop' );

			endwhile;
		?>
		<?php else : ?>
			
			<!-- article -->
			<article>
				<?php coki_icon( 'tags' ); ?>
				<h1 class="post-title"><?php printf( esc_html__( 'No hay resultados para "%s"', 'coki' ), get_search_query() ); ?></span></h1>
				<p><?php esc_html_e( 'Prueba buscando con otras palabras. Si no funciona, prueba revisando que la palabra exista realmente. De cualquier forma, esto es indignante.', 'coki' ); ?></p>
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
