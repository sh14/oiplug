<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 11.12.16
 * Time: 10:18
 */
require( 'inc/custom-post-types.php' );
require( 'inc/template-functions.php' );
require( 'inc/post-to-post.php' );
require( 'inc/meta-boxes.php' );
//require( 'inc/ultimate-member.php' );

add_filter( 'term_description', 'shortcode_unautop' );
add_filter( 'term_description', 'do_shortcode' );
/*
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

add_filter( 'comment_text', 'shortcode_unautop');
add_filter( 'comment_text', 'do_shortcode' );

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');*/

/**/
function remove_json_api() {

	// Remove the REST API lines from the HTML Header
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

	// Remove the REST API endpoint.
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );

	// Turn off oEmbed auto discovery.
	add_filter( 'embed_oembed_discover', '__return_false' );

	// Don't filter oEmbed results.
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

	// Remove oEmbed discovery links.
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );

	// Remove all embeds rewrite rules.
	//add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}

add_action( 'after_setup_theme', 'remove_json_api' );
//And this snippet completely disable the REST API and shows {"code":"rest_disabled","message":"The REST API is disabled on this site."} when visiting http://yoursite.com/wp-json/

function disable_json_api() {

	// Filters for WP-API version 1.x
	add_filter( 'json_enabled', '__return_false' );
	add_filter( 'json_jsonp_enabled', '__return_false' );

	// Filters for WP-API version 2.x
	add_filter( 'rest_enabled', '__return_false' );
	add_filter( 'rest_jsonp_enabled', '__return_false' );

}

add_action( 'after_setup_theme', 'disable_json_api' );


function oi_register_styles() {
	//wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,700&subset=cyrillic' );
	wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,400i,700&amp;subset=cyrillic' );
	wp_register_style( 'bootstrap', esc_url( get_template_directory_uri() ) . '/bootstrap/css/bootstrap.min.css' );
	wp_register_style( 'style', esc_url( get_stylesheet_directory_uri() ) . '/style.css' );

	wp_enqueue_style( 'fonts' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'style' );
}

add_action( 'get_footer', 'oi_register_styles' );

function oi_register_scripts() {
	/*
	Статьи по теме
	https://codex.wordpress.org/Function_Reference/wp_register_style - регистрация скриптов в плагине
	http://crunchify.com/how-to-disable-auto-embed-script-for-wordpress-4-4-wp-embed-min-js/
	http://wordpress.stackexchange.com/questions/186065/how-to-load-css-in-the-footer - вставка стилей в футер
	http://wordpress.stackexchange.com/questions/211467/remove-json-api-links-in-header-html - удаление подключения ссылок
	http://bhoover.com/remove-unnecessary-code-from-your-wordpress-blog-header/ - удаление подключения ссылок
	*/

	wp_deregister_script( 'wp-embed' );

	// удаление ссылки, которая нужна для управления сайтом через какие-то сторонние сервисы или приложения
	remove_action( 'wp_head', 'rsd_link' );

	// ссылка для Windows Live Writer редактора
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// удаление информации о генераторе контента
	remove_action( 'wp_head', 'wp_generator' );

	// удаление rel='https://api.w.org/'
	remove_action( 'wp_head', 'rest_output_link_wp_head' );

	// удаление REST ??
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
	/*
	*/
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, null, true );

	// этот скрипт не нужен, если не надо поддерживать старый код
	//wp_register_script( 'jquery-migrate', includes_url( '/js/jquery/jquery-migrate.min.js' ), false, NULL, true );
	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery-migrate' );
	wp_register_script( 'matchHeight', esc_url( get_template_directory_uri() ) . '/js/jquery.matchHeight-min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'matchHeight' );

	wp_register_script( 'bootstrap', esc_url( get_template_directory_uri() ) . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'bootstrap' );

	wp_register_script( 'fontawesome', 'https://use.fontawesome.com/9a0ff8992b.js', array(), false, true );

	wp_enqueue_script( 'fontawesome' );

	wp_register_script( 'functions', esc_url( get_template_directory_uri() ) . '/js/functions.js', array(), false, true );

	wp_enqueue_script( 'functions' );
}

add_action( 'wp_enqueue_scripts', 'oi_register_scripts' );

function init_theme() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'xxx' ),
	) );


}

add_action( 'init', 'init_theme' );

function oi_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Подвал', 'xxx' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
		'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sd-6 col-md-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'oi_widgets_init' );


