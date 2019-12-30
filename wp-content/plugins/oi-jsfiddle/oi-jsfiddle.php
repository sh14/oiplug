<?php
/*
Plugin Name: Oi JSFiddle
Plugin URI: http://oiplug.com/plugins/oi-jsfiddle/
Description: Show JSFiddle content.
Author: Isaenko Alexey
Version: 1.0
Author URI: http://sh14.ru/
*/
global $data;
require_once( 'include/custom_fields.php' );
function oi_admin_bar() {
	if ( ! current_user_can( 'level_10' ) ) {
		add_filter( 'show_admin_bar', '__return_false' );
	}
}

add_action( 'init', 'oi_admin_bar' );
/* NEW: ------------------------------------------ */
function do_cat( $id = '' ) {
	switch ( $id ) {
		case 3:
			return 'wide';
			break;
	}

	return true;
}

function mylinklist() {
	global $wpdb, $table_prefix;
	$query = "SELECT distinct *, l.link_id as proper_link_id, UNIX_TIMESTAMP(l.link_updated) as link_date, IF (DATE_ADD(l.link_updated, INTERVAL 120 MINUTE) >= NOW(), 1,0) as recently_updated FROM " . $table_prefix . "terms t LEFT JOIN " . $table_prefix . "term_taxonomy tt ON (t.term_id = tt.term_id) LEFT JOIN " . $table_prefix . "term_relationships tr ON (tt.term_taxonomy_id = tr.term_taxonomy_id) LEFT JOIN " . $table_prefix . "links l ON (tr.object_id = l.link_id) LEFT JOIN " . $table_prefix . "links_extrainfo le ON (l.link_id = le.link_id) WHERE tt.taxonomy = 'link_category' AND l.link_id is not NULL AND l.link_description not like '%LinkLibrary:AwaitingModeration:RemoveTextToApprove%'  AND l.link_visible != 'N' ORDER by  name ASC, l.link_name ASC";
	$links = $wpdb->get_results( $query );
	$cid   = ''; // category id
	$out   = ''; // category id
	$list  = '';
	if ( current_user_can( 'moderate_comments' ) ) {
		$admin = 1;
	} else {
		$admin = 0;
	}

	foreach ( $links as $k => $v ) {
		if ( $admin == 1 ) {
			$edit = ' <a href="' . get_bloginfo( 'url' ) . '/wp-admin/link.php?action=edit&link_id=' . $v->object_id . '">(Edit)</a>';
		} else {
			$edit = '';
		}
		if ( $v->link_target ) {
			$link_target = ' target="' . $v->link_target . '"';
		} else {
			$link_target = '';
		}
		if ( $v->link_no_follow ) {
			$link_no_follow = ' rel="nofollow"';
		} else {
			$link_no_follow = '';
		}
		if ( $cid <> $v->term_id ) {
			$name = $v->name;
			$cid  = $v->term_id;
			$out .= $list;
			$out .= '<h2>' . $name . '</h2>';
			$list = '';
		}
		$list .= '<div class="row hover"><div class="col-xs-6 col-md-4"><a' . $link_target . $link_no_follow . ' href="' . $v->link_url . '">' . $v->link_name . '</a>' . $edit . '</div>' .
		         '<div class="col-xs-6 col-md-8">' . $v->link_description . '</div></div>';

	}

	return $out . $list;
}

add_shortcode( 'mylinklist', 'mylinklist' );
function relativePath( $from, $to, $ps = DIRECTORY_SEPARATOR ) {
	$arFrom = explode( $ps, rtrim( $from, $ps ) );
	$arTo   = explode( $ps, rtrim( $to, $ps ) );
	while ( count( $arFrom ) && count( $arTo ) && ( $arFrom[0] == $arTo[0] ) ) {
		array_shift( $arFrom );
		array_shift( $arTo );
	}
	$return = str_pad( "", count( $arFrom ) * 3, '..' . $ps ) . implode( $ps, $arTo );
	// Don't disclose anything about the path is it's not needed, i.e. is the standard
	if ( $return === '../../../' ) {
		$return = '';
	}

	return $return;
}



