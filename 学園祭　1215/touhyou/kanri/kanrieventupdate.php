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


//イベント詳細ID
$eventdetailid = $_POST['kanrieventdetailid'];
//イベントID
$eventid = $_POST['kanrieventid'];
//EventMManagerの読み込み
require_once '../class/EventMManager.php'; 
//イベント詳細情報取得
$detail = kanridataildata($eventdetailid);
//EventMManagerの読み込み
require_once '../class/EventMManager.php'; 
//イベント情報取得
$eventname = KanriEventIdData($_SESSION["kanrieventid"]);

?>

<html>
<head>
<title>更新管理画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>更新管理画面</h1>
<h1><?php echo $eventname[0][1]?></h1>

<div align="right">
<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION['kanrieventid'];?>">
<input type ="submit" value="戻る" id="submit_button_back"/>
</form>
<br />
</div>

<form enctype="multipart/form-data" action="../class/FileUpdate.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
写真<img height="100" src="<?php echo $detail[0][3];?>" /></br>
<input type="file" name="userfile" size="30" required ><br /><br />
参加者名: <input type="text" name="text" value="<?php echo $detail[0][1];?>"/><br />
コメント<textarea name="comment" cols="50" rows="5"><?php echo $detail[0][2];?></textarea><br /><br />
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"];?>">
<input type='hidden' name='kanrieventdetailid' value="<?php echo $detail[0][0];?>">
<input type="submit" value="更新" id="submit_button_update">
</form>



</div>
</body>
</html>