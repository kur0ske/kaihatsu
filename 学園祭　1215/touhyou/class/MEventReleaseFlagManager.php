<?php

ini_set( 'display_errors', "On" );

	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$eventid = $_POST["kanrieventid"];
	$releaseflag = $_POST["kanrireleaseflag"];
//イベントFlag情報更新
//イベント公開・非公開情報更新
	EventFlagReleaseUpdate($con,$eventid,$releaseflag);

	header( "Location: ../kanri/kanriflag.php" );


?>