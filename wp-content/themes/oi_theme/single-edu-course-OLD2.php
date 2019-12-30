<?php
/*
 * Template Name: Курс по разработке 2
 * Template Post Type: edu
 */
global $post, $data;
//pr( $post );

oi_get_template_part( 'inc/edu-steps' );

$hour_price = 900;

$icons = array(
	'ajax'         => array( 'name' => 'ajax', 'image' => 'svg/ajax.svg', ),
	'angular'      => array( 'name' => 'angular', 'image' => 'svg/angular.svg', ),
	'backbone'     => array( 'name' => 'backbone', 'image' => 'svg/backbone.svg', ),
	'bootstrap'    => array( 'name' => 'bootstrap', 'image' => 'svg/bootstrap.svg', ),
	'bower'        => array( 'name' => 'bower', 'image' => 'svg/bower.svg', ),
	'coffeescript' => array( 'name' => 'coffeescript', 'image' => 'svg/coffeescript.svg', ),
	'css3'         => array( 'name' => 'css3', 'image' => 'svg/css3.svg', ),
	'ember'        => array( 'name' => 'ember', 'image' => 'svg/ember.svg', ),
	'grunt'        => array( 'name' => 'grunt', 'image' => 'svg/grunt.svg', ),
	'gulp'         => array( 'name' => 'gulp', 'image' => 'svg/gulp.svg', ),
	'git'          => array( 'name' => 'git', 'image' => 'svg/git.svg', ),
	'handlebars'   => array( 'name' => 'handlebars', 'image' => 'svg/handlebars.svg', ),
	'html5'        => array( 'name' => 'html5', 'image' => 'svg/html5.svg', ),
	'jasmine'      => array( 'name' => 'jasmine', 'image' => 'svg/jasmine.svg', ),
	'javascript'   => array( 'name' => 'javascript', 'image' => 'svg/javascript.svg', ),
	'jquery'       => array( 'name' => 'jquery', 'image' => 'svg/jquery.svg', ),
	'knockoutjs'   => array( 'name' => 'knockoutjs', 'image' => 'svg/knockoutjs.svg', ),
	'less'         => array( 'name' => 'less', 'image' => 'svg/less.svg', ),
	'marionette'   => array( 'name' => 'marionette', 'image' => 'svg/marionette.svg', ),
	'materialize'  => array( 'name' => 'materialize', 'image' => 'svg/materialize.svg', ),
	'mongodb'      => array( 'name' => 'mongodb', 'image' => 'svg/mongodb.svg', ),
	'nodejs'       => array( 'name' => 'nodejs', 'image' => 'svg/nodejs.svg', ),
	'npm'          => array( 'name' => 'npm', 'image' => 'svg/npm.svg', ),
	'polymer'      => array( 'name' => 'polymer', 'image' => 'svg/polymer.svg', ),
	'react'        => array( 'name' => 'react', 'image' => 'svg/react.svg', ),
	'sass'         => array( 'name' => 'sass', 'image' => 'svg/sass.svg', ),
	'stylus'       => array( 'name' => 'stylus', 'image' => 'svg/stylus.svg', ),
	'webpack'      => array( 'name' => 'webpack', 'image' => 'svg/webpack.svg', ),
	'yeoman'       => array( 'name' => 'yeoman', 'image' => 'svg/yeoman.svg', ),
	'zurb'         => array( 'name' => 'zurb', 'image' => 'svg/zurb.svg', ),
	'php'          => array( 'name' => 'php', 'image' => 'svg/php.svg', ),
	'mysql'        => array( 'name' => 'mysql', 'image' => 'svg/mysql.svg', ),
);
$data  = array();

