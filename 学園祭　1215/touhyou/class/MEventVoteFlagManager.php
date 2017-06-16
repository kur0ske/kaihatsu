<?php

ini_set( 'display_errors', "On" );

	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$eventid = $_POST["kanrieventid"];
	$voteflag = $_POST["kanrivoteflag"];
//イベントFlag情報更新
//投票開始終了情報更新
	EventFlagVoteUpdate($con,$eventid,$voteflag);

	header( "Location: ../kanri/kanriflag.php" );


?>