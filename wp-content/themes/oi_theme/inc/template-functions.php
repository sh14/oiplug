<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 13.12.16
 * Time: 9:54
 */

/**
 * @param $atts
 *
 * @return string
 */
function article__thumbnail( $atts ) {
	$atts = shortcode_atts( array(
		'post_id'    => 0,
		'image_size' => 'medium',
		'image'      => '',
		'size'       => '',
		'position'   => '',
		'repeat'     => '',
	), $atts );

	// если указан id поста и не указана ссылка на изображение
	if ( $atts['post_id'] > 0 && empty( $atts['image'] ) ) {

		// получение миниатюры поста текущего размера миниатюры
		$atts['image'] = wp_get_attachment_image_src( get_post_thumbnail_id( $atts['post_id'] ), $atts['image_size'] );
	}

	// список атрибутов, которые надо перебрать
	$bg_attributes = array('size', 'position', 'repeat', 'image',);

// определение переменной содержащей стили
	$styles = '';

	// перебор атрибутов
	foreach ( $bg_attributes as $attribute ) {

		// если атрибут не пуст
		if ( ! empty( $atts[ $attribute ] ) ) {

			// если атрибут равен image
			if ( $attribute == 'image' ) {

				// дописывается строка стиля, определяещего изображение
				$styles .= 'background-image:url(' . $atts['image'][0] . ');';
			} else {

				// дописывается строка стиля, соответствующего атрибуту
				$styles .= 'background-' . $attribute . ':' . $atts[ $attribute ] . ';';
			}
		}
	}

	// если стили не пусты
	if ( ! empty( $styles ) ) {

		// добавляется атрибут тега style
		$styles = ' style="' . $styles . '"';
	} else {
		$styles = '';
	}

	return $styles;
}

/**
 * Подключение шаблона автора
 *
 * @param $atts
 *
 * @return bool|string
 */
function author_template( $atts ) {
	$atts = shortcode_atts( array(
		'author_id' => 0,
		'html'      => '',
	), $atts );

	$author_template = '';

	if ( $atts['author_id'] == 0 || empty( $atts['html'] ) ) {
		return $author_template;
	}

	$author__link = get_author_posts_url( $atts['author_id'] );


	/*
	$author__name = get_the_author();
	*/

	$author__name = array();

	$author__name[] = get_user_meta( $atts['author_id'], 'first_name', true );
	$author__name[] = get_user_meta( $atts['author_id'], 'last_name', true );

	$author__name = implode( ' ', $author__name );

	$author__image   = oi_get_avatar( array(
		'user_id'      => $atts['author_id'],
		'class'        => 'author__image',
		'author__name' => $author__name,
	) );
	$author_template = get_oinput( array(
		'type'          => 'html',
		'author__link'  => $author__link,
		'author__image' => $author__image,
		'author__name'  => $author__name,
		'html'          => $atts['html'],
	) );

	return $author_template;
}

/**
 * Шаблон метаданных
 *
 * @param $atts
 *
 * @return string
 */
function article__meta( $atts ) {
	$article__meta = get_oinput( array(
		'type'           => 'html',
		'_mixin'         => ! empty( $atts['_mixin'] ) ? $atts['_mixin'] : '',
		'author'         => $atts['author'],
		'article__terms' => $atts['article__terms'],
		'html'           => $atts['html'],
	) );

	return $article__meta;
}

function article__terms( $atts ) {
	$atts  = shortcode_atts( array(
		'post_id'       => get_the_ID(),
		'term_taxonomy' => 'category',
		'_mixin'        => '',
	), $atts );
	$terms = wp_get_post_terms( get_the_ID(), $atts['term_taxonomy'] );

	$term_links = array();
	foreach ( $terms as $term ) {
		$term = (array) $term;
		if ( ! empty( $term['term_id'] ) ) {
			$term_links[] = '<a href="' .
			                get_term_link( $term['term_id'] ) .
			                '" class="article' . $atts['_mixin'] .
			                '__term-link" rel="category tag">' .
			                $term['name'] .
			                '</a>' .
			                //'<div class="hidden">' . get_the_ID() . '</div>'.
			                '';
		}
	}
	$article__terms = implode( '', $term_links );

	return $article__terms;
}