/**
 * Получение указанного шаблона в виде строки
 *
 * @param $atts
 *
 * @return string
 */
function oi_get_template_part( $atts ) {

	if ( is_string( $atts ) ) {
		$atts = array( 'file' => $atts );
	} else {
		$atts = shortcode_atts( array(
			'file'  => '',
			// если true - при отсутствии файл ничего не загружается
			'empty' => false,
		), $atts );
	}

	// определение переменной, содержащей вывод
	$out = '';

	if ( empty( $atts['file'] ) ) {
		return $out;
	}

	// начало буферизации вывода
	ob_start();

	// если флаг выдачи пустоты стоит
	if ( ! empty( $atts['empty'] ) && $atts['empty'] == true ) {
		/*pr('dd');
				// идет проверка на существование файл
				if ( file_exists( $atts['file'] ) ) {
					pr('sss');
					// файл существует - подгрузка шаблона
					get_template_part( $atts['file'] );
				}else{
					return $out;
				}
				*/
	} else {
		$path = get_template_directory() . '/' . $atts['file'] . '.php';

		if ( file_exists( $path ) ) {

			// подгрузка шаблона
			get_template_part( $atts['file'] );
		} else {
			if ( current_user_can( 'administrator' ) ) {
				echo __( 'файл', 'xxx' ) . $path . ' ' . __( 'не найден', 'xxx' );
			}
		}
	}

	// вывод данных из буфера в переменную
	$out .= ob_get_contents();

	// очистка буфера
	ob_end_clean();

	return $out;
}


/**
 * Функция для вывода изображения с srcset атрибутом
 *
 * @param null $atts ['post_id']
 *
 * @return string
 */
function get_srcset_img( $atts = null ) {
	$atts = shortcode_atts( array(
		'post_id' => null,
		'class'   => '',
		'exclude' => array( 'thumbnail', 'thumb', ),
		// размеры, которые следует исключить из вывода - перечисляются через запятую
	), $atts );

	// если размеры указаны в виде строки
	if ( ! is_array( $atts['exclude'] ) ) {
		// осуществляется перевод строки в массив
		$atts['exclude'] = array_map( 'trim', explode( ',', $atts['exclude'] ) );
	}

	// если id поста не указан
	if ( empty( $atts['post_id'] ) ) {
		$atts['post_id'] = get_the_ID();

		// запрашивается миниатюра поста
		$thumb = true;

		// если у поста нет миниатюры
		if ( ! has_post_thumbnail( $atts['post_id'] ) ) {
			// возврат пустой строки
			return '';
		}
	} else {
		// запрашивается конкретное изображение
		$thumb = false;
	}

	// получение всех вариантов миниатюр(thumbnail, medium, large...)
	$images = get_intermediate_image_sizes();

	// добавление оригинального размера изображения
	$images[] = 'full';

	// массив содержащий ссылки на каждый вариант изображения
	$image_list = array();

	// ширина самого маленького изображения
	$width = 9999;

	// путь к стандартной картинке
	$src = '';

	// проход по всем вариантам миниатюр
	foreach ( $images as $image ) {
		// если размер не является исключенным
		if ( ! in_array( $image, $atts['exclude'] ) ) {
			// если id не был указан, значит надо получить миниатюру записи
			if ( $thumb == true ) {
				// получение миниатюры поста текущего размера миниатюры
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $atts['post_id'] ), $image );
			} else {
				// получение изображения для текущего размера миниатюры
				$image = wp_get_attachment_image_src( $atts['post_id'], $image );
			}
			// если изображение существует
			if ( ! empty( $image ) ) {
				// если ширина больше ширины текущего изображения
				if ( $width > $image[1] ) {
					// минимальной шириной устанавливается ширина текущего изображения
					$width = $image[1];

					// в качестве изображения по умолчанию устанавливается самое маленькое
					$src = $image[0];
				}

				// формируется массив из каждой миниатюры
				$image_list[ $image[1] ] = $image[0] . ' ' . $image[1] . 'w';
			}
		}
	}

	// если изображение вообще не существует
	if ( empty( $src ) ) {
		// возврат пустой строки
		return '';
	}

	// сортировка массива от меньшего к большему
	ksort( $image_list );

	// преобразование массива в строку
	$image_list = implode( ', ', $image_list );

	// формирование тега
	$img = '<img ' . $atts['class'] . ' src="' . $src . '"  srcset="' . $image_list . '" sizes="(min-width: ' . $width . ') 100vw, ' . $width . '" />';

	// возврат строки
	return $img;
}

