<?php
ini_set( 'display_errors', "On" );


require_once './DBManager.php';


//DBConnent�֐����Ăяo��
$con = DBConnect();

//tarminal�擾
$tarminal = CookieSelect($con);

$tarminalUpdate = $tarminal[0][0]+1;

CookieUpdate($con,$tarminalUpdate);

$usernumber = CookieSelect($con);
	$ar = array("usernumber" => $usernumber[0][0]);

	echo json_encode($ar);
	//DB�ؒf
	 DBDConnect($con);
	

?>