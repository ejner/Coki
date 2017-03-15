<?php
/**
 * Plantilla de autores
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content author clear">
		<!-- section -->
		<section class="small-post">

		<?php if ( have_posts() ) : ?>

			<?php coki_icon( 'author unique', '#CDDC39' ); ?>
			<h1 class="title-page"><?php printf( esc_html__( 'Artículos de %s', 'coki' ), get_the_author() ); ?></h2>

		<?php
			while ( have_posts() ) : the_post();

				// Carga plantilla del loop.
				get_template_part( 'loop' );

			endwhile;
		?>
		<?php else : ?>

			<!-- article -->
			<article>
				<?php coki_icon( 'author' ); ?>
				<h2><span class="post-title"><?php esc_html_e( 'Es muy tímido para publicar', 'coki' ); ?></span></h2>
				<p><?php esc_html_e( 'Tal vez le da vergüenza publicar, pero es muy probable que cuando lo haga, escriba cosas sorprendentes.', 'coki' ); ?></p>
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
