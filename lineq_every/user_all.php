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
		require_once("./phpQuery-onefile.php");
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
		<form action=<?php echo "./user_all.php?id=".$id ?> method="post">
		<select name="kind" id="kind_box">
		<option value="unsolved">未解決の問題</option>
		<option value="recent">新着の問題</option>
		</select>

		<select name="tag" id="select_box">
		<?php
		require_once("./phpQuery-onefile.php");
		// HTMLをオブジェクトとして扱う
		$HTMLData = file_get_contents('http://lineq.jp/my/'.$id);
		$phpQueryObj = phpQuery::newDocument($HTMLData);
		// h1タグを片っ端から取得
		$titleArr = $phpQueryObj['.list_wrap .level_category'];
		// ただの配列なのでぶん回す
		foreach($titleArr as $val) {
		  // pq()メソッドでオブジェクトとして再設定しつつさらに下ってhrefを取得
			if(pq($val)->find('a')->attr('href') != "/tag/@tagId"){
			  echo "<option value='".pq($val)->find('a')->attr('href')."'>"
			  .pq($val)->find('strong')->text().pq($val)->find('em')->text()."</option>";
			}
		}

		?>
		</select><br>
		開始:<input type="number" name="start" min = "1">
		終了:<input type="number" name="end">
		回答数:<input type="number" name="ans_num" value=0>
		<input type="submit">
		</form>
		※奨励：１０〜２０ページ(例)「1と10」「30と40」
		<?php
		$tag_id = $_POST['tag'];
		$start = $_POST['start'];
		$end= $_POST['end'];
		$kind= $_POST['kind'];
		$ans_num = $_POST['ans_num'];
		echo "<div id='tag_id' style='display:none;'>".$tag_id."</div>";
		echo "<div id='kind' style='display:none;'>".$kind."</div>";
		//echo $tag_id;
		// phpQueryの読み込み

		// HTMLデータを取得する
		$cnt = 0;
		for($i = $start;$i < $end;$i++){
			$HTMLData = file_get_contents('http://lineq.jp'.$tag_id.'/'.$kind.'?page='.$i);

			// HTMLをオブジェクトとして扱う
			$phpQueryObj = phpQuery::newDocument($HTMLData);
			$conteArr = $phpQueryObj['.in_card_inner'];
			// h1タグを片っ端から取得
			foreach($conteArr as $val) {
			  // pq()メソッドでオブジェクトとして再設定しつつさらに下ってhrefを取得
			  //echo pq($val)->find('a')->attr('href').PHP_EOL;
				$url = 'http://lineq.jp'.pq($val)->find('p')->find('a')->attr('href');
				$HTMLData_sub = file_get_contents($url);
				$phpQueryObj_sub = phpQuery::newDocument($HTMLData_sub);
				$conteArr_sub = $phpQueryObj_sub['.in_card_inner'];
			  if(strpos($phpQueryObj_sub,'板谷y') === false && $url != 'http://lineq.jp'){
				  echo "<div class='cards'>";
				  echo "<a href='http://lineq.jp".pq($val)->find('p')->find('a')->attr('href')."' target='blank'>";
				  echo pq($val)->find('p')->text();
				  echo "<div class='btn'>回答する</div>";
				  echo "</a>";
				  echo "</div>";
			  }
			}
		}
		echo "<div id='cnt_data' style='display:none;'>".$cnt."</div>";
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
