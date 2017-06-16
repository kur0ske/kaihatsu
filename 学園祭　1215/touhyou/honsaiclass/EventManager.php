<?php
ini_set( 'display_errors', "On" );

session_start();

require_once './DBManager.php';

//ローカルストレージから値を取得
$eventid = $_POST["eventid"];

//DBConnent関数を呼び出し
$con = DBConnect();

//抽選結果flg取得
$flag = EventFlagSelect($con,$eventid);

//イベントが公開されているか判定
if($flag[0][2] == 1){
	//結果が出ているか判定
	if($flag[0][3] == 1){
	    //Result画面へ
	    $_SESSION['eventid'] = $eventid;
	    header('location: ../honsai/EventResult.php');
 	    exit();
	}else{
	   //公開画面へ
	   $_SESSION['eventid'] = $eventid;
	   header('location: ../honsai/EventVoteDetail.php');
	   exit();
	
	}
}else{
	//非公開画面へ
	$_SESSION['eventid'] = $eventid;
	header('location: ../honsai/private.php');
	exit();


}
	//DB切断
	 DBDConnect($con);
	

?>