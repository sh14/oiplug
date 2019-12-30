<?php
/**
 * Date: 2019-12-30
 * @author Isaenko Alexey <info@oiplug.com>
 */

function register_styles(){
	wp_deregister_script('jquery');
	wp_dequeue_style('crayon-font-monaco');
	wp_dequeue_style('wp-block-library');
//	wp_dequeue_style('crayon');
	wp_deregister_style('crayon-font-monaco');
	wp_deregister_style('wbcr-clearfy-adminbar-styles');
	wp_deregister_script( 'comment-reply' );
	wp_deregister_script( 'wp-embed' );
//	wp_enqueue_style('prefers-color-scheme','/assets/styles/style.css',[],'1');
}
add_action( 'wp_enqueue_scripts', 'register_styles',1000 );


function fb_comments(){
	?>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v5.0&appId=651840578686026&autoLogAppEvents=1" <?php //data-mobile="mobile" ?> data-include-parent="true"></script>
<?php
}
add_action('wp_footer','fb_comments');

add_filter( 'excerpt_length', function($length) {
	return 20;
} );




function fff(){
	//Do something with the buffer (HTML)
//	return $buffer;
//	global $post;
	$link = get_permalink(get_the_ID());
	$response = wp_remote_get($link,['timeout' => 120,]);
	$body = 'no';
	// проверим правильный ли получили ответ
	if ( is_wp_error( $response ) ){
		echo $response->get_error_message();
	}
	elseif( wp_remote_retrieve_response_code( $response ) === 200 ){
		// Все OK, делаем что нибудь с данными $request['body']
		$body = wp_remote_retrieve_body( $response );
	}
	echo $body;
	die();
//	$file = file_get_contents($link);
//	if(!file_exists('/asdgg.html')){
//		file_put_contents('/asdgg.html',$file);
//	}
//	echo 'ok';die;
}
//add_action('wp','fff');
//add_action('wp_print_footer_scripts','fff');
//add_action('shutdown','fff');
// eof
