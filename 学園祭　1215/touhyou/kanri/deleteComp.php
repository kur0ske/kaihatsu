<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>削除完了画面</title>

</head>

<?php

	require_once "../quiz/class/DBManager.php";

	$con = DBConnect();

	kuizuDel($con,$_POST['kuizuID']);

	dconnect($con);
?>



<body>

問題の削除が完了しました。
<br /><br />

<input name="Button1" type="button" value="戻る" onClick="location.href='quiztopPage.php'" />


</body>

</html>
