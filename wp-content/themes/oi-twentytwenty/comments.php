<?php
/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package    WordPress
 * @subpackage Twenty_Twenty
 * @since      1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

	<div class="comments" id="comments">
		<div id="respond">
			<div class="fb-comments" data-href="https://oiplug.com/?p=<?php the_ID() ?>" data-numposts="10">
				Загрузка комментариев...
			</div>
		</div><!-- respond -->
	</div><!-- comments -->

