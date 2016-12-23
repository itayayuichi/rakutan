<?php 
	require_once 'db_connect.php';
	$link = mysql_connect('127.0.0.1', 'root', 'rushiruerisu4385');
#	$link = mysql_connect('mysql.hostinger.jp', 'u797658425_etera', 'rushiruerisu4385');
	$db_selected = mysql_select_db('db_rakuben', $link);
#	$db_selected = mysql_select_db('u797658425_uzuru', $link);
	mysql_query("set names utf8",$link); 
 ?>