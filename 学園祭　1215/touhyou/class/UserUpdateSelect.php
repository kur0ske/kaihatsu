<?php
ini_set( 'display_errors', "On" );


require_once './DBManager.php';


//DBConnent関数を呼び出し
$con = DBConnect();

//tarminal取得
$tarminal = CookieSelect($con);

$tarminalUpdate = $tarminal[0][0]+1;

CookieUpdate($con,$tarminalUpdate);

$usernumber = CookieSelect($con);
	$ar = array("usernumber" => $usernumber[0][0]);

	echo json_encode($ar);
	//DB切断
	 DBDConnect($con);
	

?>