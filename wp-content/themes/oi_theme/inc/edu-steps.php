<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 13.08.17
 * Time: 19:47
 */

function edu_steps( $steps ) {
	$array = array(
		'htmlcss'    => array(
			'title'       => 'HTML & CSS',
			'description' => 'Основная технология создания сайтов - HTML & CSS',
			'image'       => 'html5.svg',
			// кол-во занятий
			'length'      => 8,
			'program'     => array(
				'Основы языка разметки HTML',
				'Принцип структурирования HTML документа',
				'Табличная и блочная верстка',
				'HTML5 и CSS3',
				'Практика верстки макета дизайна, подготовленного в графическом редакторе',
				'Кроссбраузерная верстка - верстки для разных браузеров',
				'Создание адаптивного дизайна',
			),
			'skills'      => array(
				'Владение HTML5 и CSS3',
				'Валидная кроссбраузерная и блочная вёрстка сайтов',
				'Использование препроцессоров LESS',
				'Разработка с использованием Twitter Bootstrap',
			),
		),
		'mysql'      => array(
			'title'       => 'Базы данных',
			'description' => 'Основы базы данных, и язык SQL',
			'image'       => 'mysql.svg',
			'length'      => 2,
			'program'     => array(
				'Реляционные базы данных',
				'Проектирование базы данных',
				'Создание таблиц',
				'Заполнение таблиц данными',
				'Получение данных по фильтру',
				'Обновление и удаление данных',
				'Получение данных из нескольких взаимосвязанных таблиц',
				'Функции агрегации',
			),
			'skills'      => array(
				'Знание основ языка SQL и проектирования баз данных',
			),
		),
		'php'        => array(
			'title'       => 'PHP',
			'description' => 'Основы back-end разработки - срверный язык PHP',
			'image'       => 'php.svg',
			'length'      => 14,
			'program'     => array(
				'Подготовка локальной машины к работе. Знакомство с языком. Примеры/практика.',
				'Операторы. Примеры/практика.',
				'Циклы. Примеры/практика.',
				'Формы и запросы. Примеры/практика.',
				'Работа с cookie. Примеры/практика.',
				'Работа с файлами. Примеры/практика.',
				'Работа с базой данных. Примеры/практика.',
				'Архитектура проектов и разработка собственного сайта',
			),
			'skills'      => array(
				'Создание сайтов "под ключ"',
				'Обработка и формирование данных на сервере',
				'Процедурное программирование',
				'Объектно ориентированное программирование',
			),
		),
		// http://learn.javascript.ru/first-steps
		'javascript' => array(
			'title'       => 'JavaScript',
			'description' => 'Основы front-end разработки на языке JavaScript',
			'image'       => 'javascript.svg',
			'length'      => 8,
			'program'     => array(
				'Подключение и порядок исполнения скриптов',
				'Переменные и выбор имен переменных',
				'Шесть типов данных',
				'Основные операторы',
				'Операторы сравнения и логические значения',
				'Побитовые операторы',
				'Взаимодействие с пользователем: alert, prompt, confirm',
				'Условные операторы',
				'Логические операторы',
				'Преобразование типов',
				'Циклы',
				'Функции',
			),
			'skills'      => array(
				'Умение создавать интерактивные страницы на JavaScript',
				'Использование инструментов разработки и отладки в браузере',
				'Обработка событий, манипуляции с элементами DOM',
			),
		),
		// https://jqbook.net.ru/
		'jquery'     => array(
			'title'            => 'jQuery',
			'description'      => 'Практика использования популярной библиотеки jQuery',
			'image'            => 'jquery.svg',
			'length'           => 4,
			'steps_visibility' => false,
			'program'          => array(
				'Подключение библиотеки',
				'Слекторы',
				'Атрибуты',
				'Фильтры',
				'Работа с DOM',
				'События',
				'',
			),
			'skills'           => array(
				'Использование библиотеки JQuery',
			),
		),
		// https://jqbook.net.ru/
		'ajax'       => array(
			'title'            => 'AJAX',
			'description'      => 'Связь частей приложения по средствам AJAX',
			'image'            => 'ajax.svg',
			'length'           => 4,
			'steps_visibility' => false,
			'program'          => array(
				'GET',
				'POST',
				'JQuery AJAX',
				'AJAX Iframe',
				'AJAX Отправка файла',
			),
			'skills'           => array(
				'Опыт написания Ajax-запросов',
			),
		),
		'git'        => array(
			'title'       => 'Командная разработка проекта',
			'description' => 'Опыт разработки в команде и контроль версий',
			'image'       => 'git.svg',
			'skills'      => array(
				'Контроль версий и совместная работа над проектом(GIT)',
			),
		),
		'teamwork'   => array(
			'title' => 'Окончание обучения',
			'image' => 'victory.svg',
		),
	);

	if ( ! is_array( $steps ) ) {
		$steps = array_map( 'trim', explode( ',', $steps ) );
	}

	$out = [];
	foreach ( $steps as $key ) {
		//pr( $key );
		if ( ! empty( $array[ $key ] ) ) {
			$out[ $key ] = $array[ $key ];
		}
	}

	return $out;
}


