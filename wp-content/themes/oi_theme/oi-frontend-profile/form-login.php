<?php
/*
	Login form template
*/

/*
	Login form default fields
*/
$fields = array(
	'log'	=> array(
		'name'	=> 'log',
		'before'	=> __('User name', 'oi_frontend'),
		'class'	=> 'form-control',
		'html'	=> '<div class="form-group">%1$s</div>',
	),
	'pwd'	=> array(
		'name'	=> 'pwd',
		'before'	=> __('Password', 'oi_frontend'),
		'type'	=> 'password',
		'class'	=> 'form-control',
		'html'	=> '<div class="form-group">%1$s</div>',
	),
	'rememberme'	=> array(
		'name'	=> 'rememberme',
		'label'	=> __('Remember me', 'oi_frontend'),
		'type'	=> 'checkbox',
		'value'	=> ( $rememberme ? 'forever' : '' ),
		'html'	=> '<div class="checkbox"><label>%1$s %2$s</label></div>',
		'published'	=> true,
	),
	'redirect_to'	=> array(
		'name'	=> 'redirect_to',
		'type'	=> 'hidden',
		'value'	=> oi_frontend_same_page(),
	),
	'submit'	=> array(
		'type'	=> 'submit',
		'value'	=> __('Вход', 'oi_frontend'),
		'class'	=> 'btn btn-primary',
	),
);
/*
	Login form default attributes
*/
$atts = array(
	'id'		=> 'loginform',
	'name'		=> 'loginform',
	'method'	=> 'post',
	'action'	=> esc_url( site_url( 'wp-login.php', 'login_post' ) ),
	'echo'		=> true,
);

?>
<div class="oi_frontend">
	<?php do_action( 'login_form' ); ?>
	<?php //oinput_form( $fields, $atts ); ?>
</div>