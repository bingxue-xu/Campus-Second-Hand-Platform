<?php
	error_reporting(0);
	
	date_default_timezone_set("PRC");
	header("Content-Type: text/html;charset=utf-8");
	$pdo=new PDO('mysql:host=localhost;dbname=secondhand','root','root');
	$pdo->exec('set names utf8');
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
?>