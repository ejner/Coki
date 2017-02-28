<?php
/**
 * Plantilla principal
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content index clear">
		<!-- section -->
		<section>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- .type -->
				<?php coki_icon(); ?>
				<!-- /.type -->

			<?php if ( has_post_format( 'link' ) ) : ?>
				<!-- post title -->
				<h2><a href="<?php coki_url_link(); ?>" class="title-post" target="_blank" title="Visitar '<?php the_title(); ?>'"><?php the_title(); ?></a></h2>
				<!-- /post title -->

				<!-- .content-post -->
				<div class="content-post">
					<?php the_excerpt(); ?>
				</div>
				<!-- /.content-post -->
	
			<?php else : ?>

				<!-- post title -->
				<h2><a href="<?php the_permalink(); ?>" class="title-post" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<!-- /post title -->

				<!-- .content-post -->
				<div class="content-post">
					<?php the_content(); ?>
				</div>
				<!-- /.content-post -->
	
			<?php endif; ?>

				<?php wp_link_pages(); ?>
	
				<!-- .details -->
				<div class="details">
					<ul class="details-list">
						<li><?php coki_time_published(); ?></li>
						<li><i class="coki-permalink"></i> <a href="<?php the_permalink(); ?>" title="<?php sprintf( __( 'Enlace permanente a \'%s\'', 'coki' ), get_the_title() ); ?>">Enlace permanente</a></li>
						<li><i class="coki-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></li>
						<?php edit_post_link( sprintf( __( 'Editar <em>"%s"</em>', 'coki' ), get_the_title() ), '<li><i class=" coki-edit"></i> ', '</li>' ); ?>
					</ul>
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

		<!-- .pagination -->
		<div class="pagination">
			<?php coki_pagination(); ?>
		</div>
		<!-- /.pagination -->
	
	</main>

<?php get_footer(); ?>