function rating_stars( $rating = 0 ) {
	$out = '';
	for ( $i = 0; $i < 5; $i ++ ) {
		if ( $i + 1 <= $rating ) {
			$class = 'stars__icon-colorized';
		} else {
			$class = '';
		}


		$out .= '<div class="stars__item">
			<svg class="stars__icon ' . $class . '">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-star"></use>
			</svg>
		</div>';
	}

	$out = '<div class="stars">' . $out . '</div>';

	return $out;
}

// склонение чисел
function oi_declension( $num, $vars, $before = '', $after = '' ) {
	if ( $num == 0 ) // если число равно нулю
	{
		return '';
	} // ничего не возвращаем
	$normal_num = $num; // сохраняем число в исходном виде
	$num        = $num % 10; // определяем цифру, стоящую после десятка
	if ( $num == 1 ) // если это единица
	{
		$num = $normal_num . ' ' . $vars[0];
	} else if ( $num > 1 && $num < 5 ) // если это 2, 3, 4
	{
		$num = $normal_num . ' ' . $vars[1];
	} else {
		$num = $normal_num . ' ' . $vars[2];
	}
	if ( ( $normal_num >= 5 && $normal_num <= 20 ) || ( $num == 0 && $normal_num > 1 ) ) {
		$num = $normal_num . ' ' . $vars[2];
	}

	return $before . $num . $after; // возвращаем строку
}


function oi_icons_layout( $atts ) {
	$atts = wp_parse_args( $atts, array(
		'icons'    => [],
		'need'     => [],
		'template' => '',
	) );

	$icons_layout = [];
	//pr($atts['need']);
	foreach ( $atts['need'] as $name ) {
		if ( ! empty( $atts['icons'][ $name ] ) ) {
			$item = $atts['template'];

			foreach ( $atts['icons'][ $name ] as $key => $value ) {
				if ( $key == 'image' ) {
					$value = get_stylesheet_directory_uri() . '/images/' . $value;
				}
				$item = str_replace( '%' . $key . '%', $value, $item );
			}
			$icons_layout[] = $item;
		}
	}

	$icons_layout = implode( '', $icons_layout );

	return $icons_layout;
}

