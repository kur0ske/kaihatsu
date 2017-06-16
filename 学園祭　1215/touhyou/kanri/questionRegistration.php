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
<title>問題登録画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>

<div align="center">
<h1>クイズ登録</h1>
<br />
<div align="right">
<form action="quiztopPage.php" method = "POST">
<input type ="submit" value="戻る" id="submit_button_back"/>
</form>
</div>
<br /><br />

問題文<br />
<form action="./registrationComp.php" method="POST">
<input name="question" input type="text" />

<br /><br />

<br />
正解となる選択肢<br />
A<input name="bingoanswer" value="" input type="text" />
<br /><br /><br />
ダミーの選択肢<br />
B<input name="dummy1" value="" input type="text" />
<br />
C<input name="dummy2" value="" input type="text" />
<br />
D<input name="dummy3" value="" input type="text" />
<br /><br />

<input type ="submit" value="登録" id="submit_button_insert"/>
</form>





</body>

</html>
