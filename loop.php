<?php
/**
 * Plantilla del loop
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() && is_single() ) { ?>
				<!-- .post thumbnail -->
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'single' ); ?>
				</a>
				<!-- /post thumbnail -->
			<?php } ?>

				<!-- .type -->
				<?php coki_icon(); ?>
				<!-- /.type -->
					
			<?php if ( has_post_format( 'link' ) ) : ?>

				<!-- post title -->
			<?php if ( is_single() ) { ?>
				<h1><a href="<?php coki_url_link(); ?>" class="title-post" target="_blank" title="Visitar '<?php the_title(); ?>'"><?php the_title(); ?></a></h2>
			<?php } else { ?>
				<h2><a href="<?php coki_url_link(); ?>" class="title-post" target="_blank" title="Visitar '<?php the_title(); ?>'"><?php the_title(); ?></a></h2>
			<?php } ?>
				<!-- /post title -->
					
			<?php else : ?>
					
				<!-- post title -->
			<?php if ( is_single() ) { ?>
				<?php the_title( '<h1 class="title-post">', '</h1>' ); ?>
			<?php } else { ?>
				<h2><a href="<?php the_permalink(); ?>" class="title-post" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php } ?>
				<!-- /post title -->
					
			<?php endif; ?>

			<?php if ( is_single() ) { ?>
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
			<?php } ?>
			
				<!-- .content-post -->
				<div class="content-post">
				<?php
				if ( is_single() || is_home() ) {
					the_content();
				} else {
					the_excerpt();
				} ?>
				<?php wp_link_pages(); ?>
				</div>
				<!-- /.content-post -->

				<!-- .details -->
				<div class="details">
			<?php if ( is_single() ) { ?>
					<ul class="meta-list">
						<li><i class="coki-author"></i> <?php the_author_posts_link(); ?></li>
						<li><i class="coki-category"></i> <?php the_category( ', ' ); ?></li>
						<li><?php the_tags( '<i class="coki-tags"></i> ' ); ?></li>
			<?php } else { ?>
					<ul class="details-list">
						<li><?php coki_time_published(); ?></li>
						<li><i class="coki-permalink"></i> <a href="<?php the_permalink(); ?>" title="<?php sprintf( __( 'Enlace permanente a \'%s\'', 'coki' ), get_the_title() ); ?>">Enlace permanente</a></li>
					<?php if ( comments_open() ) { ?>
						<li><i class="coki-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></li>
					<?php } ?>
						<?php edit_post_link( sprintf( __( 'Editar <em>"%s"</em>', 'coki' ), get_the_title() ), '<li><i class=" coki-edit"></i> ', '</li>' ); ?>
			<?php } ?>
					</ul>
				</div>
				<!-- /.details -->
					
			</article>
