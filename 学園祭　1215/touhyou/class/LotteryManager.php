<?php
ini_set( 'display_errors', "On" );


require_once './DBManager.php';

//ローカルストレージから値を取得
$usernumber = $_POST["usernumber"];

//DBConnent関数を呼び出し
$con = DBConnect();

//抽選結果flg取得
$flag = EventFlagSelectAll($con);
$userflag = UserFlagGetAll($con,$usernumber);
//flag判定
if($flag[0][4] == 1 && $flag[1][4] == 1 && $flag[3][4] == 1 && $flag[2][4] == 1){
	
	if($userflag[0][2] == 1 || $userflag[0][3] == 1 || $userflag[0][4] == 1 || $userflag[0][5] == 1){
	  //当選画面に行く
		header('location: ../zenyasai/lots.php');
		exit();

	}else{
		echo "はずれ画面に行く";
		header('location: ../zenyasai/nolots.php');
		exit();
	}

}else{
	echo "privateに行く";
		header('location: ../zenyasai/private2.php');
		exit();


}



	//DB切断
	 DBDConnect($con);
	

?>