function start_class( $i ) {
	if ( $i % 2 == 0 ) {
		$out = 'start-white';
	} else {
		$out = '';
	}

	return $out;
}

/**
 * Функция возврата сформированного блока start
 *
 * @param $atts
 *
 * @return bool|string
 */
function get_oi_start( $atts ) {
	$atts = shortcode_atts( array(
		'class'   => '',
		'title'   => '',
		'content' => '',
		'btn'     => '',
	), $atts );

	$out = '';
	if ( ! empty( $atts['title'] ) ) {
		$out = get_oinput( array(
			'type'    => 'html',
			'class'   => 'start article ' . $atts['class'],
			'title'   => $atts['title'],
			'content' => $atts['content'],
			'btn'     => $atts['btn'],
			'html'    => oi_get_template_part( 'templates/start' ),
		) );
	}

	return $out;
}

/* Тут должны храниться функции, вызывающие шаблоны */
function get_oi_posts( $atts ) {
	global $post;

	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
	$atts  = shortcode_atts( array(
		'args'               => array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => get_option( 'posts_per_page' ),
			'post_parent'    => '',
			'paged'          => $paged,
		),
		'start'              => array(), // стартовый блок
		'show_content'       => false,
		'show_link'          => true,
		'show_title'         => true,
		'show_meta'          => true,
		'show_author'        => true,
		'show_pagination'    => true,
		'template-article'   => 'templates/content-archive',
		'template-author'    => 'templates/author',
		'template-meta'      => 'templates/article__meta',
		'container_class'    => 'posts',
		'_mixin'             => '',
		'block_class'        => '',
		'thumb_image_class'  => 'article__image',
		'author_image_class' => 'author__image',
		'term_taxonomy'      => '',
		'thumb_size'         => 'medium',
		'col_class'          => 'col-md-3 col-sm-6 col-xs-12',
		'image_size'         => 'large',
		'image'              => '',
		'size'               => '',
		'position'           => '',
		'repeat'             => '',
	), $atts );

	if ( ! empty( $atts['start'] ) ) {
		$atts['start'] = get_oi_start( $atts['start'] );
		if ( ! empty( $atts['start'] ) ) {
			$atts['start'] = '<div class="' . $atts['col_class'] . '">' . $atts['start'] . '</div>';
		}
	} else {
		$atts['start'] = '';
	}

	$out        = '';
	$pagination = '';
	$_mixin     = $atts['_mixin'];

	$query = new WP_Query( $atts['args'] );

	if ( $query->have_posts() ) {

		// загрузка шаблона
		if ( $atts['show_meta'] === true ) {
			if ( $atts['show_author'] === true ) {
				$author_template = oi_get_template_part( $atts['template-author'] );
			} else {
				$author_template = '';
			}

			$article__meta_template = oi_get_template_part( $atts['template-meta'] );
		} else {
			$author_template        = '';
			$article__meta_template = '';
		}

		if ( $atts['show_link'] === true ) {
			$link_start = '<a href="%article__link%" class="article%_mixin%__link" title="%article__title%">';
			$link_end   = '</a>';
		} else {
			$link_start = '<a href="javascript:" class="article%_mixin%__link" title="%article__title%">';
			$link_end   = '</a>';
		}

		$content_archive = get_oinput( array(
			'type'       => 'html',
			'link_start' => $link_start,
			'link_end'   => $link_end,
			'html'       => oi_get_template_part( $atts['template-article'] ),
		) );


		while ( $query->have_posts() ) {
			$query->the_post();

			$post_id = $post->ID;

			$article__title = '';
			if ( $atts['show_title'] == true ) {
				$article__title = $post->post_title;
			}

			$article__image = get_srcset_img( array(
					'post_id' => $post_id,
					'class'   => $atts['thumb_image_class'],
				)
			);

			// получение миниатюры поста текущего размера миниатюры
			$article__thumbnail = article__thumbnail( array(
				'post_id'    => $post_id,
				'image_size' => $atts['thumb_size'],
				'image'      => $atts['image'],
				'size'       => $atts['size'],
				'position'   => $atts['position'],
				'repeat'     => $atts['repeat'],
			) );

			$article__terms = article__terms( array(
				'_mixin'        => $_mixin,
				'post_id'       => $post_id,
				'term_taxonomy' => $atts['term_taxonomy'],
			) );

			if ( $atts['show_meta'] === true ) {


				$author = author_template( array(
					'author_id' => $post->post_author,
					'html'      => $author_template,
				) );

				$article__meta = article__meta( array(
					'_mixin'         => $_mixin,
					'author'         => $author,
					'article__terms' => $article__terms,
					'html'           => $article__meta_template,
				) );
				//$article__meta = '';
			} else {

				$article__meta = '';
			}

			$block_class = ' class="' . implode( ' ', get_post_class( 'article' . $_mixin . ' ' . $atts['block_class'], $post_id ) ) . '"';

			$article__content = '';

			if ( $atts['show_content'] === true ) {
				$article__content = do_shortcode( $post->post_content );
			}

			$out .= '<div class="' . $atts['col_class'] . '">' . get_oinput(
					array(
						'type'               => 'html',
						'article__thumbnail' => $article__thumbnail,
						'block_class'        => $block_class,
						'article__link'      => get_the_permalink( $post_id ),
						'article__image'     => $article__image,
						'article__title'     => $article__title,
						'article__meta'      => $article__meta,
						'article__content'   => $article__content,
						'article__terms'     => $article__terms,
						'_mixin'             => $_mixin,
						'is_home'            => is_home(),
						'html'               => $content_archive,
					)
				) . '</div>';

		}

		/*
				if ( $atts['show_pagination'] === true ) {
					// начало буферизации вывода
					ob_start();
					$big = 999999999;
					echo paginate_links( array(
						'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1, get_query_var( 'paged' ) ),
						'total'   => $query->max_num_pages
					) );

					// вывод пагинации
					//the_posts_pagination();

					// вывод данных из буфера в переменную
					$pagination = ob_get_contents();

					// очистка буфера
					ob_end_clean();

					$pagination = '<div class="pagination">' . $pagination . '</div>';
				}
		*/
		/*
		?>
		<div id="pagination" class="clearfix">
			<?php
			$big = 999999999;
			echo paginate_links( array(
				'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				'format'  => '?paged=%#%',
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total'   => $query->max_num_pages
			) );
			?>
		</div>
		<?php
		*/
		wp_reset_postdata();
		$out = '<div class="' . $atts['container_class'] . ' row">' . $atts['start'] . $out . '</div>' . $pagination;
	}


	return $out;
}

