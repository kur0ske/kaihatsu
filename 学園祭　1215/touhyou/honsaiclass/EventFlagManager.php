<?php

ini_set( 'display_errors', "On" );

function eventflagvote($eventid){
	require_once '../honsaiclass/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$eventflag = EventFlagSelect($con,$eventid);
	return  $eventflag;
}

function gakusaiflag(){
	require_once '../honsaiclass/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
	$gakusaiflag = GakusaiFlagSelectAll($con);
	return  $gakusaiflag;
}

?>