function oi_howto( $data ) {
	$howto = $data['howto'];

	$template__step  = '<div class="howto__step %class%">
						
						<div class="howto__step-image %class%-image" style="background-image: url(%image%);"></div>
						<div class="howto__step-title %class%-title">%title%</div>
					</div>';
	$template__card  = '<div class="howto__card">
				<div class="howto__card-title"><div class="howto__card-in-title">%title%</div></div>
				<div class="howto__card-description"><div class="howto__card-in-description">%description%</div></div>
				%list%
				<div class="howto__steps">
					%steps%
				</div>
			</div>';
	$template__howto = '<section>
		<div class="howto">
			<h2 class="howto__title">%title%</h2>
			<div class="howto__cards">%cards%</div>
		</div>
	</section>';

	$cards = '';
	$count = sizeof( $howto['cards'] );
	$i     = 1;
	foreach ( $howto['cards'] as $card ) {
		$steps = '';
		$class = '';
		if ( ! empty( $card['class'] ) ) {
			$class = $card['class'];
		}

		if ( ! empty( $card['steps'] ) ) {
			$card['steps'] = edu_steps( $card['steps'] );
			foreach ( $card['steps'] as $step ) {
				if ( ! isset( $step['steps_visibility'] ) || ( isset( $step['steps_visibility'] ) && $step['steps_visibility'] !== false ) ) {
					$steps .= get_oitemp( $template__step, array(
						'class' => $class,
						'title' => $step['title'],
						'image' => get_stylesheet_directory_uri() . '/images/svg/' . $step['image'],
						'style' => ' style="background: rgba(33,150,243,1);"',
					) );

				}
			}
		} else {
			$steps .= '<div class="howto__step %class%">
<div class="howto__step-image %class%-image"></div>
						<div class="howto__step-title %class%-title">&nbsp;</div>
</div>';
		}
		$list = '';
		if ( ! empty( $card['list'] ) ) {
			if ( $i % 2 === 0 ) {
				$list_class = '-2n';
			} else {
				$list_class = '';
			}
			foreach ( $card['list'] as $item ) {
				$list .= '<li class="howto__list-item' . $list_class . '"><span class="howto__list-in-item' . $list_class . '">' . $item . '</span></li>';
			}

			$list = '<ul class="howto__list' . $list_class . '">' . $list . '</ul>';
		}
		$cards .= get_oitemp( $template__card, array(
			'class'       => $class,
			'title'       => $card['title'],
			'description' => $card['description'],
			'width'       => ( 100 / $count ),
			'list'        => $list,
			'steps'       => $steps,
		) );
		$i ++;
	}

	$stag = floor( $data['total_monthes'] / 2 );
	if ( $stag == 0 ) {
		$stag ++;
	}
	$cards = get_oitemp( $cards, array(
		'total_monthes_words' => $data['total_monthes_words'],
		'stag'                => oi_declension( $stag, array(
			'месяц',
			' месяца',
			'месяцев',
		) ),
	) );

	$howto_layout = get_oitemp( $template__howto, array(
		'title' => $howto['title'],
		//'description' => $howto['description'],
		'cards' => $cards,
	) );

	return $howto_layout;
}


function oi_education_program( $atts ) {


	$template__program = '
<div class="zebra__element">
	<div class="container-fluid zebra__container">
		<div class="program">
			<div class="program__image" style="background-image: url(%image%);"></div>
			<div class="program__data">
				<h3 class="program__title">%title%</h3>
				<ul class="program__list">%list%</ul>
			</div>
			<div class="program__info">
				<div class="program__lessons">%length%</div>
			</div>
		</div>
	</div>
</div>
';

	$template__program_element = '<li class="program__element">%item%</li>';


	$data = [
		'program__block' => '',
		'total_lessons'  => 0,
	];

	$atts['howto']['cards'][0]['steps'] = edu_steps( $atts['howto']['cards'][0]['steps'] );


	foreach ( $atts['howto']['cards'][0]['steps'] as $step ) {
		$program__list = '';
		foreach ( $step['program'] as $item ) {
			$program__list .= get_oitemp( $template__program_element, array(
				'item' => $item,
			) );
		}

		$data['program__block'] .= get_oitemp( $template__program, array(
			'list'   => $program__list,
			'title'  => $step['title'],
			'length' => oi_declension( $step['length'], array( 'занятие', ' занятия', 'занятий', ) ),
			'image'  => get_stylesheet_directory_uri() . '/images/svg/' . $step['image'],
		) );
		$data['total_lessons']  += $step['length'];
	}

	$data['total_monthes']       = $data['total_lessons'] / ( $atts['weeks_per_month'] * $atts['lessons_per_week'] );
	$data['total_hours']         = $data['total_lessons'] * $atts['hours_per_lesson'];
	$data['total_monthes_words'] = oi_declension( $data['total_monthes'], array( 'месяц', ' месяца', 'месяцев', ) );

	return $data;
}

function oi_set_course_in_form() {
	global $data;
	$name = $data['post_name'];
	?>
	<script>
		jQuery( document ).ready( function () {
			function oi_set_course_in_form() {
				var select = jQuery( document.body ).find('#nf-form-<?php echo $data['ninja_form_id']; ?>-cont select');

				//if ( select != '' || select != undefined ) {
					select.val( '<?php echo $name; ?>' );
				//}
			}

			oi_set_course_in_form();
		} );
	</script>
	<?php
}

add_action( 'wp_footer', 'oi_set_course_in_form', 100 );