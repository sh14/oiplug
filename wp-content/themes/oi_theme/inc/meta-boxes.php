<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 24.08.17
 * Time: 1:14
 */

function oi_get_meta_box( $meta_boxes ) {
	$prefix = 'review_';

	$meta_boxes[] = array(
		'id'         => 'reviewer_info',
		'title'      => esc_html__( 'Информация респондента', 'metabox-online-generator' ),
		'post_types' => array( 'review' ),
		'context'    => 'advanced',
		'priority'   => 'default',
		'autosave'   => false,
		'fields'     => array(
			array(
				'id'          => 'social_link',
				'type'        => 'url',
				'name'        => esc_html__( 'Ссылка на профиль', 'metabox-online-generator' ),
				'desc'        => esc_html__( 'Ссылка на профиль пользователя', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'Введите адрес ссылки', 'metabox-online-generator' ),
			),
			array(
				'id'          => $prefix . 'place_of_work',
				'type'        => 'text',
				'name'        => esc_html__( 'Место работы', 'metabox-online-generator' ),
				'desc'        => esc_html__( 'Место работы, если есть', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'Введите место работы', 'metabox-online-generator' ),
			),
			array(
				'id'          => $prefix . 'specialization',
				'type'        => 'text',
				'name'        => esc_html__( 'Специализация', 'metabox-online-generator' ),
				'desc'        => esc_html__( 'Специализация, если есть', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'Введите специализацию, например "программист"', 'metabox-online-generator' ),
			),
			array(
				'id'          => $prefix . 'user_id',
				'type'        => 'number',
				'name'        => esc_html__( 'ID пользователя', 'metabox-online-generator' ),
				'desc'        => esc_html__( 'ID пользователя, если он есть на сайте', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'Введите ID пользователя', 'metabox-online-generator' ),
			),
			// при учете оценки можно брать во внимание факт того, что респондент прошел курс(получил диплом),
			// а не просто прослушал его или вообще пришел с улицы
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'oi_get_meta_box' );
