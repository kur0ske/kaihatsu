<?php
ini_set( 'display_errors', "On" );

session_start();

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();


$eventid = $_POST['eventid'];

$eventdetailid = $_POST['eventdetailid'];

//投票
TestVoteInsert($con,$eventid,$eventdetailid);

	//DB切断
	 DBDConnect($con);

	 header('location: ../user/kyouryoku.php');
	 exit();
?>