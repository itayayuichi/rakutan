<?php
//クッキー取得のためのURL
//ここにアクセスすればクッキーにフラグが立つというページ
$cookie='https://channel.line.naver.jp/dialog/oauth/weblogin?channelId=1366715757&state=&redirectUrl=http%3A%2F%2Flineq.jp%2Fauth%2Fline%2Fcallback%3Fredirect%3Dhttp%253A%252F%252Flineq.jp%252F';

//最終的にアクセスしたいページ
//クッキーがないとアクセスできない
$url='http://lineq.jp/my/1113300';

//クッキー取得のためのアクセス
$ch=curl_init();//初期化
curl_setopt($ch,CURLOPT_URL,$cookie);//cookieを取りに行く
curl_setopt($ch,CURLOPT_HEADER,FALSE);//httpヘッダ情報は表示しない
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);//データをそのまま出力
curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie.txt');//$cookieから取得した情報を保存するファイル名
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);//Locationヘッダの内容をたどっていく
curl_exec($ch);
curl_close($ch);//いったん終了

//見たいページにアクセス
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HEADER,FALSE);
curl_setopt($ch,CURLOPT_COOKIEFILE, 'cookie.txt');//cookie情報を読み取る
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
$html=curl_exec($ch);
curl_close($ch);

mb_language('Japanese');
$html=mb_convert_encoding($html,'utf8','auto');//UTF-8に変換
print $html;
?>
