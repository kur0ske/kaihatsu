<?php

ini_set( 'display_errors', "On" );

	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$kanriquizflag = $_POST["kanriquizflag"];
	//イベントFlag情報更新
//クイズ公開・非公開情報更新
	QuizFlagUpdate($con,$kanriquizflag,1);

	header( "Location: ../kanri/kanrigakusai.php" );


?>