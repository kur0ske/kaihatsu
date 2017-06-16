<?php
ini_set( 'display_errors', "On" );

session_start();

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

$usernumber = $_POST['usernumber'];

$eventid = $_SESSION['eventid'];

$eventdetailid = $_POST['eventdetailid'];

//投票
GakusaiVoteInsert($con,$usernumber,$eventid,$eventdetailid);

	//DB切断
	 DBDConnect($con);

	 header('location: ../zenyasai/EventVoteDetail.php');
	 exit();
?>