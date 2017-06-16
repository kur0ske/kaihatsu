
<?php

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();
//イベント詳細ID
$eventdetailid = $_POST['kanrieventdetailid'];
//イベントID
$eventid = $_POST['kanrieventid'];
//イベント詳細コメント
$comment = $_POST['comment'];
//イベント参加者
$eventpp = $_POST['text'];

try{
$time=time();
//ファイルが選択されているか判定
if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
//ファイルが適切か判定
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], '/var/www/html/touhyou/eventimg/'.$time.'jpg')) {
    chmod('/var/www/html/touhyou/eventimg/' .$time.'jpg', 0755);
	$imgurl = "../eventimg/".$time."jpg";
	//イベント詳細取得
	$kanrieventdetail = IventDetailSelect($con,$eventdetailid);
	//画像削除
	unlink($kanrieventdetail[0][3]);
	//変更
	IventDetailUpdate($con,$eventdetailid,$eventpp,$comment,$imgurl);

    echo "変更しました。";
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