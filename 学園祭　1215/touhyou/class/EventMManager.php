<?php

ini_set( 'display_errors', "On" );

//イベントIDと一致したランキング表示
function rankinglist($eventid){
	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
//イベントごとのランキング検索
	$ranking = Ranking($con,$eventid);
	return $ranking;
}

//イベントIDに紐づいたイベント詳細情報取得
function kanrieventlist($eventid){
	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();
//iventmg全件検索
$detailid = IventMgSelect($con,$eventid);
$eventdatail = array();
$j=0;
foreach($detailid as $id ){
//iventdetail全件検索
	$data = IventDetailSelect($con,$id['iventdetailID']);
	//echo $data[0][0];
	$eventdatail[$j][0] = $data[0][0];
	$eventdatail[$j][1] = $data[0][1];
	$eventdatail[$j][2] = $data[0][2];
	$eventdatail[$j][3] = $data[0][3];

$j++;
}
	//DB切断
	 DBDConnect($con);

	return $eventdatail;
}

//イベント詳細情報取得
function kanridataildata($detailid){

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//iventdetail全件検索
$detail = IventDetailSelect($con,$detailid);


	//DB切断
	 DBDConnect($con);

	return $detail;
}

//イベント情報取得
function KanriEventIdData($eventid){

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//ivent情報全件取得
$event =  IventSelect($con,$eventid);


	//DB切断
	 DBDConnect($con);

	return $event;

}

//抽選当選者取得
function KanrilotteryData(){

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//ユーザーFlag抽選全件検索
$lottery =  UserFlagLotteryGet($con);


	//DB切断
	 DBDConnect($con);

	return $lottery;

}

function KanriUsernameData($usernumber){

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//usernumberと一致した投票テーブルの全件検索
$number =  UsernumberSelect($con,$usernumber);


	//DB切断
	 DBDConnect($con);

	return $number;

}
?>