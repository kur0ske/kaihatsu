<?php 
	$a = $_POST["id"];
//	$a = "4444";
//	$b = "情報工学科";
	header("Content-Type:text/html; charset=UTF-8");
//	$id = $_SESSION['id'];
// dbmanager.php?d?????T;
	require_once '../class/DBManager.php';
// dbmanager.php??N???X?d?g??
	$con = DBConnect();
	$result = carsearch($con,$a);

	echo $result

?>