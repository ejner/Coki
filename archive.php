<?php
/**
 * Plantilla de archivo
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content archive clear">
		<!-- section -->
		<section class="small-post">

		<?php if ( have_posts() ) : ?>

			<?php coki_icon( 'category unique' ); ?>
			<?php the_archive_title( '<h1 class="title-page">', '</h1>' ); ?>
			<?php the_archive_description( '<p>', '</p>' ); ?>

		<?php
			while ( have_posts() ) : the_post();

				// Carga plantilla del loop.
				get_template_part( 'loop' );

			endwhile;
		?>
		<?php else : ?>

			<!-- article -->
			<article>
				<?php coki_icon(); ?>
				<h2 class="title-page"><?php esc_html_e( 'Sin resultados', 'coki' ); ?></h2>
				<p><?php esc_html_e( 'No se han encontrado resultados. Esto es muy triste y decepcionante.', 'coki' ); ?></p>
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
