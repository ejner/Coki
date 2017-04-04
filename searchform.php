<?php
/**
 * Plantilla de caja de búsqueda
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

?>
	<!-- .searchform -->
	<form role="search" method="get" class="searchform" action="<?php esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="searchform-field" placeholder="<?php esc_attr_e( 'Buscar', 'coki' ); ?>" value="<?php get_search_query(); ?>" name="s" />
	</form>
	<!-- /.searchform -->
