<?php
global $post, $wp_query;
get_header(); ?>

	<div class="container">

		<?php

		$user            = (array) get_user_by( 'login', get_query_var( 'author_name' ) );
		$author_template = oi_get_template_part( 'templates/author' );

		$author = author_template( array(
			'author_id' => $user['ID'],
			'html'      => $author_template,
		) );

		$user_meta = get_user_meta( $user['ID'] );

		// поднятие массива вверх на уровень
		foreach ( $user_meta as $key => $value ) {
			$user_meta[ $key ] = $value[0];
		}

		$user = array_merge( $user, $user_meta );
		//pr( $user );
		if ( have_posts() ) {

			the_archive_title( '<h1 class="block__title">', '</h1>' );

			$post_id = get_the_ID();

			$atts                   = array(
				'block_class'   => 'box_shadow',
				'term_taxonomy' => 'category',
			);
			$template               = oi_get_template_part( 'templates/content-archive' );
			$author_template        = oi_get_template_part( 'templates/author' );
			$article__meta_template = oi_get_template_part( 'templates/article__meta' );
			$_mixin                 = '';
			?>
			<div class="row">
				<?php
				while ( have_posts() ) {
					the_post();


					$link_start = '<a href="%article__link%" class="article%_mixin%__link" title="%article__title%">';
					$link_start = get_oinput( array(
							'type'           => 'html',
							'_mixin'         => $_mixin,
							'article__link'  => get_permalink(),
							'article__title' => get_the_title(),
							'html'           => $link_start,
						)
					);

					$link_end = '</a>';

					$article__image = get_srcset_img( array(
							//'post_id' => $post_id,
							'class' => ! empty( $atts['thumb_image_class'] ) ? $atts['thumb_image_class'] : '',
						)
					);

					$article__terms = article__terms( array(
						'_mixin'        => $_mixin,
						'post_id'       => $post_id,
						'term_taxonomy' => $atts['term_taxonomy'],
					) );


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

					$block_class = ' class="' . implode( ' ', get_post_class( 'article' . $_mixin . ' ' . $atts['block_class'], $post_id ) ) . '"';

					?>
					<div class="col-md-4 col-sm-6 col-xs-12">

						<?php


						the_oinput( array(
							'type'               => 'html',
							'block_class'        => $block_class,
							'_mixin'             => $_mixin,
							'article__thumbnail' => article__thumbnail( array(
								'post_id'    => $post->ID,
								'image_size' => 'large',
							) ),
							'article__title'     => get_the_title(),
							'link_start'         => $link_start,
							'link_end'           => $link_end,
							'article__link'      => get_permalink(),
							'article__image'     => '',
							'article__meta'      => $article__meta,
							'article__content'   => '',
							'html'               => $template,
						) );
						?>

					</div>
					<?php
				}
				?>
			</div>
			<?php
			the_posts_pagination();

		} else {

			get_404_template();

		}
		?>
	</div>


<?php get_footer(); ?>