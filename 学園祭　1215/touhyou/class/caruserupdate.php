<?php 
	$a = $_POST["id"];
//	$a = "4444";
//	$b = "���H�w��";
	header("Content-Type:text/html; charset=UTF-8");
//	$id = $_SESSION['id'];
	require_once '../class/DBManager.php';
// dbmanager.php??N???X?d?g??
	$con = DBConnect();
	caruserupdate($con,$a);


?>