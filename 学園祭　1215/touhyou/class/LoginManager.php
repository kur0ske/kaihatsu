<?php

ini_set( 'display_errors', "On" );


//管理者のログイン機能
	function kanrilogin($kanriid,$kanripass){
	//require_once './DBManager.php';
	require_once ("DBManager.php");
	$con = DBConnect();

	
	//ログイン関数呼び出し
	$login = kanricheck($con,$kanriid,$kanripass);

	DBDConnect($con);
	while ($data = $login){
	
		if($kanriid == $data[0][0] && $kanripass == $data[0][1]){
			return 'true';
		}
	}
	
	return 'false';
	//値があればログイン、値がなければ再ログイン
	}

?>