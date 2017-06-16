<?php

ini_set( 'display_errors', "On" );

	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$eventid = $_POST["kanrieventid"];
	$lotteryflag = $_POST["kanrilotteryflag"];
//イベントFlag情報更新
//イベント抽選結果公開・非公開情報更新
	EventFlagLotteryUpdate($con,$eventid,$lotteryflag);

	header( "Location: ../kanri/kanriflag.php" );


?>