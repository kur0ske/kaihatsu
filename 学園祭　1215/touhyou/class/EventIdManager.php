<?php
function EventIdData($eventid){

require_once '../class/DBManager.php';

//DBConnent関数を呼び出し
$con = DBConnect();

//id取得
$event =  IventSelect($con,$eventid);


	//DB切断
	 DBDConnect($con);

	return $event;

}
?>