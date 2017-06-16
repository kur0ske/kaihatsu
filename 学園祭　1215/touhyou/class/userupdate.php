<?php 
	$a = $_POST["id"];
//	$a = "01-2E-39-08-24-C4-64-31";
//	$b = "情報工学科";
	header("Content-Type:text/html; charset=UTF-8");
//	$id = $_SESSION['id'];
// dbmanager.php?d?????T;
	require_once '../class/DBManager.php';
// dbmanager.php??N???X?d?g??
	$con = DBConnect();
	userupdate($con,$a);

?>