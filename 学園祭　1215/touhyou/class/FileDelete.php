<?php
require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();
//イベント詳細ID
$eventdetailid = $_POST['kanrieventdetailid'];
//イベントID
$eventid = $_POST['kanrieventid'];
//イベントとイベント詳細紐づけ削除
IventMgDelete($con,$eventid,$eventdetailid);
//イベント詳細取得
$kanrieventdetail = IventDetailSelect($con,$eventdetailid);
//イベント詳細削除
IventDetailDelete($con,$eventdetailid);
//イベント詳細画像削除
echo "削除しました。";
unlink($kanrieventdetail[0][3]);
header("Refresh: 3; URL= ../kanri/kanrievent.php");
exit;


?>