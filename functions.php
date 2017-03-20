<?php
/**
 * Coki for WordPress 1.0.0
 *
 * Diseño para blogs personales. Simple, moderno, potente y ligero.
 * Licenciado bajo GNU/GPL v3
 * Basado en HTML5 Blank por Todd Motto https://toddmotto.com/
 *
 * @package Coki
 * @version 1.0
 * @since 1.0.0
 */

/**
 * Devuelve la versión actual del theme
 *
 * @since 1.0.0
 */
function coki_version() {
	$theme = wp_get_theme();
	return $theme->get( 'Version' );
}

// Define ancho del tema.
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

// Carga "format-chat.php".
require get_template_directory() . '/libs/chat/chat-format.php';

/**
 * Define parámetros básicos del theme y desactiva funciones del núcleo que no se usarán
 *
 * @since 1.0.0
 */
function coki_setup() {
	add_theme_support( 'menus' ); // Soporte de menús.
	add_theme_support( 'title-tag' ); // Título.
	add_theme_support( 'post-thumbnails' ); // Soporte de miniaturas.
	add_image_size( 'single', 700, 200, true ); // Tamaño de miniatura personalizado (vista individual).
	add_image_size( 'home', 120, 120, true ); // Tamaño de miniatura personalizado (vista general).
	add_theme_support( 'automatic-feed-links' ); // Habilita enlaces RSS en la cabecera para comentarios.
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) ); // HTML5.
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) ); // Formatos de entrada.

	/* Elimina acciones */
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds.
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed.
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link.
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // Index link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Prev link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Start link.
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'rel_canonical' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action( 'after_setup_theme', 'coki_setup' );

/**
 * Carga estilos del tema
 *
 * @since 1.0.0
 */
