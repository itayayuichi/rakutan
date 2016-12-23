<?php
require_once("./phpQuery-onefile.php");
if(isset($_POST['id'])) {
	$id = $_POST['id'];
//	header("Location:http://localhost/lineq_every/user.php?id=".$id);
	header("Location:http://itayaacademy.esy.es/lineq/user.php?id=".$id);
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LINEQ非公式ツール</title>
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./favicon.ico" >
</head>
<body>
<div id="header" class="">
	<span id="header_font">LINEQ非公式ツール</span>
</div><!-- /header -->
<div id="cover">
<h1>ログインしてください</h1>
<form action="index.php" method="POST" accept-charset="utf-8">
	id:<input type="text" name="id">
	<input type="submit">
</form>
<p>idとはマイページに飛んだ時の<img src="./id.png">この後ろの数字部分です。<br>
この画像では「1113300」がidです。</p>
<p>
あなたは<?php require "counter1.php" ?>人目のお客様です。
</p>
<p>詳細は<a href="http://lineq.jp/note/93328">こちら</a></p>
</div>
</body>
</html>