switch ( $post->post_name ) {
	case 'web-developer':
		$data = array(
			'alt_title'     => 'Full-stack разработчик',
			'ninja_form_id'     => 5,
			'description'       => 'Профессиональная разработка сайтов по современным стандартам',
			// востребованность
			'needed'            => 5,
			// сложность
			'difficulty'        => 2,
			'srednyaa_zp'       => '101 000' . '₽/мес',
			'thumb'             => get_the_post_thumbnail_url( $post->ID, 'full' ),
			'salary__image'     => 'images/web-developer__salary.png',
			'salary_url'        => 'yandex.ru/job/',
			'hours_per_lesson'  => 2,
			'lessons_per_week'  => 2,
			'weeks_per_month'   => 4,
			'total_lessons'     => 0,
			'key_skills'        => array(
				'htmlcss',
				'javascript',
				'jquery',
				'ajax',
				'mysql',
				'php',
				'git',
			),
			'need'              => [
				'html5',
				'css3',
				'less',
				'bootstrap',
				'php',
				'javascript',
				'jquery',
				'ajax',
				'git',
			],
			'itog'              => array(
				'htmlcss',
				'javascript',
				'jquery',
				'ajax',
				'mysql',
				'php',
				'git',
			),
			'about_description' => array(
				array(
					'image'       => '',
					'title'       => 'Востребованная профессия',
					'description' => 'Разработчики нужны всем - от малого бизнеса до корпораций, так как сайты нужны всем и их постоянно надо разрабатывать, поддерживать и улучшать.',
				),
				array(
					'image'       => '',
					'title'       => 'Перспективы развития',
					'description' => 'В современном мире разработчик - одна из тех профессий, обладатель которой может позволить себе работать удаленно, давая возможность сотрудничать с несколькими компаниями.',
				),
				array(
					'image'       => '',
					'title'       => 'Популярность технологий',
					'description' => 'Большинством технологий, которыми вы овладеете, пользуются все без исключения сайты, что создает огромный спрос на специалистов.',
				),
			),
		);

		$data = array_merge( $data, (array) $post );


		$data['salary'] = 'Средняя зарплата по Москве и МО<br/>для «' . $data['alt_title'] . '» ' . $data['srednyaa_zp'];

		$data['howto'] = array(
			'title' => 'Как стать full-stack разработчиком?',
			//''=>'',
			'cards' => array(
				array(
					'class'       => 'howto__way',
					'title'       => '%total_monthes_words% обучения и практики',
					'description' => 'Вместо лекций проводятся практические семинары',
					'steps'       => 'htmlcss,mysql,php, javascript, jquery, ajax',
				),
				array(
					'title'       => '%stag% стажировки',
					'description' => '68% выпускников начинают работать в процессе обучения',
					'list'        => array(
						'Верстка',
						'Разработка интерактива',
						'Асинхроннная загрузка данных',
						'Разработка динамических страниц',
						'Разработка и реализация проекта в команде',
					),
					'steps'       => 'git',
				),
				array(
					'title'       => 'Результат',
					'description' => 'К концу обучения вы будете специалистом с реальным опытом и стажем',
					'list'        => array(
						'Резюме',
						'Портфолио',
						'Сертификат',
						'Опыт работы в команде',
						'Навык создания сайта с нуля',
						'Полный цикл работы по созданию сайта',
					),
					'steps'       => 'teamwork',
				),
			),
		);
		break;
	case 'php':
		$data = array(
			'alt_title'     => 'Back-end разработчик PHP',
			'ninja_form_id'     => 8,
			'description'       => 'Профессиональная back-end разработка',
			// востребованность
			'needed'            => 5,
			// сложность
			'difficulty'        => 2,
			'srednyaa_zp'       => '94 000' . '₽/мес',
			'thumb'             => get_the_post_thumbnail_url( $post->ID, 'full' ),
			'salary__image'     => 'images/php__salary.png',
			'salary_url'        => 'yandex.ru/job/',
			'hours_per_lesson'  => 2,
			'lessons_per_week'  => 2,
			'weeks_per_month'   => 4,
			'total_lessons'     => 0,
			'key_skills'        => array(
				'mysql',
				'php',
				'git',
			),
			'need'              => [
				'mysql',
				'php',
				'git',
			],
			'itog'              => array(
				'mysql',
				'php',
				'git',
			),
			'about_description' => array(
				array(
					'image'       => '',
					'title'       => 'Востребованная профессия',
					'description' => 'Разработчики нужны всем - от малого бизнеса до корпораций, так как сайты нужны всем и их постоянно надо разрабатывать, поддерживать и улучшать.',
				),
				array(
					'image'       => '',
					'title'       => 'Перспективы развития',
					'description' => 'В современном мире разработчик - одна из тех профессий, обладатель которой может позволить себе работать удаленно, давая возможность сотрудничать с несколькими компаниями.',
				),
				array(
					'image'       => '',
					'title'       => 'Популярность технологий',
					'description' => 'Технологии, которые вы изучите, наиболее распространены при разработке сайтов, что создает огромный спрос на специалистов.',
				),
			),
		);

		$data = array_merge( $data, (array) $post );

		$data['salary'] = 'Средняя зарплата по Москве и МО<br/>для «' . $data['alt_title'] . '» ' . $data['srednyaa_zp'];

		$data['howto'] = array(
			'title' => 'Как стать back-end разработчиком?',
			//''=>'',
			'cards' => array(
				array(
					'class'       => 'howto__way',
					'title'       => '%total_monthes_words% обучения и практики',
					'description' => 'Вместо лекций проводятся практические семинары',
					'steps'       => 'mysql,php',
				),
				array(
					'title'       => '%stag% стажировки',
					'description' => '68% выпускников начинают работать в процессе обучения',
					'list'        => array(
						'Разработка динамических страниц',
						'Разработка и реализация проекта в команде',
					),
					'steps'       => 'git',
				),
				array(
					'title'       => 'Результат',
					'description' => 'К концу обучения вы будете специалистом с реальным опытом и стажем',
					'list'        => array(
						'Резюме',
						'Портфолио',
						'Сертификат',
						'Опыт работы в команде',
						'Навык создания back-end части',
					),
					'steps'       => 'teamwork',
				),
			),
		);
		break;
	case 'javascript':
		$data = array(
			'alt_title'     => 'Front-end разработчик (JavaScript)',
			'ninja_form_id'     => 6,
			'description'       => 'Профессиональная front-end разработка',
			// востребованность
			'needed'            => 5,
			// сложность
			'difficulty'        => 2,
			'srednyaa_zp'       => '118 000' . '₽/мес',
			'thumb'             => get_the_post_thumbnail_url( $post->ID, 'full' ),
			'salary__image'     => 'images/javascript__salary.png',
			'salary_url'        => 'yandex.ru/job/',
			'hours_per_lesson'  => 2,
			'lessons_per_week'  => 2,
			'weeks_per_month'   => 4,
			'total_lessons'     => 0,
			'key_skills'        => array(
				'javascript',
				'jquery',
				'ajax',
			),
			'need'              => [
				'javascript',
				'jquery',
				'ajax',
			],
			'itog'              => array(
				'javascript',
				'jquery',
				'ajax',
			),
			'about_description' => array(
				array(
					'image'       => '',
					'title'       => 'Востребованная профессия',
					'description' => 'Front-end разработчик - невероятно популярен, так как независимо от back-end части на front-end используются одни и теже технологии основанные на JavaScript!',
				),
				array(
					'image'       => '',
					'title'       => 'Перспективы развития',
					'description' => 'JavaScript является не только языком, на котором разрабатывают front-end, но также на нем пишут и back-end, что расширяет возможности разработчика и увеличивает его заработок.',
				),
				array(
					'image'       => '',
					'title'       => 'Популярность технологий',
					'description' => 'Технологии, которые вы изучите, с каждым днем становятся популярнее, некоторые даже предсказывают, что скоро все сайты будут написаны исключительно на JavaScript.',
				),
			),
		);

		$data = array_merge( $data, (array) $post );

		$data['salary'] = 'Средняя зарплата по Москве и МО<br/>для «' . $data['alt_title'] . '» ' . $data['srednyaa_zp'];

		$data['howto'] = array(
			'title' => 'Как стать front-end разработчиком?',
			//''=>'',
			'cards' => array(
				array(
					'class'       => 'howto__way',
					'title'       => '%total_monthes_words% обучения и практики',
					'description' => 'Вместо лекций проводятся практические семинары',
					'steps'       => 'javascript,jquery,ajax',
				),
				array(
					'title'       => '%stag% стажировки',
					'description' => '68% выпускников начинают работать в процессе обучения',
					'list'        => array(
						'Разработка интерактива',
						'Асинхроннная загрузка данных',
					),
					'steps'       => '',
				),
				array(
					'title'       => 'Результат',
					'description' => 'К концу обучения вы будете специалистом с реальным опытом и стажем',
					'list'        => array(
						'Резюме',
						'Портфолио',
						'Сертификат',
						'Навык создания front-end части',
					),
					'steps'       => 'teamwork',
				),
			),
		);
		break;
	case 'html-css':
		$data = array(
			'alt_title'     => 'HTML верстальщик',
			'ninja_form_id'     => 7,
			'description'       => 'Профессиональная верстка',
			// востребованность
			'needed'            => 5,
			// сложность
			'difficulty'        => 1,
			'srednyaa_zp'       => '64 000' . '₽/мес',
			'thumb'             => get_the_post_thumbnail_url( $post->ID, 'full' ),
			'salary__image'     => 'images/htmlcss__salary.png',
			'salary_url'        => 'yandex.ru/job/',
			'hours_per_lesson'  => 2,
			'lessons_per_week'  => 2,
			'weeks_per_month'   => 4,
			'total_lessons'     => 0,
			'key_skills'        => array(
				'htmlcss',
			),
			'need'              => [
				'html5',
				'css3',
				'less',
				'bootstrap',
			],
			'itog'              => array(
				'html5',
				'css3',
				'less',
			),
			'about_description' => array(
				array(
					'image'       => '',
					'title'       => 'Востребованная профессия',
					'description' => 'Верстальщики нужны всем - от малого бизнеса до корпораций, так как ни один сайт не обходится без верстки.',
				),
				array(
					'image'       => '',
					'title'       => 'Перспективы развития',
					'description' => 'В современном мире верстальщик - одна из тех профессий, обладатель которой может позволить себе работать удаленно, давая возможность сотрудничать с несколькими компаниями.',
				),
				array(
					'image'       => '',
					'title'       => 'Популярность технологий',
					'description' => 'Технологии, которые вы изучите, используют все. Это создает огромный спрос.',
				),
			),
		);

		$data = array_merge( $data, (array) $post );

		$data['salary'] = 'Средняя зарплата по Москве и МО<br/>для «' . $data['alt_title'] . '» ' . $data['srednyaa_zp'];

		$data['howto'] = array(
			'title' => 'Как стать верстальщиком?',
			//''=>'',
			'cards' => array(
				array(
					'class'       => 'howto__way',
					'title'       => '%total_monthes_words% обучения и практики',
					'description' => 'Вместо лекций проводятся практические семинары',
					'steps'       => 'htmlcss,less',
				),
				array(
					'title'       => '%stag% стажировки',
					'description' => '68% выпускников начинают работать в процессе обучения',
					'list'        => array(
						'Разработка динамических страниц',
						'Использование препроцессоров',
					),
					'steps'       => '',
				),
				array(
					'title'       => 'Результат',
					'description' => 'К концу обучения вы будете специалистом с реальным опытом и стажем',
					'list'        => array(
						'Резюме',
						'Портфолио',
						'Сертификат',
					),
					'steps'       => 'teamwork',
				),
			),
		);
		break;
}

