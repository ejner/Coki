<?php
/**
 * Plantilla principal
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<!-- .content -->
	<main class="content posts">
		<!-- .home -->
		<section class="home">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

				// Carga plantilla del loop.
				get_template_part( 'loop' );

			endwhile;
			endif; ?>

		</section>
		<!-- /.home -->

		<!-- .pagination -->
		<div class="pagination">
			<?php coki_pagination(); ?>
		</div>
		<!-- /.pagination -->
	
	</main>
	<!-- /.content -->

<?php get_footer(); ?>
