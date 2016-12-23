<?php 
	require_once './db_connect.php';
	require_once './counter.php';
	if(!empty($_GET['search'])){
		$sql = "SELECT * FROM `contents` where `subject_name` like '%".$_GET['search']."%' GROUP BY `subject_name`";
	}else if (!empty($_GET['name'])) {
		$sql = "SELECT * FROM contents where `subject_name` like '%".$_GET['name']."%'";
	}else{
		$sql = "SELECT `subject_name` FROM `contents` GROUP By `subject_name`";
	}
	$result = mysql_query($sql);
	mysql_close($link);
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
			location.href = "/syllabus.php?search="+search;
		}
		window.onload = function(){
			$('#syllabus').addClass('active');
		}
	</script>
	<?php include("_header.php"); ?>
	<div class="container">
		<h2>シラバス一覧</h2>
		<form action="syllabus.php" method="get" accept-charset="utf-8">
			<input type="textbox" id="text" name="search">
			<button type="submit" id="btn" class="btn btn-success">検索 <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		</form>
		<div class="table-responsive">
		<table id="index_table" class="table table-striped table-bordered">
			<tbody>
				<?php
					if(!empty($_GET['name'])){

					}else{
				?>
				<th>科目名</th>
				<?php 
					}
				 ?>						
		<?php while ($row = mysql_fetch_assoc($result)) { ?>
				<tr>
					<?php 
						if (!empty($_GET['name'])) {								
					 ?>
					<td>
					<a href="./view.php?id=<?= $row['id'] ?>" title=""><?= $row['subject_name'] ?></a>
					</td>
					<td>
					<?= $row['time'] ?>
					</td>
					<td>
					<?= $row['teacher'] ?>
					</td>
					 <?php
					  }else {
					  ?>
					  	<td>
						<a href="./syllabus.php?name=<?= $row['subject_name'] ?>" title=""><?= $row['subject_name'] ?></a>
						</td>
					  <?php
					  } 
					  ?>							
				</tr>
		<?php } ?>	
			</tbody>
		</table>
		</div>
	 <?php include("_footer.php"); ?>
	 </div>
</body>
</html>