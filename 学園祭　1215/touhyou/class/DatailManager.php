<?php
if(!isset($_SESSION)){ 
session_start(); 
}
function DatailData($detailid){

ini_set( 'display_errors', "On" );



require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//id取得
$detail = IventDetailSelect($con,$detailid);


	//DB切断
	 DBDConnect($con);

	return $detail;
}
?>