
<?php

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

 $comment = $_POST['comment'];
 $eventid = $_POST['kanrieventid'];
 $eventpp = $_POST['text'];

try{
$time=time();
//ファイルが選択されているか判定
if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
//ファイルが適切か判定
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], '/var/www/html/touhyou/eventimg/'.$time.'jpg')) {
    chmod('/var/www/html/touhyou/eventimg/' .$time.'jpg', 0755);
	$imgurl = "../eventimg/".$time."jpg";
//イベント詳細情報登録機能
	$eventdetailid= IventDetailInsert($con,$eventpp,$comment,$imgurl);
//イベントID紐づけ情報登録機能
	IventMgInsert($con,$eventid,$eventdetailid);
    echo "登録しました。";
	header("Refresh: 3; URL= ../kanri/kanrievent.php");
	exit;
	
  } else {
    echo "ファイルをアップロードできません。";
		header("Refresh: 3; URL= ../kanri/kanrievent.php");
	exit;

  }
} else {
  echo "ファイルが選択されていません。";
  	header("Refresh: 3; URL= ../kanri/kanrievent.php");
	exit;

}
}catch(Exception $e) {

        echo 'エラー:', $e->getMessage().PHP_EOL;

}






?>