$data = array_merge( $data, oi_education_program( [
	'howto'            => $data['howto'],
	'hours_per_lesson' => $data['hours_per_lesson'],
	'lessons_per_week' => $data['lessons_per_week'],
	'weeks_per_month'  => $data['weeks_per_month'],
	'total_lessons'    => $data['total_lessons'],
] ) );

get_header();
?>
	<svg height="0" style="position: absolute; width: 0; height: 0;" version="1.1" width="0"
	     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<defs>
			<symbol id="icon-star" viewbox="0 0 32 32"><title>star</title>
				<path class="path1"
				      d="M16 26.52l-8.82 4.62c-0.131 0.068-0.286 0.107-0.451 0.107-0.552 0-1-0.448-1-1 0-0.052 0.004-0.103 0.012-0.153l1.679-9.814-7.12-6.94c-0.185-0.182-0.299-0.434-0.299-0.713 0-0.495 0.36-0.907 0.833-0.986l9.866-1.441 4.4-8.94c0.169-0.326 0.504-0.544 0.89-0.544s0.721 0.219 0.887 0.538l4.403 8.946 9.86 1.44c0.47 0.087 0.822 0.495 0.822 0.984 0 0.271-0.108 0.516-0.282 0.696l-7.14 6.96 1.68 9.82c0.007 0.044 0.011 0.095 0.011 0.147 0 0.552-0.448 1-1 1-0.164 0-0.32-0.040-0.457-0.11z"></path>
			</symbol>
		</defs>
	</svg>
	<style>
	</style>

