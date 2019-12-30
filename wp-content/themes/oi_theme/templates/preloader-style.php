<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 02.01.17
 * Time: 2:45
 */
?>
<style>
	.preloader-page {
		display: block;
		position: fixed;
		z-index: 99999;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: #fff;
	}
	.preloader-page__box {
		display: block;
		position: absolute;
		top: 50%;
		left: 50%;
		margin: -16px 0 0 -16px;
	}
	.preloader {
		position: relative;
		padding-right: 2.4em;
		font-size: 1em;
	}
	.preloader:after {
		position: absolute;
		box-sizing: border-box;
		content: '';
		top: 50%;
		right: .5em;
		margin-top: -0.7em;
		width:1.4em;
		height:1.4em;
		display:inline-block;
		padding:0px;
		border-radius:100%;
		border:2px solid;
		border-top-color:rgba(0,0,0, 0.65);
		border-bottom-color:rgba(0,0,0, 0.15);
		border-left-color:rgba(0,0,0, 0.65);
		border-right-color:rgba(0,0,0, 0.15);
		-webkit-animation: preloader 0.8s linear infinite;
		animation: preloader 0.8s linear infinite;
	}
	@keyframes preloader {
		from {transform: rotate(0deg);}
		to {transform: rotate(360deg);}
	}
	@-webkit-keyframes preloader {
		from {-webkit-transform: rotate(0deg);}
		to {-webkit-transform: rotate(360deg);}
	}
</style>
