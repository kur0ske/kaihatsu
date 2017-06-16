<?php
ini_set( 'display_errors', "On" );
//DBManager呼び出し
require_once './DBManager.php';
//DBConnent関数を呼び出し
$con = DBConnect();
//学祭Flag情報取得
$gakusaiflag = GakusaiFlagSelectAll($con);

//公開されているか判定
if($gakusaiflag[0][2] == 1){
	    header('location: ../honsai/EventSelection.php');
 	    exit();
}else{
		 header('location: ../honsai/honsaiprivate.php');
 	    exit();
}
?>