<?php
get_header();
while ( have_posts() ) {
	the_post();
	ob_start();
	the_content();
	$ccc = ob_get_contents();
	ob_clean();

	single_page( array(
		'term_taxonomy' => 'category',
		'_mixin'        => '-single',
		'show_meta'     => true,
		'show_author'   => true,
		'ccc'   => $ccc,
	) );
	?>

	<section>
		<div class="block block-thin block-comments">
			<?php comments_template(); ?>
		</div>
	</section>
	<?php
}
?>
<?php oi_get_template_part( 'subscription_block' ); ?>

	<section>
		<div class="block block-thin">
			<div class="container">

				<?php
				$post_id = get_the_ID();
				$tags    = wp_get_post_tags( $post_id );

				$tag_ids = array();
				if ( ! empty( $tags ) ) {
					foreach ( $tags as $individual_tag ) {
						$tag_ids[] = $individual_tag->term_id;
					}
				}

				$start_class = 0;

				the_oi_posts( array(
					'args'            => array(
						'tag__in'        => $tag_ids,
						'post__not_in'   => array( $post_id ),
						'post_type'      => 'post',
						'posts_per_page' => 9,
					),
					//'show_content'     => false,
					'show_meta'       => false,
					'show_pagination' => false,
					'_mixin'          => '-plugin',
					'container_class' => 'articles',
					'block_class'     => 'box_shadow',
					//'term_taxonomy' => 'plugin-type',
					'thumb_size'      => 'large',
					'col_class'       => 'col-md-4 col-sm-6 col-xs-12',
					'start'           => array(
						'class'   => start_class( $start_class = $start_class + 1 ),
						'title'   => 'Вам будет интересно',
						'content' => '<p>Данные статьи содержат похожие материалы.</p>',
					),
				) );
				?>
			</div>
		</div>
	</section>

<?php
get_footer();
?>