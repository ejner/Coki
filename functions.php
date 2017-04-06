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

/**
 * Define parámetros básicos del theme y desactiva funciones del núcleo que no se usarán
 *
 * @since 1.0.0
 */
function coki_setup() {
	$logo = array(
					'height' => 120,
					'width' => 120,
				);

	add_theme_support( 'menus' ); // Soporte de menús.
	add_theme_support( 'title-tag' ); // Título.
	add_theme_support( 'post-thumbnails' ); // Soporte de miniaturas.
	add_image_size( 'single', 700, 200, true ); // Tamaño de miniatura personalizado (vista individual).
	add_image_size( 'home', 120, 120, true ); // Tamaño de miniatura personalizado (vista general).
	add_theme_support( 'automatic-feed-links' ); // Habilita enlaces RSS en la cabecera para comentarios.
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) ); // HTML5.
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) ); // Formatos de entrada.
	add_theme_support( 'custom-logo', $logo ); // Soporte de logo personalizado.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'scroll',
		'render' => 'coki_jetpack_infinite_scroll',
		'posts_per_page' => get_option( 'posts_per_page' ),
		'footer' => 'footer',
	) ); // Soporte scroll infinito, JetPack.

	/* Elimina acciones */
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Muestra enlaces extras en el feed, como feed de categorías.
	remove_action( 'wp_head', 'rsd_link' ); // Enlace Really Simple Discovery.
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Enlace al archivo de configuración de Windows Live Writer.
	remove_action( 'wp_head', 'index_rel_link' ); // Enlace a portada.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Siguientes enlace.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Link relacional al primer artículo.
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Link relacional a las entradas adyacentes de la entrada actual.
	remove_action( 'wp_head', 'wp_generator' ); // Muestra versión actual de WordPress.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
}
add_action( 'after_setup_theme', 'coki_setup' );

/**
 * Carga estilos del tema
 *
 * @since 1.0.0
 */
function coki_enqueue() {
	wp_register_style( 'normalize', get_template_directory_uri() . '/libs/normalize/normalize.css', array(), '5.0.0', 'all' );
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
	$return = paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $wp_query->max_num_pages,
		'prev_text' => $prev,
		'next_text' => $next,
	));
	$allow = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'class' => array(),
		),
		'span' => array(
			'class' => array(),
		),
	);

	echo wp_kses( $return, $allow );
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

	if ( post_password_required() ) { // Si es una entrada protegida.
		$icon = 'private';
	} elseif ( ! empty( $icon ) ) { // Si no, verifica si $icon esta definido.
		$icon = $icon;
	} elseif ( has_post_format( $format ) ) { // Mira si es un formato de entrada.
		$icon = get_post_format();
	} elseif ( is_attachment() ) { // O es un adjunto.
		$icon = 'attachment';
	} else { // Se aburre y lo define como "standard".
		$icon = 'standard';
	}

	if ( ! empty( $color ) && ctype_xdigit( $color ) ) { // Verifica si $color está definido, y si corresponde a valor HEX.
		$color = ' style="background-color: #' . $color . '!important"';
	}

	if ( is_sticky() && is_home() ) { // Si es una entrada fijada.
		echo '<i class="type coki-sticky"></i>';
	}
	// Imprime el icono.
	echo '<i class="type mini-type coki-' . $icon . '"' . $color . '></i>'; // WPCS: XSS OK.
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
 * Obtiene fecha de publicación, la "humaniza", y la envuelve con el enlace
 * permanente del artículo.
 *
 * @since 1.0.0
 *
 * @param string $the_date La fecha. Obligatorio.
 * @param string $d Formato fecha PHP. Opcional.
 * @param int    $post ID de la publicación. Obligatorio.
 */
function coki_post_time( $the_date, $d, $post ) {
	$time_difference = current_time( 'timestamp' ) - get_the_time( 'U' );

	if ( $time_difference < 86400 ) { // Si la diferencia es menor a 86400 segundos (24 horas).
		$date = sprintf( /* translators: %s tiempo transcurrido desde la publicación. */
			__( 'Hace %s atrás', 'coki' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
		);
	} else { // Si es mayor a 86400 segundos.
		$date = sprintf( /* translators: %1$s fecha - %2$s hora de la publicación. */
			__( '%1$s a las %2$s', 'coki' ), esc_html( get_the_date() ), esc_html( get_the_time() )
		);
	}
	$date = '<i class="coki-time"></i> <time class="date" datatime="' . date_i18n( get_the_time( 'Y-m-d\TH:i:s' ) ) . '">' . esc_attr( $date ) . '</time>';
	return '<a href="' . get_the_permalink() . '" class="meta-link" >' . $date . '</a>';
}
add_action( 'the_date', 'coki_post_time', 10, 3 );

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
			echo esc_url( get_url_in_content( $content ) );
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
					<li><i class="coki-time"></i>
					<?php
					printf(
							/* translators: %1$s fecha - %2$s hora del comentario. */
							esc_html__( '%1$s a las %2$s', 'coki' ), get_comment_date(), get_comment_time()
					);
					?></li>
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
					<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => 'comment',
									'depth' => $depth,
									'max_depth' => $args['max_depth'],
								)
							)
						); ?>
				</div>

			</div>

			<div class="clear"></div>
