<?php
$img = ImageCreateFromJPEG('./img/sample01.jpg');
$text = mb_convert_encoding('オランダシシガシラ', 'UTF-8', 'auto');
$white = ImageColorAllocate($img, 255,100 ,0 );
$font = './fonts/ipaexm.ttf';
ImageTTFText($img, 10, 0, 32, 38, $white,$font, $_GET['text']);
header('Content-Type: image/jpeg');
ImageJPEG($img);
?>
<form action="image.php" method="get" accept-charset="utf-8">
	<input type="textbox" name="" value="" placeholder="">
	<input type="submit" name="" value="">
</form>