<?php 
	require_once './counter.php';
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
		window.onload = function(){
			$('#recruit').addClass('active');
		}
	</script>
	<?php include("_header.php"); ?>
	<div class="container">
		<h2>一緒に作ってくれる人募集</h2>
		<p>このサイトはまだβ版なので一緒に作ってくれる人を募集してます。</p>
		<h3>【メイン】</h3>
		<ul>
			<li>デザイナー</li>
			<p>このページのデザインをしてくれる人を募集中。<br>現在はbootstrap3？を使ってなんとなくしかデザインをしていないので、がっつりデザインしてくれると助かります。<br>あと、このページにはTOPページ（indexページ）がないのでその制作もお願いしたいです。</p>
			<li>エンジニア（コーディング）</li>
			<p>このシステムはphpでできてます。<br>なんとなくは出来上がってるんですけど、まだまだ改良の余地はあるのでお手伝いをしてくれる人を募集してます。</p>
			<li>エンジニア（データ収集）</li>
			<p>このサイトのシラバスとかは、rubyでスクレイピングを行ってそれをデータベースに入れるという形になっています。<br>見ての通り、まだデータが足りてません。<br>データ収集とか、スクレイピングに興味がある人を募集してます。</p>
		</ul>
		<h3>【サブ】</h3>
		<ul>
			<li>メディア運用</li>
			<p>twitterとかで宣伝してくれる人もいたら助かります。</p>
		</ul>
		<p>興味ある人がいたらtwitterのDMやリプ、メールください</p>
	 <?php include("_footer.php"); ?>
	 </div>
</body>
</html>