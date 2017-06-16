<?php 

if(!isset($_SESSION)){ 
session_start(); 
}


ini_set( 'display_errors', "On" );

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//学籍番号
$usernumber = $_POST['usernumber'];

//kuizuid取得
$kuizuid = $_POST['kuizuid'];


//参加者データ取得(2重投票確認)
$flag = particiSerch($con,$usernumber,$kuizuid);

      if($flag[0][0] == $usernumber){
        header('location: ../quizParticipantTop.php');
        exit();

	}else{
		header('location: ../answerComp.php');
        exit();
	}
	//DB切断
	 dconnect($con);

?>