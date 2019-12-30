<?php
/*
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
*/
global $post, $template;

get_header();

/*
 * Переименовать -plugin в -compact
 * Сделать логотипы в компакт, но text-indent: -99999px
 *
 */
$start_class = 1;
if(1==2) {
	?>
	<section>
		<div class="block block-main">
			<div class="container">
				<?php


				/** @noinspection PhpUndefinedClassInspection */
				$query = new WP_Query( array(
					'post_type'      => 'edu',
					'post_status'    => 'publish',
					'posts_per_page' => 2,
					'category__in'   => array( 178 ), // только "Сайты на продажу"
					//'post__in'       => array( 3396, 3054 ),
					//'post_parent'    => '',
				) );
				$out   = '';

				if ( function_exists( 'oi_get_template_part' ) && $query->have_posts() ) {

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
								'_mixin'   => $_mixin,
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
						<div class="col-md-8 col-sm-12 col-xs-12">
							<?php
							the_oinput( array(
								'type'    => 'html',
								'class'   => 'start article ' . start_class( $start_class = $start_class + 1 ),
								'title'   => 'Готовые сайты',
								'content' => '<p>Готовые сайты, которые вы можете приобрести по сниженной стоимости. По поводу покупки можно обратиться в чат.</p>',
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
	</section>
	<section>
		<div class="block block-main">
			<div class="container">
				<?php


				/** @noinspection PhpUndefinedClassInspection */
				$query = new WP_Query( array(
					'post_type'        => 'edu',
					'post_status'      => 'publish',
					'posts_per_page'   => 2,
					'category__not_in' => array( 178 ), // кроме "Сайты на продажу"
					//'post__in'       => array( 3396, 3054 ),
					//'post_parent'    => '',
				) );
				$out   = '';

				if ( function_exists( 'oi_get_template_part' ) && $query->have_posts() ) {

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
								'_mixin'   => $_mixin,
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
								'class'   => 'start article ' . start_class( $start_class = $start_class + 1 ),
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
	</section>
	<?php /*
	<section>
		<div class="block">
			<div class="container">
				<?php
				the_oi_posts( array(
					'args'            => array(
						'post_type'      => 'plugins',
						'posts_per_page' => 3,
					),
					'show_meta'       => false,
					'show_pagination' => false,
					'_mixin'          => '-plugin',
					'container_class' => 'plugins',
					'term_taxonomy'   => 'plugin-type',
					'thumb_size'      => 'medium',
					'col_class'       => 'col-md-3 col-sm-6 col-xs-12',
					'start'           => array(
						'class'   => start_class( $start_class = $start_class + 1 ),
						'title'   => 'Плагины',
						'content' => '<p>Воспользуйтесь разработанными нами плагинами, для системы управления WordPress</p>',
						'btn'     => '<a href="#" class="btn btn-primary btn-block">Все плагины</a>',
					),
				) );
				?>
			</div>
		</div>
	</section>
 */ ?>
	<?php
	/*
	?>
	<?php
	*/
	?>
	<?php
	if ( function_exists( 'get_oi_posts' ) ) {
		$out = get_oi_posts( array(
			'args'            => array(
				'post_type'      => 'case',
				'posts_per_page' => 5,
				//'post_parent'    => 3430,
			),
			'empty'           => true,
			'container_class' => 'media',
			'show_meta'       => false,
			//'show_link'       => false,
			'show_pagination' => false,
			'_mixin'          => '-plugin',
			//'term_taxonomy' => 'plugin-type',
			'thumb_size'      => 'large',
			'col_class'       => 'col-md-4 col-sm-12 col-xs-12',
			'start'           => array(
				'class'   => start_class( $start_class = $start_class + 1 ),
				'title'   => 'Кейсы',
				'content' => '<p>Мы разрабатываем и внедряем комплексные решения, управляемые через веб интерфейс.</p>',
			),
		) );
	}

	if ( ! empty( $out ) ) {
		?>

		<section>
			<div class="block">
				<div class="container">
					<?php echo $out; ?>
				</div>
			</div>
		</section>
		<?php
	}
	if ( function_exists( 'get_oi_posts' ) ) {
		$out = get_oi_posts( array(
			'args'            => array(
				'post_type'      => 'page',
				'posts_per_page' => 5,
				'post_parent'    => 3430,
			),
			'empty'           => true,
			'container_class' => 'media',
			'show_meta'       => false,
			'show_link'       => false,
			'show_pagination' => false,
			'_mixin'          => '-plugin',
			//'term_taxonomy' => 'plugin-type',
			'thumb_size'      => 'large',
			'col_class'       => 'col-md-6 col-sm-6 col-xs-12',
			'start'           => array(
				'class'   => start_class( $start_class = $start_class + 1 ),
				'title'   => 'Услуги',
				'content' => '<p>Воспользуйтесь услугами, которые оказывают наши специалисты. Мы предоставляем широкий спектр услуг, полностью решая Ваши бизнес-задачи.</p>',
			),
		) );
	}
	if ( ! empty( $out ) ) {

		?>
		<section>
			<div class="block">
				<div class="container">
					<?php echo $out; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
?>
	<section>
		<div class="block">
			<div class="container">
				<?php
				if(function_exists('get_oi_posts')) {
					the_oi_posts( array(
						'args'            => array(
							'post_type'      => 'post',
							'posts_per_page' => 8,
						),
						//'show_content'     => false,
						'show_meta'       => true,
						'show_link'       => true,
						'show_pagination' => false,
						//'_mixin'        => '-plugin',
						'container_class' => 'articles',
						'block_class'     => 'box_shadow',
						'term_taxonomy'   => 'category',
						'thumb_size'      => 'large',
						'col_class'       => 'col-md-4 col-sm-12 col-xs-12',
						'start'           => array(
							'class'   => start_class( $start_class = $start_class + 1 ),
							'title'   => 'Блог',
							'btn'     => '<a href="/blog" class="btn btn-primary">Больше статей</a>',
							'content' => '<p>Следите за нашим блогом, мы публикуем полезные и интересные статьи по теме разработки сайтов и смежных тематик.</p>',
						),
					) );
				}
				?>
			</div>
		</div>
	</section>

<?php
wp_reset_postdata();

if(1==2) {
	if ( function_exists( 'oi_review' ) ) {
		$out = oi_review( array(
			'start_class' => $start_class = $start_class + 1,
			'show_start'  => true,
			'class_start' => 'col-md-4 col-sm-12 col-xs-12',
			'class'       => 'col-md-4 col-sm-6 col-xs-12',
		) );
	}
	if ( ! empty( $out ) ) {
		?>

		<section>
			<div class="block">
				<div class="container">
					<?php echo $out; ?>
				</div>
			</div>
		</section>
		<?php
	}
	?>
	<?php /* ?>
	<div class="block start-tiny <?php echo start_class( $start_class = $start_class + 1 ); ?>">
		<div class="container">
			<?php echo do_shortcode( '[oi-contact-form-7 id="207" title="Курсы PHP и MySQL" class="start" button_class="btn btn-primary btn-block"]' ); ?>
		</div>
	</div>
<?php */ ?>
	<div class="block <?php echo start_class( $start_class = $start_class + 1 ); ?>">
		<div class="container">
			<?php echo do_shortcode( '[vkgroup]' ); ?>
		</div>
	</div>
	<?php /*
	<section>
		<div class="block">
			<div class="container">
				<?php
				the_oi_posts( array(
					'args'            => array(
						'post_type'      => 'page',
						'posts_per_page' => 3,
						'post_parent'    => 153,
					),
					'container_class' => 'logos',
					'show_meta'       => false,
					'show_link'       => false,
					'show_pagination' => false,
					'_mixin'          => '-plugin',
					'size'            => 'contain',
					'block_class'     => 'article-plugin_logos',
					//'term_taxonomy' => 'plugin-type',
					'thumb_size'      => 'medium',
					'show_title'      => false,
					'col_class'       => 'col-md-3 col-sm-6 col-xs-12',
					'start'           => array(
						'class'   => start_class( $start_class = $start_class + 1 ),
						'title'   => 'Потребители',
						'content' => '<p>Наши разработки используют различные компании, среди которых есть действительно крупные!</p>',
					),
				) );
				?>
			</div>
		</div>
	</section>
*/
}
?>

<?php get_footer(); ?>
