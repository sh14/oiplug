<?php
/*
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
*/
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 04.12.16
 * Time: 15:21
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
	//ob_start();
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php
	wp_head();
	//$themeHead = ob_get_contents();
	//ob_end_clean();
	//define( 'HEAD_CONTENT', $themeHead );

	//$allowedTags = '<style><link><meta><title>';
	//$header_tags = theme_strip_tags_content( HEAD_CONTENT, $allowedTags );
	//print $header_tags;
	?>
</head>
<body <?php body_class() ?>">
<?php oi_preloader_block(); ?>
<div class="oi_page">
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
				        aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Навигация</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><span class="primary-text">Oi</span>Plug</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<?php
				if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'menu'           => 'Primary Menu',
						'theme_location' => 'primary',
						'depth'          => 2,
						'container'      => false,
						'menu_id'        => '',
						'menu_class'     => 'nav navbar-nav navbar-right',
						'walker'         => new Bootstrap_Walker_Nav_Menu()
					) );
				} else {
					?>
					<ul class="nav navbar-nav navbar-right">
						<? wp_list_pages( 'title_li=&depth=0' ); ?>
					</ul>
					<?php
				}
				?>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<!-- end:header -->
<?php

//pr(get_current_template());
