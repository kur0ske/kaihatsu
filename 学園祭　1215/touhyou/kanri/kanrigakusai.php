<?php
//class呼び出してFlag情報取得
session_start();
ini_set( 'display_errors', "On" );
	require_once '../class/LoginManager.php'; //LoginManagerの読み込み
//セッションがなかったら再ログイン
	if(isset($_SESSION["kanriid"]) && isset($_SESSION["kanripass"])){
	}else{
		header( "Location: kanrilogin.html" );
	}
//ログインチェック
	if(!isset($_SESSION["kanriid"]) && !isset($_SESSION["kanripass"])){
		//IDとPASSがあっているか判定
		$login = kanrilogin($_POST["kanriid"],$_POST["kanripass"]);

		if($login == 'true'){
				$_SESSION["kanriid"] = $_POST["kanriid"];
				$_SESSION["kanripass"] = $_POST["kanripass"];
		}else{
		//あっていないければ再ログイン
		header( "Location: kanrilogin.html" );
		}

	}


	require_once '../class/EventFlagManager.php';  //EventFlagManager.phpの読み込み
//学祭公開情報取得
$flaglist = gakusaiflag();


?>

<html>
<head>
<title>Flag管理画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>Flag管理画面</h1>


<div align="right">
<form action="./kanrievent.php" method = "POST">
<input type='hidden' name='kanriid' value="<?php echo $_SESSION['kanriid'];?>">
<input type='hidden' name='kanripass' value="<?php echo $_SESSION['kanripass'];?>">
<input type ="submit" value="戻る" id="submit_button_back"/>
</form>
<br />
</div>

<?php
//公開か非公開かの判定
if($flaglist[0][1] == 1){
$zenyasaiflag = 0;
?>
<h2>公開</h2>
<?php
}else{
$zenyasaiflag = 1;
?>
<h3>非公開</h3>
<?php
}
?>
<form action="../class/MZenyasaiFlagManager.php" method = "POST">
<input type='hidden' name='kanrizenyasaiflag' value="<?php echo $zenyasaiflag; ?>">
<input type ="submit" value="前夜祭Flag管理" id="submit_button"/>
</form>
<br />



<?php
//公開か非公開かの判定
if($flaglist[0][2] == 1){
$honsaiflag = 0;
?>
<h2>公開</h2>
<?php
}else{
$honsaiflag = 1;
?>
<h3>非公開</h3>
<?php
}
?>
<form action="../class/MHonsaiFlagManager.php" method = "POST">
<input type='hidden' name='kanrihonsaiflag' value="<?php echo $honsaiflag; ?>">
<input type ="submit" value="本祭Flag管理" id="submit_button"/>
</form>
<br />


<?php
//公開か非公開かの判定
if($flaglist[0][3] == 1){
$quizflag = 0;
?>
<h2>公開</h2>
<?php
}else{
$quizflag = 1;
?>
<h3>非公開</h3>
<?php
}
?>
<form action="../class/MQuizFlagManager.php" method = "POST">
<input type='hidden' name='kanriquizflag' value="<?php echo $quizflag; ?>">
<input type ="submit" value="クイズFlag管理" id="submit_button"/>
</form>
<br />

</div>
</body>
</html>