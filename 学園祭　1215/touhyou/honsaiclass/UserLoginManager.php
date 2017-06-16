<?php
ini_set( 'display_errors', "On" );


require_once './DBManager.php';


//DBConnent関数を呼び出し
$con = DBConnect();

//POSTの値を格納
$usernumber = $_POST["usernumber"];

$_SESSION["usernumber"] = $usernumber;

//flg取得
$flag = UserFlagGet($con,$usernumber);

//flag判定
if($flag == 1){
	//学籍番号に紐づいた名前を取得
	$name = UsernumberSelect($con,$usernumber);
	$ar = array("username" => $name[0][2],"flag" => $flag);

	}else{

	$ar = $flag;

}
	echo json_encode($ar);
	//DB切断
	 DBDConnect($con);
	

?>