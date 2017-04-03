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

				<?php edit_post_link( '<i class="type type-info coki-edit"></i>' ); ?>

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

				<!-- .meta -->
				<nav class="meta">
					<ul class="meta-details">
				<?php if ( is_single() ) { ?>
						<?php coki_comments_count(); ?>
						<li class="meta-item"><i class="coki-category"></i> <?php the_category( ', ' ); ?></li>
						<li class="meta-item"><?php the_tags( '<i class="coki-tags"></i> ' ); ?></li>
				<?php } else { ?>
						<li class="meta-item"><?php the_author_posts_link(); ?></li>
						<li class="meta-item"><?php the_date(); ?></li>
						<?php coki_comments_count(); ?>
				<?php } ?>
					</ul>
				</nav>
				<!-- /.meta -->
					
			</article>
