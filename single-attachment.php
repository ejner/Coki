<?php
/**
 * Plantilla de artículos
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<main class="content single clear">
		<!-- section -->
		<section class="clear">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
			<?php if ( has_post_thumbnail() ) { ?>
				<!-- .post thumbnail -->
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'single' ); ?>
				</a>
				<!-- /post thumbnail -->
			<?php } ?>
					

				<!-- .type -->
				<?php coki_icon( 'attachment' ); ?>
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
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="title-post">', '</h1>' );
				} else {
					the_title( '<h2 class="title-post"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			?>
				<!-- /post title -->

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

				<!-- .content-post -->
				<div class="content-post">
					<?php the_content(); ?>
				</div>
				<!-- /.content-post -->
					
			<?php endif; ?>
					
				<?php wp_link_pages(); ?>
				
				 <!-- .details -->
				<div class="details">
					<ul class="meta-details">
						<li><i class="coki-author"></i> <?php the_author_posts_link(); ?></li>
						<li><i class="coki-category"></i> <?php the_category( ', ' ); ?></li>
						<li><?php the_tags( '<i class="coki-tags"></i> ' ); ?></li>
					</ul>
				</details>
				<!-- /.details -->
					
			</article>
			<!-- /article -->

			<?php comments_template(); ?> 

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