<?php

?>
	<section>
		<div class="edu-top" style="background-image: url(<?php echo $data['thumb']; ?>);">
			<div class=" edu-top__container">
				<div class="edu-top__preheader">Профессия</div>
				<h1 class="edu-top__header"><?php echo $data['alt_title']; ?></h1>
				<div class="edu-top__description"><?php echo $data['description']; ?></div>
				<div class="edu-top__meta">
					<div class="edu-meta">
						<div class="edu-meta__list">
							<div class="edu-meta__item">
								<div class="edu-meta__header">
									<?php echo rating_stars( $data['needed'] ); ?>
								</div>
								<div class="edu-meta__decription">Востребованность</div>
							</div>
							<div class="edu-meta__item">
								<div class="edu-meta__header">
									<?php echo rating_stars( $data['difficulty'] ); ?>
								</div>
								<div class="edu-meta__decription">Сложность</div>
							</div>
							<div class="edu-meta__item">
								<div class="edu-meta__header"><?php echo $data['total_monthes_words']; ?></div>
								<div class="edu-meta__decription">Длительность</div>
							</div>
							<div class="edu-meta__item">
								<div class="edu-meta__header"><?php echo $data['srednyaa_zp']; ?></div>
								<div class="edu-meta__decription">Средняя зарплата</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php


