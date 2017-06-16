<!DOCTYPE html>

<?php
//class呼び出してFlag情報取得
session_start();
ini_set( 'display_errors', "On" );
	if(isset($_SESSION["kanriid"]) && isset($_SESSION["kanripass"])){
	}else{
		header( "Location: kanrilogin.html" );
	}

?>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>トップページ</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
<div align="center">
<h1>クイズ管理</h1>
<br /><br />
<div align="right">
<form action="./kanrievent.php" method = "POST">
<input type ="submit" value="戻る"  id="submit_button_back"/>
</div>

<input name="Button1" type="button" value="問題登録" onClick="location.href='questionRegistration.php'" id="submit_button"/>
<br /><br />
<input name="Button1" type="button" value="問題削除" onClick="location.href='questionDelete.php'" id="submit_button"/>
<br /><br />
<input name="Button1" type="button" value="回答率表示" onClick="location.href='ResponseRate.php'" id="submit_button"/>
<br /><br />
</div>
</body>

</html>
