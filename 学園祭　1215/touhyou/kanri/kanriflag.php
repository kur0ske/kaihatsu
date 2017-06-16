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

//EventFlagManagerの読み込み
	require_once '../class/EventFlagManager.php'; 

$_SESSION["kanrieventid"];
//iventflag検索(iventid)
$flaglist = eventflagvote($_SESSION["kanrieventid"]);

require_once '../class/EventMManager.php'; //EventMManagerの読み込み

//イベント情報取得
$eventname = KanriEventIdData($_SESSION["kanrieventid"]);

?>

<html>
<head>
<title>Flag管理画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>Flag管理画面</h1>
<h1><?php echo $eventname[0][1]?></h1>

<div align="right">
<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"];?>">
<input type ="submit" value="戻る"  id="submit_button_back"/>
</form>
<br />
</div>

<?php
//公開か非公開かの判定
if($flaglist[0][2] == 1){
$releaseflag = 0;
?>
<h2>公開</h2>
<?php
}else{
$releaseflag = 1;
?>
<h3>非公開</h3>
<?php
}
?>
<form action="../class/MEventReleaseFlagManager.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"];?>">
<input type='hidden' name='kanrireleaseflag' value="<?php echo $releaseflag; ?>">
<input type ="submit" value="公開Flag管理"  id="submit_button"/>
</form>
<br />


<?php
//投票開始か終了かの判定
if($flaglist[0][1] == 1){
$voteflag = 0;
?>
<h2>投票開始</h2>
<?php
}else{
$voteflag = 1;
?>
<h3>投票終了</h3>
<?php
}
?>

<form action="../class/MEventVoteFlagManager.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"];?>">
<input type='hidden' name='kanrivoteflag' value="<?php echo $voteflag; ?>">
<input type ="submit" value="投票Flag管理"  id="submit_button"/>
</form>
<br />



<?php
//結果表示か非表示かの判定
if($flaglist[0][3] == 1){
$resultflag = 0;
?>
<h2>結果表示</h2>
<?php
}else{
$resultflag = 1;
?>
<h3>結果非表示</h3>
<?php
}
?>
<form action="../class/MEventResultFlagManager.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"];?>">
<input type='hidden' name='kanriresultflag' value="<?php echo $resultflag; ?>">
<input type ="submit" value="結果表示Flag管理"  id="submit_button"/>
</form>
<br />


<?php
//抽選結果表示か非表示かの判定
if($flaglist[0][4] == 1){
$lotteryflag = 0;
?>
<h2>抽選結果表示</h2>
<?php
}else{
$lotteryflag = 1;
?>
<h3>抽選結果非表示</h3>
<?php
}
?>

<form action="../class/MEventLotteryFlagManager.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"];?>">
<input type='hidden' name='kanrilotteryflag' value="<?php echo $lotteryflag; ?>">
<input type ="submit" value="抽選結果Flag管理"  id="submit_button"/>
</form>
<br />


</div>
</body>
</html>