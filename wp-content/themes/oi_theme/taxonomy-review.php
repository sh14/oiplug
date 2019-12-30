<?php
global $post;
get_header(); ?>

	<div class="container">
		<h1 class="h1 block__title">Отзывы</h1>
		<?php

		$out = oi_review( array(
			'start_class' => $start_class = $start_class + 1,
			'show_start'  => true,
			'class_start' => 'col-md-4 col-sm-12 col-xs-12',
			'class'       => 'col-md-4 col-sm-6 col-xs-12',
		) );
echo $out;
		?>
	</div>

<?php get_footer(); ?>