function the_srcset_img( $atts = null ) {
	echo get_srcset_img( $atts );
}

function oi_get_avatar( $atts ) {
	$atts   = shortcode_atts( array(
		'user_id' => 0,
		'size'    => 72,
		'alt'     => '',
		'class'   => '',
		'style'   => '',
	), $atts );
	$avatar = get_avatar( $atts['user_id'], $atts['size'] );

	$avatar_url = '';

	if ( ! empty( $avatar ) ) {
		preg_match( '/src=(.*?) /', $avatar, $avatar_array );

		if ( ! empty( $avatar_array ) && ! empty( $avatar_array[1] ) ) {
			$avatar_url = $avatar_array[1];
		}
	}
	//pr($avatar_url);

	$avatar_url = str_replace( '"', '', $avatar_url );
	$avatar_url = str_replace( "'", '', $avatar_url );
	$avatar_url = str_replace( 'http://', '//', $avatar_url );
	//echo $avatar_url;
	if ( empty( $avatar_url ) || strpos( $avatar_url, 'gravatar.com' ) ) {
		$uploads              = wp_upload_dir();
		$upload_path          = $uploads['baseurl'];
		$userphoto_image_file = get_user_meta( $atts['user_id'], 'userphoto_image_file', true );
		if ( ! empty( $userphoto_image_file ) ) {
			$avatar_url = $upload_path . '/userphoto/' . $userphoto_image_file;
		}
	}
	if ( ! empty( $atts['class'] ) ) {
		$atts['class'] = ' class="' . $atts['class'] . '"';
	}

	if ( ! empty( $atts['style'] ) ) {
		$atts['style'] = ' style="' . $atts['style'] . '"';
	}

	if ( ! empty( $atts['alt'] ) ) {
		$atts['alt'] = ' alt="' . esc_attr( $atts['alt'] ) . '"';
	}

	$avatar = '<img ' . $atts['style'] . ' width="' . $atts['size'] . '" height="' . $atts['size'] . '" ' . $atts['class'] . ' src="' . $avatar_url . '"' . $atts['alt'] . ' />';

	return $avatar;
}

function oi_preloader_style() {
	echo oi_get_template_part( 'templates/preloader-style' );
}

add_action( 'wp_head', 'oi_preloader_style', 1 );

function oi_preloader_block() {
	echo oi_get_template_part( 'templates/preloader-block' );
}

//add_action('wp_footer','oi_preloader_block');
/*

 */


/* Bootstrap menu support */

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent        = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$li_attributes = '';
		$class_names   = $value = '';
		$classes       = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]     = ( $args->has_children ) ? 'dropdown' : '';
		$classes[]     = ( $item->current || $item->current_item_ancestor ) ? 'active' : '';
		$classes[]     = 'menu-item-' . $item->ID;
		$class_names   = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names   = ' class="' . esc_attr( $class_names ) . '"';
		$id            = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id            = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$output        .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		$attributes    = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes    .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes    .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes    .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes    .= ( $args->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
		$item_output   = $args->before;
		$item_output   .= '<a' . $attributes . '>';
		$item_output   .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output   .= ( $args->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output   .= $args->after;
		$output        .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		if ( ! $element ) {
			return;
		}
		$id_field = $this->db_fields['id'];
		//display this element
		if ( is_array( $args[0] ) ) {
			$args[0]['has_children'] = ! empty( $children_elements[ $element->$id_field ] );
		} else if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}
		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( &$this, 'start_el' ), $cb_args );
		$id = $element->$id_field;
		// descend only when the depth is right and there are childrens for this element
		if ( ( $max_depth == 0 || $max_depth > $depth + 1 ) && isset( $children_elements[ $id ] ) ) {
			foreach ( $children_elements[ $id ] as $child ) {
				if ( ! isset( $newlevel ) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array( &$output, $depth ), $args );
					call_user_func_array( array( &$this, 'start_lvl' ), $cb_args );
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}
		if ( isset( $newlevel ) && $newlevel ) {
			//end the child delimiter
			$cb_args = array_merge( array( &$output, $depth ), $args );
			call_user_func_array( array( &$this, 'end_lvl' ), $cb_args );
		}
		//end this element
		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( &$this, 'end_el' ), $cb_args );
	}
}

/* END: Bootstrap menu support */

