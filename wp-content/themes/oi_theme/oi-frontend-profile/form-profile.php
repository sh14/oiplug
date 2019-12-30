<?php
global $profileuser, $user_id;
$fields = array(
			array(
						'type'	=> 'html',
						'html'	=> oi_do_action_return( 'personal_options', $profileuser ),
			),
			array(
						'type'	=> 'html',
						'html'	=> oi_do_action_return( 'profile_personal_options', $profileuser ),
			),
			array(
						'type'	=> 'html',
						'html'	=> '<div class="row">',
			),
	'user_login'   => array(
		'name'     => 'user_login',
		'type'     => 'text',
		'class'    => 'form-control',
		'before'   => __( 'Username', 'oi_frontend' ),
		'value'    => esc_attr( $profileuser->user_login ),
		'hint'     => __( 'Usernames cannot be changed.', 'oi_frontend' ),
		'readonly' => true,
		'disabled' => true,
		'html'     => '<div class="col-xs-12 col-md-12 form-group">%1$s</div>',
	),
	'first_name'   => array(
		'name'   => 'first_name',
		'before' => __( 'First name', 'oi_frontend' ),
		'type'   => 'text',
		'class'  => 'form-control',
		'value'  => esc_attr( $profileuser->first_name ),
		'data'   => array(
			'validation'        => 'length',
			'validation-length' => 'min2',
		),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
	'last_name'    => array(
		'name'   => 'last_name',
		'before' => __( 'Last name', 'oi_frontend' ),
		'type'   => 'text',
		'class'  => 'form-control',
		'value'  => esc_attr( $profileuser->last_name ),
		'data'   => array(
			'validation'        => 'length',
			'validation-length' => 'min2',
		),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
	'nickname'     => array(
		'name'   => 'nickname',
		'before' => __( 'Nick name', 'oi_frontend' ),
		'type'   => 'text',
		'class'  => 'form-control',
		'value'  => esc_attr( $profileuser->nickname ),
		'data'   => array(
			'validation'        => 'length',
			'validation-length' => 'min2',
		),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
	'display_name' => array(
		'name'   => 'display_name',
		'before' => __( 'Display name', 'oi_frontend' ),
		'type'   => 'select',
		'class'  => 'form-control',
		'value'  => oinput( array(
			'name'  => oi_public_display( $profileuser ),
			'type'  => 'option',
			'value' => $profileuser->display_name,
		) ),
		'data'   => array(
			'validation'        => 'length',
			'validation-length' => 'min2',
		),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
	'email'        => array(
		'name'   => 'email',
		'before' => __( 'Email', 'oi_frontend' ),
		'type'   => 'text',
		'class'  => 'form-control',
		'value'  => esc_attr( $profileuser->user_email ),
		'data'   => array(
			'validation'        => 'email',
		),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
	'url'          => array(
		'name'   => 'url',
		'before' => __( 'Website', 'oi_frontend' ),
		'type'   => 'text',
		'class'  => 'form-control',
		'value'  => esc_attr( $profileuser->user_url ),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
	'description'  => array(
		'name'   => 'description',
		'before' => __( 'Biographical Info', 'oi_frontend' ),
		'type'   => 'textarea',
		'class'  => 'form-control',
		'value'  => esc_attr( $profileuser->description ),
		'hint'   => __( 'Share a little biographical information to fill out your profile. This may be shown publicly.', 'oi_frontend' ),
		'html'   => '<div class="col-xs-12 col-md-12 form-group">%1$s</div>',
	),
/*			array(
						'type'	=> 'html',
						'html'	=> oi_do_action_return( 'show_user_profile', $profileuser ),
			),*/
			array(
						'type'	=> 'html',
						'html'	=> '<div id="change_password" class="col-xs-12 col-md-12"><p><a href="#password">' . __( 'Change password', 'oi_frontend' ) . '</a></p></div>',
			),
			array(
						'type'	=> 'html',
						'html'	=> '<div id="password_section">',
			),
	'pass1'        => array(
		'name'   => 'pass1',
		'before' => __( 'New Password', 'oi_frontend' ),
		'type'   => 'password',
		'class'  => 'form-control',
		'attributes'  => array('autocomplete'=>'off'),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
	'pass2'        => array(
		'name'   => 'pass2',
		'before' => __( 'Confirm the password', 'oi_frontend' ),
		'type'   => 'password',
		'class'  => 'form-control',
		'attributes'  => array('autocomplete'=>'off'),
		'html'   => '<div class="col-xs-12 col-md-6 form-group">%1$s</div>',
	),
			array(
						'type'		=> 'html',
						'html'		=> '</div>',
			),
			array(
						'type'		=> 'html',
						'html'		=> '</div>',
			),
			array(
						'type'		=> 'html',
						'html'		=> wp_nonce_field( 'update-user_' . $user_id, 'profile_wpnonce', true, false ),
			),
			array(
						'name'		=> 'from',
						'type'		=> 'hidden',
						'value'		=> 'profile',
			),
			array(
						'name'		=> 'checkuser_id',
						'type'		=> 'hidden',
						'value'		=> $user_id,
			),
			array(
						'name'		=> 'action',
						'type'		=> 'hidden',
						'value'		=> 'update',
			),
			array(
						'name'		=> 'user_id',
						'type'		=> 'hidden',
						'value'		=> '1',
			),
			'submit'	=> array(
						'type'		=> 'submit',
						'value'		=> __('Update Profile', 'oi_frontend'),
						'class'		=> 'btn btn-primary',
			),
);
$atts = array(
	'id'		=> 'profile',
	'name'		=> 'profile',
	'addon'		=> oi_do_action_return( 'user_edit_form_tag' ),
	'method'	=> 'post',
	'echo'		=> true,
);

?>
<div class="oi_frontend">
	<?php do_action( 'profile_form' ); ?>
	<?php oinput_form( $fields, $atts ); ?>
</div>
<script>
if(window.location.hash == '#password')
{
	oi_frontent_change_password();
}else
{
	document.getElementById('change_password').style.display = 'block';
	document.getElementById('password_section').style.display = 'none';
}
function oi_frontent_change_password()
{
	document.getElementById('change_password').style.display = 'none';
	document.getElementById('password_section').style.display = 'block';
	document.getElementById('pass1').focus();
}
document.getElementById('change_password').onclick=function(){oi_frontent_change_password();};
</script>