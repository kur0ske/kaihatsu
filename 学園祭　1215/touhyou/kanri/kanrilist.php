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
	require_once '../class/EventMManager.php';  //EventMManagerの読み込み
//イベントIDに紐づいたイベント詳細情報取得
$list = kanrieventlist($_SESSION["kanrieventid"]);

require_once '../class/EventMManager.php'; //EventMManagerの読み込み
//イベント情報取得
$eventname = KanriEventIdData($_SESSION["kanrieventid"]);

?>

<html>
<head>
<title>投票数管理画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>投票数管理画面</h1>
<h1><?php echo $eventname[0][1]?></h1>


<div align="right">
<form action="./kanrieventdetail.php" method = "POST">
<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION['kanrieventid'];?>">
<input type ="submit" value="戻る"  id="submit_button_back"/>
</form>
<br />
</div>

<table border=1>
<?php
//参加者の順位を表示
//縦
$i=0;
foreach($list as $eventlist){
	//横
?>
<tr>

	<td>
	<?php echo $eventlist[0]; ?>
	</td>
	
	<td>
	<?php echo $eventlist[1]; ?>
	</td>
	
	<td>
	<form action="./kanrieventupdate.php" method = "POST">
	<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION['kanrieventid'];?>">
	<input type='hidden' name='kanrieventdetailid' value="<?php echo $eventlist[0];?>">
	<input type ="submit" value="更新" id="submit_button_update"/>
	</form>
	</td>
	
	<td>
	<form action="../class/FileDelete.php" method = "POST">
	<input type='hidden' name='kanrieventid' value="<?php echo $_SESSION['kanrieventid'];?>">
	<input type='hidden' name='kanrieventdetailid' value="<?php echo $eventlist[0];?>">
	<input type ="submit" value="削除" id="submit_button_delete"/>
	</form>
	</td>

</tr>
<?php
$i++;
}
?>
</table>

</div>
</body>
</html>