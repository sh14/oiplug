<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 11.12.16
 * Time: 10:35
 */


function post_types_args() {
	$post_types = array(
		'main'        => array(
			'label'               => __( 'Анонсы', 'xxx' ),
			'description'         => __( 'Описание анонса', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Анонсы', 'xxx' ),
				'singular_name'  => __( 'Анонс', 'xxx' ),
				'menu_name'      => __( 'Анонсы', 'xxx' ),
				'name_admin_bar' => __( 'Анонс', 'xxx' ),
				'add_new'        => __( 'Добавить новый', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', '' ),
			//'taxonomies'          => array( 'subject', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
		'case'        => array(
			'label'               => __( 'Решения', 'xxx' ),
			'description'         => __( 'Описание решения', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Решения', 'xxx' ),
				'singular_name'  => __( 'Решение', 'xxx' ),
				'menu_name'      => __( 'Решения', 'xxx' ),
				'name_admin_bar' => __( 'Решение', 'xxx' ),
				'add_new'        => __( 'Добавить новое', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author' ),
			//'taxonomies'          => array( 'subject', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		),
		/*
		'edu'     => array(
			'label'               => __( 'Курсы', 'xxx' ),
			'description'         => __( 'Описание курса', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Курсы', 'xxx' ),
				'singular_name'  => __( 'Курс', 'xxx' ),
				'menu_name'      => __( 'Курсы', 'xxx' ),
				'name_admin_bar' => __( 'Курс', 'xxx' ),
				'add_new'        => __( 'Добавить новый', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', ),
			//'taxonomies'          => array( 'subject', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
		*/
		'plugins'     => array(
			'label'               => __( 'Плагины', 'xxx' ),
			'description'         => __( 'Описание плагина', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Плагины', 'xxx' ),
				'singular_name'  => __( 'Плагин', 'xxx' ),
				'menu_name'      => __( 'Плагины', 'xxx' ),
				'name_admin_bar' => __( 'Плагин', 'xxx' ),
				'add_new'        => __( 'Добавить новый', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', 'comments', ),
			'taxonomies'          => array( 'plugin-type', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
		'review'      => array(
			'label'               => __( 'Отзывы', 'xxx' ),
			'description'         => __( 'Описание отзыва', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Отзывы', 'xxx' ),
				'singular_name'  => __( 'Отзыв', 'xxx' ),
				'menu_name'      => __( 'Отзывы', 'xxx' ),
				'name_admin_bar' => __( 'Отзыв', 'xxx' ),
				'add_new'        => __( 'Добавить новый', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', ),
			'taxonomies'          => array( 'plugin-type', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
		'project'     => array(
			'label'               => __( 'Проекты', 'xxx' ),
			'description'         => __( 'Описание проекта', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Проекты', 'xxx' ),
				'singular_name'  => __( 'Проект', 'xxx' ),
				'menu_name'      => __( 'Проекты', 'xxx' ),
				'name_admin_bar' => __( 'Проект', 'xxx' ),
				'add_new'        => __( 'Добавить новый', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', 'comments', ),
			'taxonomies'          => array( 'projects', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
		'service'     => array(
			'label'               => __( 'Сервис', 'xxx' ),
			'description'         => __( 'Описание', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Сервисы', 'xxx' ),
				'singular_name'  => __( 'Сервис', 'xxx' ),
				'menu_name'      => __( 'Сервисы', 'xxx' ),
				'name_admin_bar' => __( 'Сервис', 'xxx' ),
				'add_new'        => __( 'Добавить новый', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', 'comments', ),
			//'taxonomies'          => array( 'projects', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
		'lesson'     => array(
			'label'               => __( 'Занятия', 'xxx' ),
			'description'         => __( 'Описание', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Занятия', 'xxx' ),
				'singular_name'  => __( 'Занятие', 'xxx' ),
				'menu_name'      => __( 'Занятия', 'xxx' ),
				'name_admin_bar' => __( 'Занятие', 'xxx' ),
				'add_new'        => __( 'Добавить новое', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', 'comments', ),
			'taxonomies'          => array( 'groups', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
		'certificate' => array(
			'label'               => __( 'Сертификат', 'xxx' ),
			'description'         => __( 'Описание', 'xxx' ),
			'labels'              => array(
				'name'           => __( 'Сертификаты', 'xxx' ),
				'singular_name'  => __( 'Сертификат', 'xxx' ),
				'menu_name'      => __( 'Сертификаты', 'xxx' ),
				'name_admin_bar' => __( 'Сертификат', 'xxx' ),
				'add_new'        => __( 'Добавить новый', 'xxx' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', ),
			//'taxonomies'          => array( 'projects', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		),
	);

	return $post_types;
}

/**
 * Функция добавления новых типов постов
 */
function post_types() {

	$post_types = post_types_args();

	$start_position = 5;
	$i              = 0;
	// проход по всем типам
	foreach ( $post_types as $post_type => $args ) {

		if ( empty( $post_types[ $post_type ]['menu_position'] ) ) {

			$post_types[ $post_type ]['menu_position'] = $start_position + $i;
		}

		// регистрация текущего типа
		register_post_type( $post_type, $post_types[ $post_type ] );

		$i ++;
	}
}

add_action( 'init', 'post_types', 0 );


// Register subject Taxonomy
function taxonomy_types() {

	$taxonomy_types = array(
		'plugin-type' => array(
			'labels'            => array(
				'name'          => __( 'Тип плагина', 'xxx' ),
				'singular_name' => __( 'Тип плагина', 'xxx' ),
				'menu_name'     => __( 'Типы плагинов', 'xxx' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'object_type'       => array( 'plugins', 'post' ),
		),
		'projects'    => array(
			'labels'            => array(
				'name'          => __( 'Тип проекта', 'xxx' ),
				'singular_name' => __( 'Тип проекта', 'xxx' ),
				'menu_name'     => __( 'Типы проектов', 'xxx' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'object_type'       => array( 'project' ),
		),
		'groups'    => array(
			'labels'            => array(
				'name'          => __( 'Группа', 'xxx' ),
				'singular_name' => __( 'Группа', 'xxx' ),
				'menu_name'     => __( 'Группы', 'xxx' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'object_type'       => array( 'lesson' ),
		),
	);

	foreach ( $taxonomy_types as $taxonomy_type => $args ) {

		if ( ! empty( $taxonomy_types[ $taxonomy_type ]['object_type'] ) ) {
			register_taxonomy( $taxonomy_type, $taxonomy_types[ $taxonomy_type ]['object_type'], $args );
		}
	}


}

add_action( 'init', 'taxonomy_types', 0 );


function wpse28782_remove_menu_items() {
	if ( ! current_user_can( 'administrator' ) ) {
		$post_types = post_types_args();
		foreach ( $post_types as $post_type => $args ) {
			remove_menu_page( 'edit.php?post_type=' . $post_type );
		}

		//remove_menu_page('edit.php'); // Posts
		remove_menu_page( 'upload.php' ); // Media
		remove_menu_page( 'link-manager.php' ); // Links
		remove_menu_page( 'edit-comments.php' ); // Comments
		remove_menu_page( 'edit.php?post_type=page' ); // Pages
		remove_menu_page( 'edit.php?post_type=edu' ); // Pages
		remove_menu_page( 'plugins.php' ); // Plugins
		remove_menu_page( 'themes.php' ); // Appearance
		remove_menu_page( 'users.php' ); // Users
		remove_menu_page( 'tools.php' ); // Tools
		remove_menu_page( 'options-general.php' ); // Settings
		remove_menu_page( 'profile.php' ); // profile
		remove_menu_page( 'wpcf7' ); // contact forms 7

	}
}

add_action( 'admin_menu', 'wpse28782_remove_menu_items' );


//Thanks to Howdy_McGee
function remove_admin_bar_links() {
	global $wp_admin_bar;
	if ( ! current_user_can( 'administrator' ) ) {
		$post_types = post_types_args();
		foreach ( $post_types as $post_type => $args ) {
			$wp_admin_bar->remove_menu( 'new-' . $post_type );
		}
		$wp_admin_bar->remove_menu( 'new-' . 'edu' );
	}
}

add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

/*
function disable_new_post() {
	if ( get_current_screen()->post_type == 'my_post_type' )
		wp_die( "You ain't allowed to do that!" );
}
add_action( 'load-post-new.php', 'disable_new_post' );*/
