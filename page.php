<?php
/**
 * Plantilla de páginas
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content page clear">
		<!-- section -->
		<section>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- article -->
			<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() ) { ?>
				<!-- post thumbnail -->
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'single' ); ?>
				</a>
				<!-- /post thumbnail -->
			<?php } ?>

				<!-- .type -->
				<?php coki_icon( 'page' ); ?>
				<!-- /.type -->

				<?php edit_post_link( '<i class="type type-info coki-edit"></i>' ); ?>

				<!-- .title-post -->
				<?php the_title( '<h1 class="title-post">', '</h1>' ); ?>
				<!-- /.title-post -->

				<!-- .content-post -->
				<div class="content-post">
					<?php the_content(); ?>
				</div>
				<!-- /.content-post -->

				<!-- .details -->
				<div class="details">
					<?php coki_post_meta( array( 'date' ) ); ?>
				</div>
				<!-- /.details -->

			</article>
			<!-- /article -->

		<?php endwhile; ?>
		<?php else : ?>

			<!-- article -->
			<article>
				<h2><?php esc_html_e( 'No hay artículos para mostrar.', 'coki' ); ?></h2>
			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
