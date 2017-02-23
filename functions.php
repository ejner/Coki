<?php
/**
 * Coki for WordPress 1.0.0
 *
 * Diseño para blogs personales. Simple, moderno, potente y ligero.
 * Licenciado bajo GNU/GPL v3
 * Basado en HTML5 Blank por Todd Motto https://toddmotto.com/
 */

/**
 * function coki_version()
 *
 * Devuelve la versión actual del theme
 * @since 1.0.0
 */
function coki_version() {
    $theme = wp_get_theme();
	return $theme->get( 'Version' );
}

// Coki requiere WordPress 4.7+
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

// Carga "format-chat.php"
require get_template_directory() . '/inc/chat-format.php';

/**
 * coki_setup()
 *
 * Define parámetros básicos del theme y desactiva funciones del núcleo que no se usarán
 * @since 1.0.0
 */
function coki_setup() {
	add_theme_support( 'menus' ); // Soporte de menús
	add_theme_support( 'title-tag' ); // Título
	add_theme_support( 'post-thumbnails' ); // Soporte de miniaturas
	add_image_size( 'single', 700, 200, true ); // Tamaño de miniatura personalizado (vista individual)
	add_image_size( 'home', 120, 120, true ); // Tamaño de miniatura personalizado (vista general)
	add_theme_support( 'automatic-feed-links' ); // Habilita enlaces RSS en la cabecera para comentarios
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) ); // HTML5
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) ); // Formatos de entrada

	// Elimina acciones
	add_filter( 'show_admin_bar', '__return_false' ); // Oculta barra de administración
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // Index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'rel_canonical');
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action( 'after_setup_theme', 'coki_setup' );

/**
 * function coki_enqueue()
 *
 * Carga estilos del theme
 * @since 1.0.0
 */
function coki_enqueue() {
	
	// Normalize 5.0.0
    wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '5.0.0', 'all' );
    wp_enqueue_style( 'normalize' );
	
	// Coki
    wp_register_style( 'coki', get_template_directory_uri() . '/style.css', array(), coki_version(), 'all' );
    wp_enqueue_style( 'coki' );
	
	// Coki Icons
    wp_register_style('coki-font', get_template_directory_uri() . '/css/fonts.css', array(), coki_version(), 'all' );
    wp_enqueue_style('coki-font');
	
	// Modernizr 3.3.1
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), '3.3.1', 'all' );
    wp_enqueue_script( 'modernizr' );
}
add_action('wp_enqueue_scripts', 'coki_enqueue');

/**
 * function coki_menu()
 *
 * Crea menú personalizado
 * @since 1.0.0
 */
function coki_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'header-menu',
			'menu' => '',
			'container' => 'div',
			'container_class' => 'menu',
			'container_id' => '',
			'menu_class' => 'menu',
			'menu_id' => '',
			'echo' => true,
			'fallback_cb' => 'wp_page_menu',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'items_wrap' => '<ul>%3$s</ul>',
			'depth' => 0,
			'walker' => ''
		)
	);
}

/**
 * function coki_register_menu()
 *
 * Registra menú personalizado
 * @since 1.0.0
 */
function coki_register_menu() {
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
    ));
}
add_action('init', 'coki_register_menu');

/**
 * function coki_pagination( string $prev, string $next )
 *
 * Paginación en entradas, sin dependencias
 * @since 1.0.0
 */
function coki_pagination( $prev = '<i class="coki-prev"></i>', $next = '<i class="coki-next"></i>' ) {
    global $wp_query;
	
    $big = 999999999;
	
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total' => $wp_query->max_num_pages,
		'prev_text' => $prev,
		'next_text' => $next
    ));
}
add_action( 'init', 'coki_pagination' );

/**
 * function coki_slug_body( string $classes )
 *
 * Añade slug como clase en body (creado por Starkers WordPress Theme)
 * @since 1.0.0
 */
function coki_slug_body( $classes ) {
    global $post;
	
    if ( is_home() ) {
        $key = array_search( 'blog', $classes );

        if ( $key > -1 ) {
            unset( $classes[$key] );
        }
		
    } elseif ( is_page() ) {
        $classes[] = sanitize_html_class( $post->post_name );
		
    } elseif ( is_singular() ) {
        $classes[] = sanitize_html_class( $post->post_name );
    }
	
    return $classes;
}
add_filter( 'body_class', 'coki_slug_body' );

/**
 * function coki_icon( string $icon, string $color )
 *
 * Muestra icono según tipo de formato de entrada
 * @since 1.0.0
 */
function coki_icon( $icon = '', $color = '' ) {
	
	$format = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	
	if( $icon !== '' ) {
		$format = $icon;
	}
	
	elseif( is_sticky() ) {
		$format = 'sticky';
	}
	
	elseif( has_post_format( $format ) ) {
		$format = get_post_format();
	}
	
	else {
		$format = 'standard';
	}

    if( $color !== '' ) {
        $color = ' style="background-color: ' . $color . '!important"';
    }
	
	echo '<i class="type coki-' . $format . '"' . $color . '></i>';
}

/**
 * Añade un contenedor a objetos insertados vía oEmbed para que, via CSS,
 * se puedan aplicar reglas generales (como diseño adaptable)
 *
 * @since 1.0.0
 *
 * @param string $html URL oEmbed
 */
function coki_responsive_embed( $html ) {
	return '<div class="embed-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'coki_responsive_embed', 10, 3 );
add_filter( 'video_embed_html', 'coki_responsive_embed' );

/**
 * Obtiene fecha de publicación. Si es menor a 24 horas, la muestra de forma
 * humanizada, de lo contrario la muestra en el formato definido por el usuario
 *
 * @since 1.0.0
 */
function coki_time_published() {
	$time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
	$time_difference = current_time( 'timestamp' ) - get_the_time( 'U' );
	$tag = 'class="date" datatime="' . get_the_time( 'Y-m-d\TH:i:s' ) . '"';
	
	if ( $time_difference < 86400 ) {
		echo sprintf( __( '<time %1s>Hace %2$s atrás</time>', 'coki' ), $tag, $time );
	} else {
		echo sprintf( __( '<time %1$s>%2$s</time>', 'coki' ), $tag, get_the_date() );
	}
}

/**
 * Devuelve primera URL de un post
 *
 * @since 1.0.0
 */
function coki_url_link() {
	if ( has_post_format( 'link' ) ) {
		preg_match( '<a[^>]*href="([^"]*)"[^>]*>', get_the_content(), $matches );
		return esc_url_raw( $matches[1] );
	}
}
