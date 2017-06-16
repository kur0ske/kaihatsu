<?php
ini_set( 'display_errors', "On" );


require_once './DBManager.php';


//DBConnentŠÖ”‚ðŒÄ‚Ño‚µ
$con = DBConnect();

//tarminalŽæ“¾
$tarminal = CookieSelect($con);

$tarminalUpdate = $tarminal[0][0]+1;

CookieUpdate($con,$tarminalUpdate);

$usernumber = CookieSelect($con);
	$ar = array("usernumber" => $usernumber[0][0]);

	echo json_encode($ar);
	//DBØ’f
	 DBDConnect($con);
	

?>