function the_oi_posts( $atts ) {
	echo get_oi_posts( $atts );
}

/**
 * Функция вывода контента на странице поста
 *
 * @param $atts
 */
function single_page( $atts ) {
	global $post;

	$atts    = shortcode_atts( array(
		'term_taxonomy' => 'category',
		'_mixin'        => '-single',
		'show_meta'     => true,
		'show_author'   => true,
		'ccc'           => '',
	), $atts );
	$post_id = $post->ID;

	$content_template       = oi_get_template_part( array('file' => 'templates/content-single') );
	$author_template        = oi_get_template_part( array('file' => 'templates/author') );
	$article__meta_template = oi_get_template_part( array('file' => 'templates/article__meta') );

	$article__meta  = '';
	$article__terms = '';

	if ( $atts['show_meta'] == true ) {
		$author = '';

		if ( $atts['show_author'] == true ) {
			$author = author_template( array(
				'author_id' => $post->post_author,
				'html'      => $author_template,
			) );
		}


		$article__terms = article__terms( array(
			'_mixin'        => $atts['_mixin'],
			'post_id'       => $post_id,
			'term_taxonomy' => $atts['term_taxonomy'],
		) );

		if ( is_single() ) {
			$article__meta = article__meta( array(
				'_mixin'         => $atts['_mixin'],
				'author'         => $author,
				'article__terms' => $article__terms,
				'html'           => $article__meta_template,
			) );
		}
	}

	$article__thumbnail = article__thumbnail( array(
		'post_id'    => $post_id,
		'image_size' => 'full',
	) );

	if ( ! empty( $article__thumbnail ) ) {
		$article__link_template = oi_get_template_part( array('file' => 'templates/article__link') );
		$article__image         = get_srcset_img( array(
				'post_id' => $post_id,
				'class'   => 'hidden',
			)
		);

		$article__link = get_oinput( array(
			'type'               => 'html',
			'html'               => $article__link_template,
			'article__thumbnail' => $article__thumbnail,
			'article__link'      => get_the_permalink( $post_id ),
			'article__image'     => $article__image,
			'_mixin'             => $atts['_mixin'],
		) );
	} else {
		$article__link = '';
	}

	the_oinput( array(
		'type'             => 'html',
		'html'             => $content_template,
		'article__content' => '<div class="article' . $atts['_mixin'] . '__content">' . $atts['ccc'] . '</div>',
		'article__link'    => $article__link,
		'article__title'   => $post->post_title,
		'article__meta'    => $article__meta,
		'article__terms'   => $article__terms,
		'_mixin'           => $atts['_mixin'],
		'block_class'      => 'class="' . implode( ' ', get_post_class( 'article' . $atts['_mixin'] . ' ' ) ) . '"',
	) );
}

