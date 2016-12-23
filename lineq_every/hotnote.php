<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LINEQ非公式ツール</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="./favicon.ico" >
<!-- BootstrapのCSS読み込み -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- BootstrapのJS読み込み -->
<script src="./js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header" class="">
		<span id="header_font">LINEQ非公式ツール</span>
	</div><!-- /header -->
	<div id="cover">
		<div id="left_contents">
		<h3>タイムライン</h3>
			<?php
			error_reporting(0);
			require_once("./phpQuery-onefile.php");
			$id = $_GET['id'];
			$HTMLData = file_get_contents('http://lineq.jp/my/'.$id);
			// HTMLをオブジェクトとして扱う
			$phpQueryObj = phpQuery::newDocument($HTMLData);
			// h1タグを片っ端から取得
			$nameArr = $phpQueryObj['.header_name'];
			$imgArr = $phpQueryObj['.header_photo img'];
			$statArr = $phpQueryObj['.header_stat'];
			foreach($imgArr as $val) {
				echo "<img src ='".pq($val)->attr('src')."'>";
			}
			echo "<br>".$nameArr->text()."さん";
			 $a = str_replace("|","<br>",$statArr->text());
			//echo "<br>".$stat[0];
			 echo "<br>".$a;
			?>
		</div>
		<div id="main_contents">
			<?php
			require_once("./phpQuery-onefile.php");
			// HTMLをオブジェクトとして扱う
			for($i = 1;$i<=10;$i++){
				$HTMLData = file_get_contents('http://lineq.jp/hotnote?page='.$i);
				$phpQueryObj = phpQuery::newDocument($HTMLData);
				// h1タグを片っ端から取得
				$titleArr = $phpQueryObj['.note_card'];
				// ただの配列なのでぶん回す
				foreach($titleArr as $val) {
				  // pq()メソッドでオブジェクトとして再設定しつつさらに下ってhrefを取得
					  if("/my/".$id==pq($val)->find('.card_profile')->find('a')->attr('href')){
					  	echo pq($val)->find('.card_title')->text();
					  	echo '<br>';
					  }

				}

			}

			?>
		
			<script>
				var cnt = document.getElementById('cnt_data').innerHTML;
				for(var i = 0;i  < cnt;i++){
				//	window.open(document.getElementById('link_'+i).href);
				}
	//			alert(document.getElementsById("tag_id").innerHTML);
		document.getElementById("select_box").value = document.getElementById("tag_id").innerHTML;
		document.getElementById("kind_box").value = document.getElementById("kind").innerHTML;
			</script>
		</div>
		<div id="right_contents">
		</div>
	</div>
</body>
</html>
