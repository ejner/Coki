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
		<section id="scroll" class="home">

		<?php get_template_part( 'loop' ); ?>

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
