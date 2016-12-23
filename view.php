<?php 
	require_once './db_connect.php';
	require_once './counter.php';
	
	if ($_GET['id']) {
		$id = $_GET['id'];
		$result = mysql_query('SELECT * FROM contents where id='.$id);
		while($row = mysql_fetch_assoc($result)){
			$subject_name = $row['subject_name'];
			$teacher = $row['teacher'];
			$time = $row['time'];
			$quarter = $row['quarter'];
			$campus = $row['campus'];
			$grouping = $row['grouping'];
			$course = $row['course'];
			$unit = $row['unit'];
			$body = $row['body'];
			$evaluation = $row['evaluation'];
			$caution = $row['caution'];
		}
		$result_com = mysql_query('SELECT * FROM `reviews` WHERE `lecture` LIKE "'.$subject_name.'"');
		mysql_close($link);
	}else if ($_GET['name']) {
		$name = $_GET['name'];
		$result = mysql_query("SELECT * FROM contents where like '%".$_GET['search']."%'");
		while($row = mysql_fetch_assoc($result)){
			$subject_name = $row['subject_name'];
			$teacher = $row['teacher'];
			$time = $row['time'];
			$quarter = $row['quarter'];
			$campus = $row['campus'];
			$grouping = $row['grouping'];
			$course = $row['course'];
			$unit = $row['unit'];
			$body = $row['body'];
			$evaluation = $row['evaluation'];
			$caution = $row['caution'];
		}
		$result_com = mysql_query('SELECT * FROM `reviews` WHERE `lecture` LIKE "'.$subject_name.'"');
		mysql_close($link);
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
		window.onload = function(){
			$('#syllabus').addClass('active');
		}
	</script>

	<?php include("_header.php"); ?>
	
	<div class="container">
		<h1><?= $subject_name; ?><br><?= $teacher; ?></h1>
		<a href="#" id="detail">シラバスを見る</a>
		<div id="tables">
			<table id="syllabus_top" style="display: none" class="table table-striped table-bordered">
				<tbody>
					<tr>
						<td class="sub_head" width="20%"><p>科目名</p></td>
						<td>
						<p><?= $subject_name; ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>教員名</p></td>
						<td>
						<p><?= $teacher ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>曜日・時限</p></td>
						<td>
						<p><?= $time ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>期間</p></td>
						<td>
						<p><?= $quarter ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>開講区分</p></td>
						<td>
						<p><?= $campus ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>科目区分</p></td>
						<td>
						<p><?= $grouping ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>配当</p></td>
						<td>
						<p><?= $course; ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>単位</p></td>
						<td>
						<p><?= $unit ?></p>
						</td>
					</tr>
				</tbody>
			</table>
			
			<table id="syllabus_detail" style="display: none" class="table table-striped table-bordered">
				<tbody>
					<tr>
						<td class="sub_head" width="20%"><p>講義内容</p></td>
						<td>
						<p><?= $body; ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>成績評価</p></td>
						<td>
						<p><?= $evaluation ?></p>
						</td>
					</tr>
					<tr>
						<td class="sub_head" width="20%"><p>履修上の留意点</p></td>
						<td>
						<p><?= $caution ?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<table class="table table-inverse table-sm">
		<thead class="thead-default">
		<tr>
			<th width="5%">授業の充実度</th>
			<th width="5%">単位の取りやすさ</th>
			<th width="49%">コメント</th>
			<th width="11%">先生</th>
			<th width="5%">出席</th>
			<th width="5%">教科書</th>
			<th width="15%">テスト</th>
			<th width="5%">日付</th>

		</tr>
		</thead>
		<?php while ($row = mysql_fetch_assoc($result_com)) { ?>
				<tr>
					<td><img src="/img/star_<?= split("点",$row['value'])[0] ?>.png" alt="" width="120px"></td>	
					<td><img src="/img/star_<?= split("点",$row['difficulty'])[0] ?>.png" alt="" width="120px"></td>	

					<td><?= $row['comment'] ?></td>					
					<td><?= $row['teacher'] ?></td>					
					<td><?= $row['attend'] ?></td>					
					<td><?= $row['book'] ?></td>					
					<td><?= $row['test'] ?></td>					
					<td><?= $row['author'] ?></td>					
				</tr>
			
		<?php } ?>	
		</table>
	</div>
	 <?php include("_footer.php"); ?>
	 <script type="text/javascript">
	 	$('#detail').click(function(){
			if (document.getElementById("detail").innerHTML == "シラバスを見る") {
			 	$("#syllabus_top").show();
			 	$("#syllabus_detail").show();
			 	$(this).text("閉じる");	 			
	 		}else{
	 			$("#syllabus_top").hide();
			 	$("#syllabus_detail").hide();
			 	$(this).text("シラバスを見る");	 
	 		}
		});
	 </script>
	 <style>
	 #detail { 
 	   cursor: pointer; 
	}
	 	
	 </style>
</body>
</html>