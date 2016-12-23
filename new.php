<?php 
	require_once './counter.php';
  error_reporting(E_ALL);
  if (isset($_POST['class_name'])) {
      $lecture = '"'.$_POST['class_name'].'"';
      $teacher = '"'.$_POST['teacher_name'].'"';
      $author  = '"'.$_POST['name'].'"';
      $difficulty = $_POST['easy'];
      $value = $_POST['tanni'];
      $comment = '"'.$_POST['comment'].'"';
      $book =  '"'.$_POST['book'].'"';
      $attend = '"'.$_POST['attend'].'"';
      $test = '"'.$_POST['test'].'"';
      $sql = "INSERT INTO `reviews` (`id`, `lecture`, `teacher`, `value`, `difficulty`, `attend`, `book`, `test`, `comment`, `author`)VALUES(NULL, $lecture,$teacher , $difficulty, $value, $attend, $book, $test, $comment, $author)";
      $result = mysql_query($sql);
      echo $sql;
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
			$('#new').addClass('active');
		}
	</script>
	<?php include("_header.php"); ?>
	<div class="container">
		<h2>クチコミ投稿※今動きません</h2>
		<form action="./new.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">授業名</label>
        <input type="text" class="form-control" name="class_name" id="class_name">
        <small id="emailHelp" class="form-text text-muted">数字は半角。<br>
        例「アルゴリズムとデータ構造２」->「アルゴリズムとデータ構造2」</small>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">先生の名前</label>
        <input type="text" class="form-control" name="teacher_name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">ニックネーム</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label for="easy">授業の充実度</label>
        <select class="form-control" name="easy">
          <option value="1">充実してない</option>
          <option value="2">やや充実してない</option>
          <option value="3">普通</option>
          <option value="4">やや充実していた</option>
          <option value="5">充実していた</option>
        </select>
      </div>
      <div class="form-group">
        <label for="rani">単位の取りやすさ</label>
        <select class="form-control" name="tanni">
          <option value="1">取りにくい</option>
          <option value="2">やや取りにくい</option>
          <option value="3">普通</option>
          <option value="4">やや取りやすい</option>
          <option value="5">取りやすい</option>
        </select>
      </div>
      <div class="form-group">
        <label for="comment">コメント</label>
        <textarea class="form-control" name="comment" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="comment">出席</label>
        <input type="radio" name="attend" value="とる" placeholder="">とる
        <input type="radio" name="attend" value="とらない" placeholder="">とらない
      </div>
      <div class="form-group">
        <label for="comment">教科書</label>
        <input type="radio" name="book" value="いる" placeholder="">いる
        <input type="radio" name="book" value="いらない" placeholder="">いらない
      </div>
      <div class="form-group">
        <label for="comment">テスト</label>
        <input type="radio" name="test" value="持ち込みあり" placeholder="">持ち込みあり
        <input type="radio" name="test" value="持ち込みなし" placeholder="">持ち込みなし
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
	 <?php include("_footer.php"); ?>
	 </div>
</body>
</html>