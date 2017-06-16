<?php
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


//選択されたイベントIDを変数に入れる
$_SESSION["kanrieventid"] = $_POST["kanrieventid"];

//EventMManageｒの読み込み
require_once '../class/EventMManager.php'; 

//イベント情報取得
$eventname = KanriEventIdData($_SESSION["kanrieventid"]);
?>

<html>
<head>
<title>イベント管理情報選択画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>イベント管理情報選択画面</h1>
<h1><?php echo $eventname[0][1]; ?></h1>

<div align="right">
<form action="./kanrievent.php" method = "POST">
<input type='hidden' name='kanriid' value="<?php echo $_SESSION['kanriid'];?>">
<input type='hidden' name='kanripass' value="<?php echo $_SESSION['kanripass'];?>">
<input type ="submit" value="戻る"  id="submit_button_back"/>
</form>
<br />
</div>

<form action="./kanriflag.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"]; ?>">
<input type ="submit" value="Flag管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrivote.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"]; ?>">
<input type ="submit" value="投票数管理"  id="submit_button"/>
</form>
<br />

<form action="./kanriregistration.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"]; ?>">
<input type ="submit" value="登録管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrilist.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"]; ?>">
<input type ="submit" value="削除・更新管理"  id="submit_button"/>
</form>
<br />

</div>
</body>
</html>