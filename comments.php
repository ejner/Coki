<?php
/**
 * Plantilla de comentarios
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

/* Oculta comentarios si el post está protegido */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) : ?>
		<!-- .comments-title -->
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					/* translators: %s numero de comentarios */
					esc_html( _nx( '%s comentario', '%s comentarios', get_comments_number(), 'título comentarios', 'coki' ) ),
					number_format_i18n( get_comments_number() )
				);
			?>
		</h2>
		<!-- /.comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<!-- #comment-nav-above -->
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Ver más comentarios', 'coki' ); ?></h2>

			<!-- .nav-links -->
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Anteriores', 'coki' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Recientes', 'coki' ) ); ?></div>
			</div>
			<!-- /.nav-links -->

		</nav>
		<!-- /#comment-nav-above -->
		<?php endif; ?>

		<!-- /.comment-list -->
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style' => 'ol',
					'callback' => 'coki_comments',
					'avatar_size' => 70,
					'short_ping' => true,
				) );
			?>
		</ol>
		<!-- /.comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<!-- #comment-nav-above -->
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Ver más comentarios', 'coki' ); ?></h2>

			<!-- .nav-links -->
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Anteriores', 'coki' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Recientes', 'coki' ) ); ?></div>
			</div>
			<!-- /.nav-links -->

		</nav>
		<!-- /#comment-nav-above -->
		<?php endif;
	endif;

	/* Comentarios cerrados */
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comentarios cerrados', 'coki' ); ?></p>
	<?php
	endif;
	comment_form();
	?>

</div>
