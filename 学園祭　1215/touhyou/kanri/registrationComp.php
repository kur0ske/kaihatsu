<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>登録完了画面</title>
</head>

<body>
<?php

require_once "../quiz/class/DBManager.php";

$con = DBConnect();



$question = $_POST["question"];
$bingoAnswer = $_POST["bingoanswer"];
$dummy1 = $_POST["dummy1"];
$dummy2 = $_POST["dummy2"];
$dummy3 = $_POST["dummy3"];
$iventid = 13;


KuizuRegi($con,$iventid,$question,$bingoAnswer,$dummy1,$dummy2,$dummy3);

dconnect($con);

?>

問題の登録が完了しました。
<br /><br />
<form action="quiztopPage.php" method = "POST">
<input type ="submit" value="戻る" />
</form>

</body>

</html>
