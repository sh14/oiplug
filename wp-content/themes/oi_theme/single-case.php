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
		'show_author'   => false,
		'ccc'           => $ccc,
	) );

}

get_footer();