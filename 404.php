<?php
/**
 * Plantilla para error 404 (No Encontrado)
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

get_header(); ?>

	<!-- .content -->
	<main class="content single">
		<!-- .not-found -->
		<section class="not-found">

			<?php coki_icon( 'patch' ); ?>
			<h1 class="title-post"><?php esc_html_e( 'Hay que reparar esto', 'coki' ); ?></h1>
			<p><?php esc_html_e( 'La página que buscas no ha podido ser encontrada. No existe, se movió, o tal vez descansa entre millones de artículos que diariamente son borrados.', 'coki' ); ?></p>

		</section>
		<!-- /.not-found -->
	</main>
	<!-- /.content -->

<?php get_footer(); ?>
