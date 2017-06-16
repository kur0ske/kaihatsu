<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>問題表示</title>
</head>

<?php

require_once "../quiz/class/DBManager.php";


$con = DBConnect();
$kuizuID = 1;

$quiz = getKuizu($con,$kuizuID);


$getAnswer = getAnswer($con,$kuizuID);


echo '問題文';
echo $quiz[0][2];

echo '<br /><br />';


echo '選択肢';
echo '<br /><br />';

echo 'A(正解):';
echo $getAnswer[0];

echo '<br />';


echo 'B:';
echo $getAnswer[1];

echo '<br />';

echo 'C:';
echo $getAnswer[2];

echo '<br />';

echo 'D:';
echo $getAnswer[3];

echo '<br /><br />';

?>



<input name="Button1" type="button" value="戻る" onClick="location.href='quiztopPage.php'" />

</html>