function mylogin() {
	?>
	<? if ( ! is_user_logged_in() ) {
		?>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		     aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Вход</h4>
					</div>
					<div class="modal-body">
						<h3>Войдите, чтобы стать участником проекта.</h3>
						<p>Для входа кликните иконку соц.сети с помощью которой Вы хотите войти.</p>
						<div id="my_login" class="pull-center">
							<div id="ulogin_panel"><? if ( function_exists( 'ulogin_panel' ) ) {
									print ulogin_panel();
								} ?></div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
					</div>
				</div>
			</div>
		</div>
		<? /*?>
<?*/
		?>
		<?
	} ?>
	<?
}

add_action( 'wp_footer', 'mylogin' );

if ( ! function_exists( 'pr' ) ) {
	function pr( $data, $debug_backtrace = false ) {
		if ( current_user_can( 'administrator' ) ) {
			if ( $debug_backtrace == true ) {
				echo '<pre><code>';
				var_dump( debug_backtrace() );
				echo '</pre></code><br/>';
			}

			if ( is_bool( $data ) ) {
				if ( $data === true ) {
					$data = 'true';
				} else {
					$data = 'false';
				}
				echo '<pre><code>';
				echo( $data );
				echo '</pre></code><br/>';
			} else if ( is_array( $data ) || is_object( $data ) ) {
				echo '<pre><code>';
				print_r( (array) $data );
				echo '</pre></code><br/>';
			} else {
				echo '<code>';
				echo $data;
				echo '</code><br/>';
			}
		}
	}
}

add_filter( 'template_include', 'var_template_include', 1000 );


function var_template_include( $t ) {
	$GLOBALS['current_theme_template'] = basename( $t );

	return $t;
}

/**
 * Получение названия файла текущего шаблона
 *
 * @param bool $echo
 *
 * @return bool|mixed
 */
function get_current_template( $echo = false ) {
	if ( ! isset( $GLOBALS['current_theme_template'] ) ) {
		return false;
	}
	if ( $echo ) {
		echo $GLOBALS['current_theme_template'];
	} else {
		return $GLOBALS['current_theme_template'];
	}
}


function vk_callback_widget() {
	echo oi_get_template_part( 'templates/vk_callback_widget' );
}

add_action( 'wp_footer', 'vk_callback_widget' );

function vk_group_widget( $atts ) {
	$atts = shortcode_atts( array(
		'title' => 'Вступайте в нашу группу в VK',
		'text'  => 'Через группу удобно следить за обновлениями сайта, а так же получать дополнительный интересный материал, который публикуется только в группе.',
	), $atts );
	$out  = get_oinput( array(
			'type'  => 'html',
			'title' => $atts['title'],
			'text'  => $atts['text'],
			'html'  => oi_get_template_part( 'templates/vk_group_widget' ),
		)
	);

	return $out;
}

add_shortcode( 'vkgroup', 'vk_group_widget' );


/**
 * Функция включения кропа средних изображений
 *
 */
// Add crop options for medium and large images to dashboard > settings > media.
function crop_settings_api_init() {
	// Add the section to media settings
	add_settings_section(
		'crop_settings_section',
		'Crop images',
		'crop_settings_callback_function',
		'media'
	);
	// Add the fields to the new section
	add_settings_field(
		'medium_crop',
		'Medium size crop',
		'crop_medium_callback_function',
		'media',
		'crop_settings_section'
	);
	add_settings_field(
		'large_crop',
		'Large size crop',
		'crop_large_callback_function',
		'media',
		'crop_settings_section'
	);
	register_setting( 'media', 'medium_crop' );
	register_setting( 'media', 'large_crop' );
} // crop_settings_api_init()

add_action( 'admin_init', 'crop_settings_api_init', 1 );

// Settings section callback function
function crop_settings_callback_function() {
	echo '<p>Choose whether to crop the medium and large size images</p>';
}

// Callback function for our medium crop setting
function crop_medium_callback_function() {
	echo '<input name="medium_crop" type="checkbox" id="medium_crop" value="1"';
	$mediumcrop = get_option( "medium_crop" );
	if ( $mediumcrop == 1 ) {
		echo ' checked';
	}
	echo '/>';
	echo '<label for="medium_crop">Crop medium to exact dimensions</label>';
}

// Callback function for our large crop setting
function crop_large_callback_function() {
	echo '<input name="large_crop" type="checkbox" id="large_crop" value="1"';
	$largecrop = get_option( "large_crop" );
	if ( $largecrop == 1 ) {
		echo ' checked';
	}
	echo '/>';
	echo '<label for="large_crop">Crop large to exact dimensions</label>';
}

