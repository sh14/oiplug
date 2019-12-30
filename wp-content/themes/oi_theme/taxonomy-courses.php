<?php
global $post;
get_header(); ?>

	<div class="container">
		<h1 class="h1 block__title">Курсы</h1>
		<?php

		if ( have_posts() ) {
			$template = get_oinput( array(
				'type'       => 'html',
				'link_start' => '<a href="%article__link%" class="article%_mixin%__link" title="%article__title%">',
				'link_end'   => '</a>',
				'html'       => oi_get_template_part( 'templates/content-archive' ),
			) );

			$template_info = oi_get_template_part( 'templates/blocks/article-info' );

			while ( have_posts() ) {
				the_post();
				?>
				<div class="col-md-4 col-sm-6 col-xs-12">

					<?php
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

					the_oinput( array(
						'type'                              => 'html',
						'block_class'                       => 'class="article box_shadow"',
						'_mixin'                            => $_mixin,
						'article' . $_mixin . '__title'     => get_the_title(),
						'article' . $_mixin . '__link'      => get_permalink(),
						'article' . $_mixin . '__image'     => $article__image,
						'article' . $_mixin . '__thumbnail' => $article__thumbnail,
						'article' . $_mixin . '__meta'      => $article__meta,
						'article' . $_mixin . '__content'   => '',
						'html'                              => $template,
					) );
					?>

				</div>
				<?php
			}
			
			the_posts_pagination();

		} else {

			get_404_template();

		}/**/
		?>
	</div>

<?php get_footer(); ?>