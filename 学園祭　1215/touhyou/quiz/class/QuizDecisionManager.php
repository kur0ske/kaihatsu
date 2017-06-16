<?php 

if(!isset($_SESSION)){ 
session_start(); 
}

//ini_set( 'display_errors', "On" );

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//ユーザーナンバー取得
$usernumber = $_POST['usernumber'];
//$usernumber = 1401010;

//kuizuid取得
$kuizuid = $_SESSION['kuizid'];
//$kuizuid = 75;


//ユーザーアンサー取得
$answer = $_POST['answer'];
//$answer = "コカ・コーラ";


$gakusaiflag = GakusaiFlagSelectAll($con);
//投票データ取得(2重投票確認)
$flag = particiSerch($con,$usernumber,$kuizuid);
	if($gakusaiflag[0][3]==1){
		//二重投票
		if($flag[0][0] == $usernumber){

		$flg ='true';
		$ar = array("flag" => $flg);

		}else{

		answerRegi($con,$usernumber,$kuizuid,$answer);
		
		$flg ='false';
		$ar = array("flag" => $flg);
		}
	}else{
		$flg ='true1';
		$ar = array("flag" => $flg);
	}

	echo json_encode($ar);



?>