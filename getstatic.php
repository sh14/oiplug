<?php
/**
 * Date: 2019-12-30
 * @author Isaenko Alexey <info@oiplug.com>
 */

function getStatic(){
	if(isset($_GET['url'])){
		$url = $_GET['url'];
		$file = file_get_contents($url);
		echo $file;
		die();
	}else{
		echo 'enter url';
	}

}
getStatic();

// eof
