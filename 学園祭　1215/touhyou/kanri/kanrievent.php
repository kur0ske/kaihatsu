<?php
session_start();
ini_set( 'display_errors', "On" );

	require_once '../class/LoginManager.php'; //LoginManagerの読み込み


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
	//セッションがなかったら再ログイン
	if(isset($_SESSION["kanriid"]) && isset($_SESSION["kanripass"])){
	}else{
		header( "Location: kanrilogin.html" );
	}


	
?>
<html>
<head>
<title>管理イベント画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>管理イベント画面</h1>


<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="2">
<input type ="submit" value="ミスターコン管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="1">
<input type ="submit" value="ミスコン管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="3">
<input type ="submit" value="歌うま管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="4">
<input type ="submit" value="ダンス管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="5">
<input type ="submit" value="ビフォー管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="6">
<input type ="submit" value="きんにく管理" id="submit_button" />
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="7">
<input type ="submit" value="男きゅんと管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="12">
<input type ="submit" value="女きゅんと管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="8">
<input type ="submit" value="男装管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="9">
<input type ="submit" value="女装管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="10">
<input type ="submit" value="コスプレ管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="11">
<input type ="submit" value="すごい事"  id="submit_button"/>
</form>
<br />

<form action="./quiztopPage.php" method = "POST">
<input type='hidden' name='kanrieventid' value="13">
<input type ="submit" value="クイズ管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrilottery.php" method = "POST">
<input type ="submit" value="抽選結果管理"  id="submit_button"/>
</form>
<br />

<form action="./kanrigakusai.php" method = "POST">
<input type ="submit" value="学祭管理"  id="submit_button"/>
</form>
<br />

</div>
</body>
</html>
