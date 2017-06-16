<?php
ini_set( 'display_errors', "On" );
//DBManager呼び出し
require_once './DBManager.php';
//DBConnent関数を呼び出し
$con = DBConnect();
//学祭Flag情報取得
$gakusaiflag = GakusaiFlagSelectAll($con);

//公開されているか判定
if($gakusaiflag[0][1] == 1){
	    header('location: ../zenyasai/Login.php');
 	    exit();
}else{
		 header('location: ../zenyasai/zenyasaiprivate.php');
 	    exit();
}
?>