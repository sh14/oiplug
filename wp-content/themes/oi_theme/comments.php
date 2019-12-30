<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package oi-plug
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
$req      = get_option('require_name_email');
$aria_req = ($req ? " aria-required='true'" : '');
?>

<div id="comments" class="comments-area">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
					// комменты закрыты
				}

				$comment_args = array(
					//'title_reply'         => 'Got Something To Say:',
					'fields'              => apply_filters( 'comment_form_default_fields', array(
						'author' => '<div class="comment-form-author form-group">' . '<label for="author">' . __( 'Ваше имя', 'xxx' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
						            '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
						'email'  => '<div class="comment-form-email form-group">' .
						            '<label for="email">' . __( 'Email', 'xxx' ) . '</label> ' .
						            ( $req ? '<span>*</span>' : '' ) .
						            '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . '</div>',
						'url'    => ''
					) ),
					'comment_field'       => '<div class="form-group">' .
					                         '<label for="comment">' . __( 'Дайте нам знать, что Вы думаете:', 'xxx' ) . '</label>' .
					                         '<textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea>' .
					                         '</div>',
					'class_submit'        => 'submit btn btn-primary',
					'comment_notes_after' => '',
				);

				?>

				<?php
				comment_form( $comment_args );
				if ( have_comments() ) {
					?>
					<h2 class="comments-title">
						<?php
						printf( _nx( 'Один коменнтарий на &ldquo;%2$s&rdquo;', 'Комментариев: %1$s, на &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'xxx' ),
							number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
						?>
					</h2>

					<?php

					if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // are there comments to navigate through ?>
						<nav id="comment-nav-above" class="comment-navigation" role="navigation">
							<h1 class="screen-reader-text"><?php _e( 'Навигация по комментариям', 'xxx' ); ?></h1>
							<div
									class="nav-previous"><?php previous_comments_link( __( '&larr; Старые комментарии', 'xxx' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( __( 'Новые комментарии &rarr;', 'xxx' ) ); ?></div>
						</nav><!-- #comment-nav-above -->
					<?php } // check for comment navigation ?>

					<ol class="comment-list">
						<?php
						wp_list_comments( array(
							'style'      => 'ol',
							//'short_ping' => true,
							'callback'   => 'oi_plug_comment',
						) );
						?>
					</ol><!-- .comment-list -->

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // are there comments to navigate through ?>
						<nav id="comment-nav-below" class="comment-navigation" role="navigation">
							<h1 class="screen-reader-text"><?php _e( 'Навигация по комментариям', 'xxx' ); ?></h1>
							<div
									class="nav-previous"><?php previous_comments_link( __( '&larr; Старые комментарии', 'xxx' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( __( 'Новые комментарии &rarr;', 'xxx' ) ); ?></div>
						</nav><!-- #comment-nav-below -->
					<?php } // check for comment navigation ?>

				<?php
				} // have_comments()
				?>

			</div>
		</div>
	</div>
</div><!-- #comments -->
