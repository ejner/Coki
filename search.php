<?php
/**
 * Plantilla de búsqueda
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content search clear">
		<!-- section -->
		<section class="small-post">
			
		<?php if ( have_posts() ) : ?>

			<?php coki_icon( 'results unique' ); ?>
			<h1 class="title-page"><?php printf( esc_html__( 'Resultados para "%s"', 'coki' ), get_search_query() ); ?></h1>
		
		<?php while ( have_posts() ) : the_post(); ?>
	
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<!-- .type -->
				<?php coki_icon(); ?>
				<!-- /.type -->
					
			<?php if ( has_post_format( 'link' ) ) : ?>
				<!-- post title -->
				<h2><a href="<?php coki_url_link(); ?>" class="title-post" target="_blank" title="Visitar '<?php the_title(); ?>'"><?php the_title(); ?></a></h2>
				<!-- /post title -->
					
			<?php else : ?>
					
				<!-- post title -->
				<h2><a href="<?php the_permalink(); ?>" class="title-post" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<!-- /post title -->
					
			<?php endif; ?>
			
				<!-- .content-post -->
				<div class="content-post">
					<?php the_excerpt(); ?>
				</div>
				<!-- /.content-post -->
					
				<!-- .details -->
				<div class="details">
					<ul class="details-list">
						<li><?php coki_time_published(); ?></li>
						<li><i class="coki-permalink"></i> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_html__( 'Enlace permanente a \'%s\'', 'coki' ), get_the_title() ); ?>"><?php esc_html_e( 'Enlace permanente', 'coki' ); ?></a></li>
					<?php if ( comments_open() ) { ?>
						<li><i class="coki-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></li>
					<?php } ?>
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
				<?php coki_icon( 'results' ); ?>
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