$out   = '';
$count = sizeof( $data['about_description'] );
foreach ( $data['about_description'] as $item ) {
	switch ( $count ) {
		case $count % 3 == 0:
			$class = 'col-md-4 col-sm-4 col-xs-12';
			break;
		case $count % 4 == 0:
			$class = 'col-md-3 col-sm-6 col-xs-12';
			break;
		default:
			$class = 'col-md-12 col-sm-12 col-xs-12';
	}

	$out .= '<div class="' . $class . '">' .
	        '<div class="card">' .
	        '<img src="' . $item['image'] . '" alt="" class="card__image">' .
	        '<h3 class="card__title">' . $item['title'] . '</h3>' .
	        '<div class="card__text">' . $item['description'] . '</div>' .
	        '</div>' .
	        '</div>';
}
?>
	<section>
		<div class="block-description">
			<div class="container">
				<h2 class="block-description__title">О профессии</h2>
				<div class="row">
					<?php echo $out; ?>
				</div>
			</div>
		</div>
	</section>


	<section>
		<div class="salary">
			<div class="container">
				<h2 class="salary__title"><?php echo $data['salary']; ?></h2>

				<div class="browser">
					<div class="browser__container">
						<div class="browser__header">
							<div class="browser__buttons">
								<div class="browser__close"></div>
								<div class="browser__mini"></div>
								<div class="browser__wide"></div>
							</div>
							<div class="browser__field">
								<div class="browser__plus"></div>
								<div class="browser__text"><?php echo $data['salary_url']; ?></div>
								<div class="browser__reload"></div>
							</div>
						</div>
						<div class="browser__content">
							<img width="1280" height="853"
							     src="<?php echo get_stylesheet_directory_uri() . '/' . $data['salary__image']; ?>"/>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
<?php


?>

