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


$_SESSION["kanrieventid"] = $_POST["kanrieventid"];

require_once '../class/EventMManager.php'; //EventMManagerの読み込み

//イベント情報取得
$eventname = KanriEventIdData($_SESSION["kanrieventid"]);

?>

<html>
<head>
<title>登録管理画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>登録管理画面</h1>
<h1><?php echo $eventname[0][1]?></h1>

<div align="right">
<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION['kanrieventid'];?>">
<input type ="submit" value="戻る" id="submit_button_back"/>
</form>
<br />
</div>



<form enctype="multipart/form-data" action="../class/File.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
    写真: <input name="userfile" type="file" /></br>
	参加者名: <input type="text" name="text"/><br />
	コメント: <textarea name="comment" cols="50" rows="5"></textarea><br /><br />
	<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION["kanrieventid"];?>">
    <input type="submit" value="登録" id="submit_button_insert"/>

</form>





</div>
</body>
</html>