<?php 

if(!isset($_SESSION)){ 
session_start(); 
}

//ini_set( 'display_errors', "On" );

require_once '../honsaiclass/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

$usernumber = $_POST['usernumber'];

//eventid取得
$eventid = $_SESSION['eventid'];

$votedata = GakusaiVoteUsernumberSelect($con,$eventid,$usernumber);

//投票データ取得(2重投票確認)
$flag = EventFlagSelect($con,$eventid);

      if($flag[0][1] == 1){
		if($votedata[0][0] == $usernumber){

		$flg ='true';
		$ar = array("flag" => $flg);

		}else{
		$flg ='false';
		$ar = array("flag" => $flg);
		}
	}else{

		$flg ='true1';
		$ar = array("flag" => $flg);
	}

	echo json_encode($ar);

	//DB切断
	 DBDConnect($con);

?>