<?php echo oi_howto( $data ); ?>

	<section>
		<div class="online">
			<div class="online__back"></div>
			<div class="online__container container">
				<div class="online__row row">
					<div class="col-md-6 col-sm-6 col-xs-12 online__info">
						<h2 class="online__title">Комфортное обучение</h2>
						<h3 class="online__sub-title">Занятия проводятся Online</h3>
						<ul class="online__list">
							<li class="online__element">Вы занимаетесь у себя дома в комфортной обстановке;</li>
							<li class="online__element">Не нужно куда-то ехать и терять время на поездку;</li>
							<li class="online__element">Вы работаете на своем компьютере, где все настроено так, как
								удобно вам;
							</li>
							<li class="online__element">В любое время можно пересмотреть урок, так как ведется запись
								занятий;
							</li>
							<li class="online__element">Общение в реальном времени - вы видите экран преподавателя,
								слышите его голос и можете задавать вопросы;
							</li>
						</ul>
						<ol class="online__list">
							<li class="online__element">Первая часть занятия - теория</li>
							<li class="online__element">Вторая часть занятия - практика</li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 online__image"></div>
				</div>
			</div>
		</div>
	</section>


	<section>
		<div class="timetable">
			<div class="timetable__container">
				<h2 class="timetable__title">Программа обучения</h2>
				<div class="timetable__description">
					<span class="timetable__caption">Длительность обучения</span>
					<span class="timetable__monthes"><?php echo $data['total_monthes_words']; ?></span>
					<span class="timetable__hours">(<?php echo oi_declension( $data['total_hours'], array(
							'час',
							' часа',
							'часов',
						) ); ?>)
					</span>
				</div>
				<div class="zebra">
					<?php
					echo $data['program__block'];
					?>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="resume">
			<h2 class="resume__title">Ваше резюме после обучения</h2>
			<div class="resume__container">
				<div class="resume__header">
					<div class="resume__photo">
						<div class="resume__photo-box"></div>
					</div>
					<div class="resume__info">
						<div class="resume__page_title">Егор Инженеров</div>
						<div class="resume__sub_title"><?php echo $data['alt_title']; ?></div>
						<div class="resume__meta">
							<div class="resume__salary">
								<div class="resume__meta_title">Желаемая зарплата</div>
								<div class="resume__meta_data"><?php echo $data['srednyaa_zp']; ?></div>
							</div>
							<div class="resume__expirience">
								<div class="resume__meta_title">Опыт работы</div>
								<div class="resume__meta_data">Менее года</div>
							</div>
						</div>
					</div>
				</div>
				<div class="resume__data">
					<div class="resume__skills">
						<h3 class="resume__skills_title">Ключевые навыки</h3>
						<ul class="resume__list">
							<?php
							$steps = edu_steps( $data['key_skills'] );
							foreach ( $steps as $step ) {
								if ( ! empty( $step['skills'] ) ) {
									foreach ( $step['skills'] as $skill ) {
										echo '<li class="resume__element">' . $skill . ';</li>';
									}
								}
							}
							?>
						</ul>
					</div>
					<div class="resume__qualities"></div>
					<div class="resume__technologies">
						<div class="technologies">
							<h3 class="technologies__title">Владение технологиями</h3>
							<div class="container-fluid">
								<div class="row icones">
									<?php
									$class = '';
									$count = sizeof( $data['need'] );
									switch ( $count ) {
										case $count % 3 == 0:
											$class = 'col-md-4 col-sm-4 col-xs-4';
											break;
										case $count % 4 == 0:
											$class = 'col-md-3 col-sm-3 col-xs-3';
											break;
										default:
											$class = 'col-md-12 col-sm-12 col-xs-12';
									}

									echo oi_icons_layout( [
										'icons'    => $icons,
										'need'     => $data['need'],
										'template' => '<div class="' . $class . ' icones__item"><div class="icones__icon" style="background-image: url(%image%);"></div><div class="icones__name">%name%</div></div>',
									] );
									?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section>
		<div class="itog">
			<div class="itog__container container-fluid">
				<div class="itog__row row">
					<div class="itog__back"></div>
					<div class="itog__info col-xs-12 col-sm-6 col-md-6">
						<h2 class="itog__title">Вы получаете</h2>
						<ul class="itog__list">
							<li class="itog__element">
								<?php echo $data['total_monthes_words']; ?> - обучение с практикой и опытом работы в
								команде:
								<ul class="itog__sub_list">
									<?php
									$steps = edu_steps( $data['itog'] );

									foreach ( $steps as $step ) {
										$program__list = '';
										if ( ! empty( $step['description'] ) ) {
											echo '<li class="itog__sub_element">' . $step['description'] . '</li>';
										}

									}
									?>
								</ul>
							</li>
							<li class="itog__element">Стажировка во время обучения;</li>
							<li class="itog__element">Видеозаписи всех занятий и материалы по ним;</li>
							<li class="itog__element">Домашние задания и их решения;</li>
							<li class="itog__element">Резюме;</li>
							<li class="itog__element">Портфолио;</li>
							<li class="itog__element">Сертификаты о прохождении обучения.</li>
						</ul>
					</div>
					<div class="itog__form col-xs-12 col-sm-6 col-md-6">
						<h2 class="itog__title">Запишитесь на курс прямо сейчас</h2>
						<div class="itog__form">
							<div class="itog__price">
								<div class="itog__price_value">
									<?php echo number_format( ( $hour_price * $data['hours_per_lesson'] * $data['lessons_per_week'] * $data['weeks_per_month'] ), 0, ',', "'" ) . '<span class="itog__price_sign">₽/месяц</span>'; ?>
								</div>
								<div class="itog__price_title">Стоимость курса</div>
							</div>
							<?php
							//$data['ninja_form_id'] = 5;
							echo do_shortcode( '[ninja_form id=' . $data['ninja_form_id'] . ']' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="group-vk">
			<div class="container">
				<?php echo do_shortcode( '[vkgroup title="Получите скидку <b>5%</b>" text="Чтобы получить скидку надо быть подписчиком нашей группы. Для этого достаточно всего-лишь нажать кнопку “Подписаться”"]' ); ?>
			</div>
		</div>
	</section>

	<section>
		<div class="course-reviews"></div>
	</section>


	<div class="recent">
		<div class="container">
			<?php


			/** @noinspection PhpUndefinedClassInspection */
			$query = new WP_Query( array(
				'post_type'      => 'edu',
				'post_status'    => 'publish',
				'posts_per_page' => 10,
				//'post__in'       => array( 3396, 3054 ),
				//'post_parent'    => '',
			) );
			$out   = '';

			if ( $query->have_posts() ) {

				$template = oinput( array(
					'type'       => 'html',
					'link_start' => '<a href="%article__link%" class="article%_mixin%__link" title="%article__title%">',
					'link_end'   => '</a>',
					'html'       => oi_get_template_part( 'templates/content-archive' ),
				) );

				$template_info = oi_get_template_part( 'templates/blocks/article-info' );

				while ( $query->have_posts() ) {
					$query->the_post();
					$post_id = get_the_ID();

					$article__image = get_srcset_img( array(
							'post_id' => $post_id,
							'class'   => '',
						)
					);

					// получение миниатюры поста текущего размера миниатюры
					$article__thumbnail = article__thumbnail( array(
						'post_id'    => $post_id,
						'image_size' => 'large',
						'image'      => $article__image,
					) );

					$_mixin = '';

					$article__terms = article__terms( array(
						'_mixin'        => $_mixin,
						'post_id'       => $post_id,
						'term_taxonomy' => 'courses',
					) );

					// получение данных по курсу
					$meta = oi_courses_meta( $post_id );

					$article__meta = get_oinput( array(
						'type'                          => 'html',
						'_mixin'                        => $_mixin,
						'article' . $_mixin . '__terms' => $article__terms,
						'info'                          => oi_template_info( [
							'template' => $template_info,
							'data'     => $meta,
							'_mixin'     => $_mixin,
						] ),
						'html'                          => oi_get_template_part( 'templates/archive-meta-courses' ),
					) );


					$out .= get_oinput( array(
						'type'                              => 'html',
						'block_class'                       => 'class="article box_shadow"',
						'_mixin'                            => $_mixin,
						'article' . $_mixin . '__title'     => get_the_title(),
						'article' . $_mixin . '__link'      => get_permalink(),
						'article' . $_mixin . '__image'     => $article__image,
						'article' . $_mixin . '__thumbnail' => $article__thumbnail,
						'article' . $_mixin . '__meta'      => $article__meta,
						'article' . $_mixin . '__content'   => '',
						'html'                              => '<div class="col-md-4 col-sm-6 col-xs-12">' . $template . '</div>',
					) );
				}
				wp_reset_postdata();
				?>
				<div class="row">
					<div class="col-md-4 col-sm-12 col-xs-12">
						<?php
						the_oinput( array(
							'type'    => 'html',
							'class'   => 'start article ',
							'title'   => 'Курсы',
							'content' => '<p>Пройдите обучение на наших курсах, чтобы стать специалистом в новой для себя области или
								расширить знания.</p>',
							//'btn'     => '<a href="#" class="btn btn-primary btn-block">Все курсы</a>',
							'btn'     => '',
							'html'    => oi_get_template_part( 'templates/start' ),
						) )
						?>
					</div>
					<?php echo $out; ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>

<?php


get_footer();