if ( ! function_exists( 'oi_plug_comment' ) ) {
	/**
	 * comment template
	 *
	 * @since 1.0.0
	 */
	function oi_plug_comment( $comment, $args, $depth ) {
		global $post;

		$tag       = 'li';
		$add_below = 'div-comment';

		$author_template = oi_get_template_part( array('file' => 'templates/author') );

		$author = author_template( array(
			'author_id' => get_user_by( 'email', get_comment()->comment_author_email )->ID,
			'html'      => $author_template,
		) );

		?>
		<<?php echo esc_attr( $tag ); ?><?php echo ' '; ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="comment__body row">
			<div class="comment__meta col-xs-4 col-sm-4 col-md-3">
				<div class="comment__author">
					<?php echo $author; ?>
				</div>
				<?php if ( '0' == $comment->comment_approved ) { ?>
					<div class="comment__moderation"><?php _e( 'Your comment is awaiting moderation.', 'xxx' ); ?></div>
				<?php } ?>
			</div>

			<div class="comment__content col-xs-8 col-sm-8 col-md-9">

				<div class="comment__text">
					<?php comment_text(); ?>
				</div>
				<div class="comment__bottom">
					<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>"
					   class="comment__date">
						<?php echo '<time>' . get_comment_date() . '</time>'; ?>
					</a>
					<div class="comment__reply">
						&nbsp; - &nbsp;
						<?php comment_reply_link( array_merge( $args, array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ); ?>
						<?php edit_comment_link( __( 'Edit', 'xxx' ), '  ', '' ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

/**
 * Функция вывода кнопки Call to Action
 * В паре с этой функцией работает .goTo на JS
 *
 * @param $atts
 */
function oi_cta( $atts ) {
	$atts = shortcode_atts( array(
		// ссылка
		'header' => '',
		// ссылка
		'footer' => '',
		// ссылка
		'link'   => '#',
		// текст кнопки
		'text'   => 'OK',
		// селектор для скрола к указанному элементу
		'goto'   => '',
		'style'  => 'background-image: url(https://oiplug.com/wp-content/uploads/2016/10/metoda.png);',
	), $atts );
	if ( ! empty( $atts['goto'] ) ) {
		$atts['goto'] = ' data-goto="' . $atts['goto'] . '"';
	}
	if ( ! empty( $atts['header'] ) ) {
		$atts['header'] = '<h3 class="cta__header">' . $atts['header'] . '</h3>';
	}
	if ( ! empty( $atts['footer'] ) ) {
		$atts['footer'] = '<h6 class="cta__footer">' . $atts['footer'] . '</h6>';
	}
	$out = '<div class="cta" style="' . $atts['style'] . '">' . $atts['header'] . '<div class="cta__button-box"><a href="' . $atts['link'] . '" ' . $atts['goto'] . ' class="btn btn-primary cta__button">' . $atts['text'] . '</a></div>' . $atts['footer'] . '</div>';

	return $out;
}

add_shortcode( 'cta', 'oi_cta' );

function oi_review( $atts ) {
	global $post;
	$atts  = shortcode_atts( array(
		'start_class' => 0,
		'show_start'  => false,
		'class'       => 'col-md-12 col-sm-12 col-xs-12',
		'class_start' => 'col-md-12 col-sm-12 col-xs-12',
	), $atts );
	$query = new WP_Query( array(
		'post_type'   => 'review',
		'post_status' => 'publish',
		//'posts_per_page' => 3,
		//'post_parent'    => 180,
	) );

	$out = '';

	if ( $query->have_posts() ) {

		$template = oi_get_template_part( 'templates/content-review' );

		$out = '';

		while ( $query->have_posts() ) {
			$query->the_post();
			$post_id = $post->ID;

			//$review__image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );
			$image_url = get_the_post_thumbnail_url( $post_id, 'thumbnail' );
			if ( ! empty( $image_url ) ) {
				$review__image = '<img id="' . $post_id . '" class="review__image" src="' . $image_url . '" width="150" height="150"/>';
			} else {
				$review__image = '';
			}

			$review__link = get_post_meta( $post_id, 'social_link', true );
			if ( ! empty( $review__link ) ) {
				$review__tag  = 'a';
				$review__link = 'href="' . $review__link . '"';
			} else {
				$review__tag = 'div';
			}

			$review__date = date( 'd.m.Y', strtotime( $post->post_date ) );

			$out .= get_oitemp( '<div class="' . $atts['class'] . '">' . $template . '</div>', array(
				'review__tag'     => $review__tag,
				'review__link'    => $review__link,
				'review__image'   => $review__image,
				'review__title'   => get_the_title(),
				'review__date'    => $review__date,
				'review__content' => do_shortcode( get_the_content() ),
			) );

		}
		wp_reset_postdata();
	}
	$start_class = 0;
	if ( ! empty( $out ) ) {
		$start = '';
		if ( $atts['show_start'] == true ) {
			$start = '<div class="' . $atts['class_start'] . '">' .
			         get_oinput( array(
				         'type'    => 'html',
				         'class'   => 'start article ' . start_class( $atts['start_class'] ),
				         'title'   => 'Отзывы',
				         'content' => '<p>То, что мы делаем приносит пользу, Ваши отзывы - лучшее тому подтверждение.</p>',
				         //'btn'     => '<a href="/reviews" class="btn btn-primary btn-block">Все отзывы</a>',
				         'btn'     => '',
				         'html'    => oi_get_template_part( 'templates/start' ),
			         ) ) .
			         '</div>';
		}
		$out = '<div class="reviews">' .
		       '<div class="row">' .
		       $start .
		       $out .
		       '</div>' .
		       '</div>';
	}

	return $out;
}

add_shortcode( 'review', 'oi_review' );

function oi_template_info( $atts ) {

	$out = '';
	if ( ! empty( $atts['data']['duration'] ) || ! empty( $atts['data']['price'] ) ) {
		$duration = '';
		$price    = '';
		if ( ! empty( $atts['data']['duration'] ) ) {
			$duration = $atts['data']['duration'];
		}
		if ( ! empty( $atts['data']['price'] ) ) {
			$price = $atts['data']['price'];
		}

		$out .= get_oitemp( $atts['template'], [
			'_mixin'   => $atts['_mixin'],
			'duration' => $duration,
			'price'    => $price,
		] );
	}

	return $out;
}
