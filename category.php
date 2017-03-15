<?php
/**
 * Plantilla de categorías
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content category clear">
		<!-- section -->
		<section class="small-post">
			
		<?php if ( have_posts() ) : ?>

			<?php coki_icon( 'category unique', '#0097A7' ); ?>
			<h1 class="title-page"><?php single_cat_title(); ?></h1>
			<?php echo category_description(); ?>

		<?php
			while ( have_posts() ) : the_post();

				// Carga plantilla del loop.
				get_template_part( 'loop' );

			endwhile;
		?>
		<?php else : ?>
			
			<!-- article -->
			<article>
				<?php coki_icon( 'category' ); ?>
				<h1 class="post-title"><?php esc_html_e( 'No hay qué mostrar', 'coki' ); ?></span></h1>
				<p><?php esc_html_e( 'No se han encontrado resultados para esta categoría. Tal vez no hay artículos publicados en ella.', 'coki' ); ?></p>
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