function coki_enqueue() {
	wp_register_style( 'normalize', get_template_directory_uri() . '/libs/normalize.css', array(), '5.0.0', 'all' );
	wp_enqueue_style( 'normalize' );

	wp_register_style( 'coki', get_template_directory_uri() . '/style.css', array(), coki_version(), 'all' );
	wp_enqueue_style( 'coki' );

	wp_register_style( 'coki-font', get_template_directory_uri() . '/libs/fonts/style.css', array(), coki_version(), 'all' );
	wp_enqueue_style( 'coki-font' );

	wp_register_script( 'modernizr', get_template_directory_uri() . '/libs/modernizr/modernizr.min.js', array(), '3.3.1', 'all' );
	wp_enqueue_script( 'modernizr' );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coki_enqueue' );

/**
 * Crea menú personalizado
 *
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
			'walker' => '',
		)
	);
}

/**
 * Registra menú personalizado
 *
 * @since 1.0.0
 */
function coki_register_menu() {
	register_nav_menus(array(
		'header-menu' => __( 'Menú cabecera', 'coki' ),
	));
}
add_action( 'init', 'coki_register_menu' );

/**
 * Paginación en entradas, sin dependencias
 *
 * @since 1.0.0
 *
 * @param string $prev Enlace "Anterior". Opcional.
 * @param string $next Enlace "Siguiente". Opcional.
 */
function coki_pagination( $prev = '&laquo;', $next = '&raquo;' ) {
	global $wp_query;
	$prev = esc_html( $prev );
	$next = esc_html( $next );
	$big = 999999999;

	echo paginate_links( array( // WPCS: XSS OK.
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $wp_query->max_num_pages,
		'prev_text' => $prev,
		'next_text' => $next,
	));
}
add_action( 'init', 'coki_pagination' );

/**
 * Muestra icono según tipo de formato de entrada
 *
 * @since 1.0.0
 *
 * @param string $icon Icono a mostrar. Opcional.
 * @param string $color Color de fondo a mostrar. Opcional.
 */
function coki_icon( $icon = null, $color = null ) {
	$format = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$icon = esc_html( $icon );
	$color = esc_html( $color );
	$color = trim( $color );

	// Si es una entrada protegida.
	if ( post_password_required() ) {
		$format = 'private';
	// Si no, verifica si $icon esta definido.
	} elseif ( ! empty( $icon ) ) {
		$format = $icon;
	// Mira si es un formato de entrada.
	} elseif ( has_post_format( $format ) ) {
		$format = get_post_format();
	// O es un adjunto.
	} elseif ( is_attachment() ) {
		$format = 'attachment';
	// Se aburre y lo define como "standard".
	} else {
		$format = 'standard';
	}
	// Verifica si $color está definido, y si lo está, añade el color.
	if ( ! empty( $color ) ) {
		$color = ' style="background-color: ' . $color . '!important"';
	}

	// Si es una entrada fijada.
	if ( is_sticky() && is_home() ) {
		echo '<i class="type coki-sticky"></i>';
	}
	// Imprime el icono
	echo '<i class="type mini-type coki-' . $format . '"' . $color . '></i>'; // WPCS: XSS OK.
}

/**
 * Añade un contenedor a objetos insertados vía oEmbed para que, via CSS,
 * se puedan aplicar reglas generales (como diseño adaptable)
 *
 * @since 1.0.0
 *
 * @param string $html URL oEmbed. Obligatorio.
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
	$time_difference = current_time( 'timestamp' ) - get_the_time( 'U' );

	// Si la diferencia es menor a 86400 segundos (24 horas).
	if ( $time_difference < 86400 ) {
		$return = sprintf( __( 'Hace %s atrás', 'coki' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
	// Si es mayor a 86400 segundos.
	} else {
		$return = sprintf( __( '%1$s a las %2$s', 'coki' ), esc_html( get_the_date() ), esc_html( get_the_time() ) );
	}
	echo '<i class="coki-time"></i> <time class="date" datatime="' . date_i18n( get_the_time( 'Y-m-d\TH:i:s' ) ) . '">' . $return . '</time>'; // WPCS: XSS OK.
}

/**
 * Devuelve primera URL de un Format Post Link
 *
 * @since 1.0.0
 */
function coki_url_link() {
	if ( has_post_format( 'link' ) ) {
		$content = get_the_content();

		// Verifica si existe una etiqueta <a> y extrae el enlace.
		if ( get_url_in_content( $content ) ) {
			echo get_url_in_content( $content ); // WPCS: XSS OK.
		// Si no existe, verifica que exista un enlace en el contenido.
		} elseif ( preg_match( '/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', $content, $matches ) ) {
			echo esc_url_raw( $matches[0] );
		}
	}
}

/**
 * Callback personalizado para comentarios
 *
 * @since 1.0.0
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
 *
 * @param string $comment Comentario. Obligatorio.
 * @param string $args Argumentos. Obligatorio.
 * @param string $depth Profundidad. Obligatorio.
 */
function coki_comments( $comment, $args, $depth ) {
	$arg = ( $args['has_children'] ) ? 'clear' : 'parent clear';
	?>
		<li <?php comment_class( empty( $arg ) ); ?> id="comment-<?php comment_ID() ?>">

			<?php
				if ( 0 !== $args['avatar_size'] ) {
					echo get_avatar( $comment, $args['avatar_size'] );
				}
			?>

			<div class="data-comments">
				<span class="author"><?php echo get_comment_author_link() ?></span>

				<ul class="details-comments">
					<li><i class="coki-time"></i> <?php printf( esc_html__( '%1$s a las %2$s', 'coki' ), get_comment_date(),  get_comment_time() ); ?></li>
					<li><i class="coki-permalink"></i> <a href="<?php echo esc_html( get_comment_link( $comment->comment_ID ) ); ?>"><?php esc_html_e( 'Enlace permanente', 'coki' ); ?></a></li>
					<?php edit_comment_link( __( 'Editar comentario', 'coki' ), '<li><i class="coki-edit"></i> ', '</li>' ); ?>
				</ul>

				<div class="comment-comments">
					<?php comment_text(); ?>
				</div>

				<?php if ( '0' === $comment->comment_approved ) : ?>
				<div class="comment-awaiting-moderation">
					<?php esc_html_e( 'Tu comentario está a la espera de moderación', 'coki' ); ?>
				</div>
				<?php endif; ?>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>

			</div>

			<div class="clear"></div>
<?php
}

/**
 * Detalles de la entrada o página
 *
 * @since 1.0.0
 *
 * @param string $type Grupo de detalles a mostrar. Opcional.
 */
function coki_post_footer( $type = 'home' ) {
?>
	<?php edit_post_link( '<i class="type type-info coki-edit"></i>' ); ?>

	<ul class="details-list">
	<?php if ( 'home' === $type && ! is_single() || 'page' === $type ) { ?>
		<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="minimodal"><img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>" class="miniavatar" /></a></li>
	<?php } ?>
	<?php if ( 'single' !== $type) { ?>
		<li><a href="<?php the_permalink(); ?>" class="minimodal" title="<?php printf( esc_html__( 'Enlace permanente a \'%s\'', 'coki' ), get_the_title() ); ?>"><?php coki_time_published(); ?></a></li>
	<?php } ?>
	<?php if ( comments_open() && 'page' !== $type ) { ?>
		<li><a href="<?php the_permalink(); ?>#comments" class="minimodal"><i class="coki-comment"></i> <?php comments_number( '0', '1', '%' ); ?></a></li>
	<?php } ?>
	<?php if ( 'single' === $type ) { ?>
		<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="minimodal"><img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>" class="miniavatar" /></a></li>
		<li><i class="coki-category"></i> <?php the_category( ', ' ); ?></li>
		<li><?php the_tags( '<i class="coki-tags"></i> ' ); ?></li>
	<?php } ?>
	</ul>
<?php
}
