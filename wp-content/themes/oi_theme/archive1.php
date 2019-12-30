<?php
//global $post;
get_header(); ?>

	<div class="container">
		<h1 class="block__title">Блог</h1>
		<?php

		if ( ! current_user_can( 'administrator' ) ) {
			/*
			the_oi_posts( array(
				'args'            => array(
					'post_type' => 'post',
					//'posts_per_page' => 8,
				),
				//'show_content'     => false,
				'show_meta'       => true,
				//'_mixin'        => '-plugin',
				'container_class' => 'articles',
				'block_class'     => 'box_shadow',
				//'term_taxonomy' => 'plugin-type',
				'thumb_size'      => 'medium',
				'col_class'       => 'col-md-4 col-sm-6 col-xs-12',
			) );
			*/
		} else {
			?>

			<?php if ( have_posts() ) {

				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					the_title();
					the_content();

					// End the loop.
				endwhile;
	


			}
		}
		?>

		<?php
		/*
			if ( have_posts() ) {
				$template = oi_get_template_part( 'templates/content-archive' );
				while ( have_posts() ) {
					the_post();
					?>
					<div class="col-sm-6 col-sm-offset-3">

						<?php
						/*
						the_oinput( array(
							'type'  => 'html',
							'title' => $post->post_title,
							'html'  => $template,
						) );


				</div>
					<?php
				}

				the_posts_pagination();

			} else {

				get_404_template();

			}*/
		?>
	</div>

<?php get_footer(); ?>