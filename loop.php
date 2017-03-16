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
						<li><i class="coki-permalink"></i> <a href="<?php the_permalink(); ?>" title="<?php sprintf( __( 'Enlace permanente a \'%s\'', 'coki' ), get_the_title() ); ?>">Enlace permanente</a></li>
					<?php if ( comments_open() ) { ?>
						<li><i class="coki-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></li>
					<?php } ?>
						<?php edit_post_link( sprintf( __( 'Editar <em>"%s"</em>', 'coki' ), get_the_title() ), '<li><i class=" coki-edit"></i> ', '</li>' ); ?>
					</ul>
				</div>
				<!-- /.details -->
					
			</article>
