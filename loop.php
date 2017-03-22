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
			<?php
				if ( is_single() ) {
					coki_post_meta( array( 'edit', 'author', 'category', 'tags' ) );
				} else {
					coki_post_meta( array( 'edit', 'author', 'date' ) );
				} ?>
				</div>
				<!-- /.details -->
					
			</article>
