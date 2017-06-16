<?php
function DatailData(){
if(!isset($_SESSION)){ 
session_start(); 
}
ini_set( 'display_errors', "On" );




require_once '../honsaiclass/DBManager.php';


//ローカルストレージから値を取得
$eventid = $_SESSION['eventid'];

//DBConnent関数を呼び出し
$con = DBConnect();

//id取得
$detailid = IventMgSelect($con,$eventid);
$eventdatail = array();
$j=0;
foreach($detailid as $id ){
	$data = IventDetailSelect($con,$id['iventdetailID']);
	//echo $data[0][0];
	$eventdatail[$j][0] = $data[0][0];
	$eventdatail[$j][1] = $data[0][1];
	$eventdatail[$j][2] = $data[0][2];
	$eventdatail[$j][3] = $data[0][3];

$j++;
}
	//DB切断
	 DBDConnect($con);

	return $eventdatail;
}
?>