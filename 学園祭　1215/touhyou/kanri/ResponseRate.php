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
<title>回答率表示画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
<div align="center">

<?php

require_once "../quiz/class/DBManager.php";

require_once "../quiz/class/answerRate.php";
list($systemRate,$creatibRate,$businessRate,$gaigoRate,$iryoRate,$kentikuRate,$komuinRate,$jidousyaRate) = Rate();

$con = DBConnect();


$quiz = getKuizuAll($con);

echo "<h1>";
echo '問題文';
echo "<br />";
echo $quiz[0][2];
echo "</h1>";
?>

<div align="right">
<form action="quiztopPage.php" method = "POST">
<input type ="submit" value="戻る" id="submit_button_back"/>
</form>
</div>


<?php




echo '選択肢';


echo "<p class='red'>";
echo 'A(正解):';
echo $quiz[0][3];
echo "</p>";



echo 'B:';
echo $quiz[0][4];

echo '<br />';

echo 'C:';
echo $quiz[0][5];

echo '<br />';

echo 'D:';
echo $quiz[0][6];

echo '<br /><br />';

echo "<p class='purple'>";
echo "情報ビジネス専門学校(システム系)<br />";
echo  ($systemRate)."%</p>";


echo "<p class='yellow'>";
echo "情報ビジネス専門学校(クリエイティブ系)<br />";
echo ($creatibRate)."%</p>";

echo "<p class='orangered'>";
echo "情報ビジネス専門学校(ビジネス系)<br />";
echo ($businessRate)."%</p>";

echo "<p class='mediumseagreen'>";
echo "外語観光＆製菓専門学校<br />";
echo ($gaigoRate)."%</p>";

echo "<p class='deeppink'>";
echo "医療福祉専門学校<br />";
echo ($iryoRate)."%</p>";

echo "<p class='seagreen'>";
echo "建築＆デザイン専門学校<br />";
echo ($kentikuRate)."%</p>";

echo "<p class='slateblue'>";
echo "公務員専門学校<br />";
echo ($komuinRate)."%</p>";

echo "<p class='slategray'>";
echo "工科自動車大学校<br />";
echo ($jidousyaRate)."%</p>";


?>


</div>
</body>

</html>
