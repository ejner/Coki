<?php
/**
 * Plantilla de archivo
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content posts">
		<!-- section -->
		<section class="archive">

		<?php if ( have_posts() ) : ?>

			<?php coki_icon( 'archive unique' ); ?>
			<?php the_archive_title( '<h1 class="title-page">', '</h1>' ); ?>
			<?php the_archive_description( '<p>', '</p>' ); ?>

		<?php
		while ( have_posts() ) : the_post();

			// Carga plantilla del loop.
			get_template_part( 'loop' );

		endwhile;
		endif; ?>

		</section>
		<!-- /section -->
		
		<!-- .pagination -->
		<div class="pagination">
			<?php coki_pagination(); ?>
		</div>
		<!-- /.pagination -->

	</main>

<?php get_footer(); ?>
