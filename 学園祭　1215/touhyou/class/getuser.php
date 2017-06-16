<?php 
	$a = $_POST["school"];
	$b = $_POST["type"];
//	$a = "ABCC";
//	$b = "情報工学科";
	header("Content-Type:text/html; charset=UTF-8");
	require_once '../class/DBManager.php';

	$con = DBConnect();
	$result = getuser($con,$a,$b);
	

	$x = 1;

	while($data = mysqli_fetch_array($result)){
	$ar[] = array("num".$x => $data['usernumber']); // "hoge" => "fuga"
	$ar[] = array("name".$x => $data['username']); // "aa" => "bb"
	$ar[] = array("attend".$x => $data['attendanceFlag']);
	$x = $x+1;
	}

	echo json_encode($ar,JSON_UNESCAPED_UNICODE);

?>