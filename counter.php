<?php
$keta = 5; //カウンタの最低桁数　※カウントがこの桁を超えても大丈夫（ちゃんと自動で桁が上がります）
$base_day = date("Y/m/d"); //日付の取得
$remoteAddr = $_SERVER['REMOTE_ADDR']; //IP取得
$filepath = "count.dat";
$fp = fopen($filepath,"r+b");
flock ($fp,LOCK_EX);
$line = fgets($fp);
//fclose($fp);
list($reg_day, $total, $today, $yesterday, $reg_remoteAddr) = split(",", $line);
if ($base_day != $reg_day){
  $yesterday = $today;
  $today = 0;
}
if ($remoteAddr!=$reg_remoteAddr) {
$total++;
$today++;
ftruncate($fp,0);
rewind($fp);
fwrite($fp,"$base_day,$total,$today,$yesterday,$remoteAddr");
fclose($fp);
}
?>