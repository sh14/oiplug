<?php
/**
 * Связанные между собой посты различных типов
 */

if ( function_exists( 'p2p_register_connection_type' ) ) {
	/**
	 * Регистрация связей
	 */
	function oi_p2p_register_connection() {

		$types = array(
			// отзывы о курсах
			array(
				'name'      => 'review_to_edu',
				'from'      => 'review',
				'to'        => 'edu',
				'title'     => array(
					'from' => 'Отзыв к курсу',
					'to'   => 'Курсы, которым подходит отзыв'
				),
				'admin_box' => array(
					'show' => 'from',
				)
			),
			// отзывы о плагинах
			array(
				'name'      => 'review_to_plugins',
				'from'      => 'review',
				'to'        => 'plugins',
				'title'     => array(
					'from' => 'Отзыв о плагине',
					'to'   => 'Плагин, о котором оставлен отзыв'
				),
				'admin_box' => array(
					'show' => 'from',
				)
			),
			// отзывы о сервисах
			array(
				'name'      => 'review_to_service',
				'from'      => 'review',
				'to'        => 'service',
				'title'     => array(
					'from' => 'Отзыв о сервисе',
					'to'   => 'Сервис, о котором оставлен отзыв'
				),
				'admin_box' => array(
					'show' => 'from',
				)
			),
			// отзывы о пользователях
			array(
				'name'      => 'review_to_user',
				'from'      => 'review',
				'to'        => 'user',
				'title'     => array(
					'from' => 'Отзыв о пользователе',
					'to'   => 'Пользователь, о котором оставлен отзыв'
				),
				'admin_box' => array(
					'show' => 'from',
				)
			),
			// отзывы о пользователях
			array(
				'name'      => 'certificate_to_user',
				'from'      => 'certificate',
				'to'        => 'user',
				'title'     => array(
					'from' => 'Сертификат для пользователя',
					'to'   => 'Пользователь, которому выдан сертификат'
				),
				'admin_box' => array(
					'show' => 'from',
				)
			),
			// отзывы о пользователях
			array(
				'name'      => 'certificate_of_edu',
				'from'      => 'certificate',
				'to'        => 'edu',
				'title'     => array(
					'from' => 'Сертификат курса',
					'to'   => 'Курс, который был пройден пользователем'
				),
				'admin_box' => array(
					'show' => 'from',
				)
			),
		);

		foreach ( $types as $type ) {
			p2p_register_connection_type( $type );
		}

	}

	add_action( 'p2p_init', 'oi_p2p_register_connection' );
}
