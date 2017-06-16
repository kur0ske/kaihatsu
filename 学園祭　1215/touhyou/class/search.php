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
	$result = search($con,$a);

//	echo "{\"num1\":\"1111\"},{\"name1\":\"田中太郎\"},{\"attend1\":\"0\"},{\"num2\":\"2222\"},{\"name2\":\"山田太郎\"},{\"attend2\":\"0\"}";
	echo $result

?>