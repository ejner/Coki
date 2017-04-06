<?php
/**
 * Plantilla para archivos (autor, categoría e etiquetas)
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<!-- .content -->
	<main class="content posts">
		<!-- .archive -->
		<section class="archive">

		<?php if ( have_posts() ) : ?>

			<?php coki_icon( 'archive unique' ); ?>
			<?php the_archive_title( '<h1 class="title-page">', '</h1>' ); ?>
			<?php the_archive_description( '<p>', '</p>' ); ?>

		<?php get_template_part( 'loop' ); ?>

		</section>
		<!-- /.archive -->
		
		<!-- .pagination -->
		<div class="pagination">
			<?php coki_pagination(); ?>
		</div>
		<!-- /.pagination -->

	</main>
	<!-- /.content -->

<?php get_footer(); ?>
