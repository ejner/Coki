<?php get_header(); ?>

	<main>
		<!-- section -->
		<section class="clear small-post">
			
		<?php if ( have_posts() ): ?>
		
			<h2><span class="title-page"><i class="coki-author"></i> <?php printf( __( 'Artículos publicados por %s', 'coki' ), get_the_author() ); ?></span></h2>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
			<?php if( has_post_thumbnail()) { ?>
				<!-- .post thumbnail -->
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'single' ); ?>
				</a>
				<!-- /post thumbnail -->
			<?php } ?>
					

				<!-- .type -->
				<?php coki_icon(); ?>
				<!-- /.type -->
					
			<?php if( has_post_format( 'link' ) ) : ?>
				<!-- post title -->
				<h2><a href="<?php echo wp_strip_all_tags( get_the_content() ); ?>" class="title-post" target="_blank" title="Visitar '<?php the_title(); ?>'"><?php the_title(); ?></a></h2>
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
                        <li><i class="coki-permalink"></i> <a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Enlace permanente a \'%s\'', 'coki' ), get_the_title() ); ?>">Enlace permanente</a></li>
                        <li><i class="coki-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></li>
                        <?php edit_post_link( sprintf( __( 'Editar <em>"%s"</em>', 'coki' ), get_the_title() ), '<li><i class=" coki-edit"></i> ', '</li>' ); ?>
                    </ul>
                </div>
				<!-- /.details -->
					
			</article>
			<!-- /article -->
		<?php endwhile; ?>
		<?php else: ?>

			<!-- article -->
			<article>
				<?php coki_icon( 'author' ); ?>
				<h2><span class="post-title"><?php _e( 'Es muy tímido para publicar', 'coki' ); ?></span></h2>
				<p><?php _e( 'Tal vez le da vergüenza publicar, pero es muy probable que cuando lo haga, escriba cosas sorprendentes.' ); ?></p>
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