function oi_html_minify( $html ) {
	$html = preg_replace( '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/', '', $html );
	$html = preg_replace( '/<!--(.|\s)*?-->/', '', $html );
	$html = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $html );
	$html = str_replace( ';', ";\n", $html );
	$html = str_replace( '{', "\n{\n", $html );
	$html = str_replace( '}', "\n}\n", $html );
	$html = str_replace( '<', "\n<", $html );
	$html = str_replace( '>', ">\n", $html );
	$html = str_replace( '(', "\n(\n", $html );
	$html = str_replace( ')', "\n)\n", $html );
	//$html = str_replace( ',', ",\n", $html );
	$html = str_replace( "\r\n", ' ', $html ); // remove line breaks inside tags
	$html = preg_replace( '/^\h*\v+/m', '', $html ); // delete empty lines
	$html = implode( array_map( 'trim', explode( "\n", $html ) ), ' ' );
	$html = str_replace( '&#038;', '&', $html ); // remove line breaks inside tags
	//$html = str_replace( "\n", ' ', $html ); // remove line breaks inside tags
	//$html = str_replace( ': ', ':', $html ); // remove line breaks inside tags
	//$html = str_replace( ' />', '/>', $html ); // remove line breaks inside tags
	//$html = str_replace( ' =', '=', $html ); // remove line breaks inside tags
	//$html = str_replace( '= ', '=', $html ); // remove line breaks inside tags
	$html = str_replace( "\r", '', $html ); // remove line breaks inside tags
	$html = str_replace( '  ', ' ', $html ); // remove line breaks inside tags
	return $html;
}

//add_filter( 'wp_minify_content', 'oi_html_minify' );
function oi_special_get_template_part( $file ) {
	$template = get_stylesheet_directory() . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' . $file . '.php';
	if ( ! file_exists( $template ) ) {
		// берем шаблон из папки плагина
		$template = plugin_dir_path( __FILE__ ) . 'templates/' . $file . '.php';
	}

	if ( file_exists( $template ) ) {

		include $template;
	}
}

function oi_jsfiddle_link( $atts = null ) {
	global $data;
	$atts = ( shortcode_atts( array(
		'link'  => '',
		'frame' => '0',
		'tabs'  => 'result',
	), $atts ) );
	if ( empty( $atts['link'] ) ) {
		$data = oi_custom_fields_special_class::get_meta();
		//$data = @array( $data['jsfiddle'], $data['jsfiddle_type'] );
	} else {
		$data = array(
			'jsfiddle'      => $atts['link'],
			'jsfiddle_type' => $atts['frame'],
			'tabs'          => $atts['tabs'],
		);
	}
	$out = '';
	if ( ! empty( $data ) && is_single() ) {
		ob_start();
		oi_special_get_template_part( 'jsfiddle' );
		$out = ob_get_contents();
		ob_clean();
	}
	if ( empty( $atts['link'] ) ) {
		print $out;
	} else {
		return $out;
	}

	return true;
}

add_shortcode( 'jsfiddle', 'oi_jsfiddle_link' );

class oi_custom_fields_special_class
{
	// указываем поля и их атрибуты
	public static $fields = array();
	public static $values = array(); // custom fields values

	public function get_meta( $post_id = null ) // get variable values from db and put them in array
	{
		if( $post_id == null )
		{
			$post_id = get_the_ID();
		}
		$fields = self::$fields;
		$values = $_POST['oi_custom_fields_special'];
		if( sizeof( $values ) == 0 && sizeof( $_POST ) == 0 ) // если не происходит сохранение данных
		{
			$values = get_post_meta( $post_id, 'oi_custom_fields_special', true ); // get values from db
		}
		return $values;
	}

	public function set_values()
	{
		self::$fields = array(
			'jsfiddle' => array(
				'name'	=> 'oi_custom_fields_special[jsfiddle]',
				'id'	=> 'jsfiddle',
				'type'	=> 'text',
				'label'	=> __('Ссылка на проект в JSFIDDLE','oi'),
				'style'	=> 'width: 100%;',
				'hint'	=> __('Например: //jsfiddle.net/sh14/5L8nk3wa/','oi'),
				'html'	=> '<tr><th>%2$s</th><td>%1$s</td></tr>',
			),
			'jsfiddle_type' => array(
				'name'	=> 'oi_custom_fields_special[jsfiddle_type]',
				'id'	=> 'jsfiddle_type',
				'type'	=> 'checkbox',
				'label'	=> __('Показывать вставку или кнопки','oi'),
				'hint'	=> __('','oi'),
				'html'	=> '<tr><th>%2$s</th><td>%1$s</td></tr>',
			),
		);
		self::$values = self::get_meta();
	}
}
