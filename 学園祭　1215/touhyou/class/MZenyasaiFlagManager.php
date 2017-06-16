<?php

ini_set( 'display_errors', "On" );

	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$kanrizenyasaiflag = $_POST["kanrizenyasaiflag"];
//イベントFlag情報更新
//前夜祭公開・非公開情報更新
	ZenyasaiFlagUpdate($con,$kanrizenyasaiflag,1);

	header( "Location: ../kanri/kanrigakusai.php" );


?>