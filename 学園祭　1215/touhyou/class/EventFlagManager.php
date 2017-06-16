<?php

ini_set( 'display_errors', "On" );

//iventflag検索(iventid)
function eventflagvote($eventid){
	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
//iventflag検索(iventid)
	$eventflag = EventFlagSelect($con,$eventid);
	return  $eventflag;
}

//学祭公開情報取得
function gakusaiflag(){
	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
//学祭公開情報取得
	$gakusaiflag = GakusaiFlagSelectAll($con);
	return  $gakusaiflag;
}



?>