<?php 

if(!isset($_SESSION)){ 
session_start(); 
}
function VoteConfimation(){

ini_set( 'display_errors', "On" );

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//eventid取得
$eventid = $_SESSION['eventid'];


//投票データ取得(2重投票確認)
$flag = EventFlagSelect($con,$eventid);

      if($flag[0][1] == 1){

		return 'false';

	}else{
		return 'true';
	}
	//DB切断
	 DBDConnect($con);
}
?>