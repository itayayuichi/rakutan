<?php 
	require_once './db_connect.php';
	require_once './counter.php';
	if(!empty($_POST['text'])){
		$contents = $_POST['text'];
		$contents = htmlspecialchars($contents);
		$contents = str_replace("\n", "<br>", $contents);
	 	$contents = $contents . "\n";
	 	$fp = fopen('guestbook.txt', 'a');
	 	fputs($fp, $contents);
	 	fclose($fp);
	}
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>専大授業口コミサイト</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</head>
<body>
	<script>
		function search(){
			var search = document.getElementById("text").value;
			location.href = "/index.php?search="+search;
		}
		window.onload = function(){
			$('#about').addClass('active');
		}
	</script>
	<?php include("_header.php"); ?>
	<div class="container">
		<h2>このサイトについて</h2>
	<p>
		このサイトは専修大学の人が履修を組む時に参考になればいいなってことで作ったサイトです。
	</p><br><br><br>
	<h3>掲示板（なんでも書いていいよ）</h3>
	<?php 
	$lines = file('guestbook.txt');
	foreach($lines as $l) {
	  print "$l\n<hr>\n";
	}
	 ?>
	<form action="./about.php" method="post" accept-charset="utf-8">
		<input type="text" name="text" value="" placeholder="" >
		<input type="submit" name="" value="送信" placeholder="" class="btn btn-success">
	</form>
	 <?php include("_footer.php"); ?>
	 </div>
</body>
</html>