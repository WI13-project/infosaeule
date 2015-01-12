<?php
	session_start();
	session_unset();
	session_destroy();

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	//Wieder zur index weiterleiten
	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
?>