<?php
}

/**
 * Filtro para enlace al perfil del autor. Coloca su Gravatar en lugar de su nombre.
 *
 * @since 1.0.0
 *
 * @param string $link Enlace al perfil. Opcional.
 */
function cokie_author_link( $link ) {
	return sprintf( '<a href="%1$s" class="meta-link" title="%2$s" rel="author">%3$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		/* translators: %s: nombre del autor */
		esc_attr( sprintf( __( 'Publicado por %s', 'coki' ), get_the_author() ) ),
		get_avatar( get_the_author_meta( 'ID' ) )
	);
}
add_filter( 'the_author_posts_link', 'cokie_author_link', 10, 1 );

/**
 * Si los comentarios están habilitados, devuelve el número de comentarios envuelto
 * en un hipervinculo.
 *
 * @since 1.0.0
 *
 * @param bool   $print Imprime la cadena. Opcional.
 * @param string $before Contenido antes del enlace. Opcional.
 * @param string $after Contenido despues del enlace. Opcional.
 */
function coki_comments_count( $print = true, $before = '<li class="meta-item">', $after = '</li>' ) {
	$comments = get_comments_number( get_the_ID() );
	$result = wp_kses_normalize_entities( $before ) . '<a href="' . esc_url( get_the_permalink() );
	$result .= '#comments" title="' . esc_html__( 'Ir a los comentarios', 'coki' ) . '" class="meta-link">';
	$result .= esc_html( $comments ) . '</a>' . wp_kses_normalize_entities( $after );

	if ( true === $print ) {
		echo $result; // WPCS: XSS OK.
	} else {
		return $result;
	}
}

/**
 * Determina el archivo donde se encuentra el loop. Usado por Jetpack.
 *
 * @since 1.0.0
 */
function coki_jetpack_infinite_scroll() {
	get_template_part( 'loop' );
}

/**
 * Cambia el pie de página. Usado por Jetpack.
 *
 * @since 1.0.0
 */
function coki_jetpack_credits() {
	return '<a href="http://wordpress.org/" title="WordPress.org">WordPress</a> - <a href="http://github.com/ejner/Coki" title="Coki">Coki</a>';
}
add_filter( 'infinite_scroll_credit', 'coki_jetpack_credits' );

/**
 * Filtra el contenido del artículo con el formato "chat", los envuelve en etiquetas HTML y los devuelve.
 *
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @since 1.0.0
 *
 * @param string $content Contenido del artículo.
 */
function coki_chat( $content ) {
	if ( ! has_post_format( 'chat' ) ) { // Verifica que se trata del formato "chat".
		return $content;
	}

	$_post_format_chat_ids = array(); // Establece la variable global $_post_format_chat_ids en 0.
	$separator = apply_filters( 'coki_chat_separator', ': ' ); // Aplica filtros para el separador.
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">'; // Etiqueta inicio chat.
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content ); // Divide el contenido.

	foreach ( $chat_rows as $chat_row ) {

		if ( strpos( $chat_row, $separator ) ) {
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );
			$chat_text = trim( $chat_row_split[1] );
			$speaker_id = coki_chat_get_id( $chat_author );

			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><span class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</span>' . $separator . '</div>';
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'coki_chat_format_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';
			$chat_output .= "\n\t\t\t\t" . '</div><!-- /.chat-row -->';
		} elseif ( ! empty( $chat_row ) ) {
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'coki_chat_format_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';
			$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
		}
	}

	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	return apply_filters( 'coki_chat_output', $chat_output ); // Devuelve el filtro para facilitar modificaciones.
}
add_filter( 'the_content', 'coki_chat' );
add_filter( 'coki_chat_format_text', 'wpautop' );

/**
 * Devuelve un ID basado en el nombre del autor.
 *
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @since 1.0.0
 *
 * @global array $_post_format_chat_ids ID del chat basado en el nombre del autor.
 * @param string $chat_author Autor actual.
 */
function coki_chat_get_id( $chat_author ) {
	global $_post_format_chat_ids;

	$chat_author = strtolower( strip_tags( $chat_author ) ); // Sanitiza y normaliza el nombre.
	$_post_format_chat_ids[] = $chat_author; // Añade el nombre del autor al array.
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids ); // Verifica los valores.

	return absint( array_search( $chat_author, $_post_format_chat_ids, true ) ) + 1; // Devuelve el array con el ID del autor.
}
