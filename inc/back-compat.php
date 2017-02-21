<?php
/*
 * Compatibilidad Coki for WordPress
 * Previene activar el theme en versiones de WordPress anteriores a la 4.7.
 * Código tomado desde Twenty Seventeen y adaptado ligeramente.
 * @since 1.0.0
*/

/*
 * Previene cambiar a Coki en versiones antiguas de WordPress
 * Cambia al theme por defecto
 * @since 1.0.0
*/
function coki_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'coki_upgrade_notice' );
}
add_action( 'after_switch_theme', 'coki_switch_theme' );

/*
 * Mensaje a mostrar si se intenta activar el 
 * theme en versiones antiguas.
 * @since 1.0.0
*/
function coki_upgrade_notice() {
	$message = sprintf( __( 'Coki requiere WordPress 4.7 o superior. Estás utilizando la versión %s. Favor, actualiza tu instalación y vuelve a intentar.', 'coki' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/*
 * Previene que sea cargado en el Personalizador
 * @since 1.0.0
*/
function coki_customize() {
	wp_die( sprintf( __( 'Coki requiere WordPress 4.7 o superior. Estás utilizando la versión %s. Favor, actualiza tu instalación y vuelve a intentar.', 'coki' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'coki_customize' );

/*
 * Previene que sea cargado en la Vista Previa
 * @since 1.0.0
*/
function coki_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Coki requiere WordPress 4.7 o superior. Estás utilizando la versión %s. Favor, actualiza tu instalación y vuelve a intentar.', 'coki' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'coki_preview' );
