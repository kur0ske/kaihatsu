<?php

ini_set( 'display_errors', "On" );

	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$kanrihonsaiflag = $_POST["kanrihonsaiflag"];
//イベントFlag情報更新
//本祭公開・非公開情報更新
	HonsaiFlagUpdate($con,$kanrihonsaiflag,1);

	header( "Location: ../kanri/kanrigakusai.php" );


?>