/**
 * Filter HTML code and leave allowed/disallowed tags only
 *
 * @param string $text   Input HTML code.
 * @param string $tags   Filtered tags.
 * @param bool   $invert Define whether should leave or remove tags.
 *
 * @return string Filtered tags
 */
function theme_strip_tags_content( $text, $tags = '', $invert = false ) {

	preg_match_all( '/<(.+?)[\s]*\/?[\s]*>/si', trim( $tags ), $tags );
	$tags = array_unique( $tags[1] );

	if ( is_array( $tags ) AND count( $tags ) > 0 ) {
		if ( false == $invert ) {
			return preg_replace( '@<(?!(?:' . implode( '|', $tags ) . ')\b)(\w+)\b.*?>.*?</\1>@si', '', $text );
		} else {
			return preg_replace( '@<(' . implode( '|', $tags ) . ')\b.*?>.*?</\1>@si', '', $text );
		}
	} elseif ( false == $invert ) {
		return preg_replace( '@<(\w+)\b.*?>.*?</\1>@si', '', $text );
	}

	return $text;
}

/**
 * Generate script tags from given source code
 *
 * @param string $source HTML code.
 *
 * @return string Filtered HTML code with script tags only
 */
function theme_insert_js( $source ) {

	$out = '';

	$fragment = new DOMDocument();
	$fragment->loadHTML( $source );

	$xp     = new DOMXPath( $fragment );
	$result = $xp->query( '//script' );

	$scripts     = array();
	$scripts_src = array();
	foreach ( $result as $key => $el ) {
		$src = $result->item( $key )->attributes->getNamedItem( 'src' )->value;
		if ( ! empty( $src ) ) {
			$scripts_src[] = $src;
		} else {
			$type = $result->item( $key )->attributes->getNamedItem( 'type' )->value;
			if ( empty( $type ) ) {
				$type = 'text/javascript';
			}

			$scripts[ $type ][] = $el->nodeValue;
		}
	}

	//used by inline code and rich snippets type like application/ld+json
	foreach ( $scripts as $key => $value ) {
		$out .= '<script type="' . $key . '">';

		foreach ( $value as $keyC => $valueC ) {
			$out .= "\n" . $valueC;
		}

		$out .= '</script>';
	}

	//external script
	foreach ( $scripts_src as $value ) {
		$out .= '<script src="' . $value . '"></script>';
	}

	return $out;
}

/**
 * Удаление поля для url при написании коммента
 *
 * @param $fields
 *
 * @return mixed
 */
function disable_comment_url( $fields ) {
	unset( $fields['url'] );

	return $fields;
}

add_filter( 'comment_form_default_fields', 'disable_comment_url' );

/*return apply_filters( 'ninja_forms_plugin_settings_general', array(



	'current_url' => array(
		'id'    => 'current_url',
		'type'  => 'textbox',
		'label' => __( 'current_url', 'ninja-forms' ),
		'desc'  => 'e.g. m/d/Y, d/m/Y - ' . sprintf( __( 'Tries to follow the %sPHP date() function%s specifications, but not every format is supported.', 'ninja-forms' ), '<a href="http://www.php.net/manual/en/function.date.php" target="_blank">', '</a>' ),
	),



));*/


function get_p2p_titles( $atts ) {
	global $post;
	$atts = wp_parse_args( $atts, [
		'connected_type' => '',
		// posts / users
		'type'           => 'posts',
	] );

	$data = [];

	if ( ! empty( $atts['connected_type'] ) ) {
		if ( $atts['type'] == 'posts' ) {
			$connected = new WP_Query( array(
				'connected_type'  => $atts['connected_type'],
				'connected_items' => get_queried_object(),
				'nopaging'        => true,
			) );
			if ( $connected->have_posts() ) {
				while ( $connected->have_posts() ) {
					$connected->the_post();
					$data[] = get_the_title();
				}

				wp_reset_postdata();
			}
		} else {
			$connected = (array) get_users( array(
				'connected_type'  => $atts['connected_type'],
				'connected_items' => $post,
			) );

			foreach ( $connected as $user ) {

				$meta   = get_user_meta( $user->ID );
				$data[] = $meta['last_name'][0] . ' ' . $meta['first_name'][0];
			}
		}
	}

	return $data;
}


// eof
