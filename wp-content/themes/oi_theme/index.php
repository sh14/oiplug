<?php
global $post;

get_header(); ?>
<div class="container">

	<?php
	if ( have_posts() ) {

		the_archive_title( '<h1 class="block__title">', '</h1>' );

		get_template_part( 'templates/archive-wall' );
	} else {

		get_404_template();

	}
	?>
</div>


<?php get_footer(); ?>

