<?php

ini_set( 'display_errors', "On" );

	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$eventid = $_POST["kanrieventid"];
	$resultflag = $_POST["kanriresultflag"];
//イベントFlag情報更新
//イベント結果公開・非公開情報更新
	EventFlagResultUpdate($con,$eventid,$resultflag);

	header( "Location: ../kanri/kanriflag.php" );


?>