<?php
//class呼び出してFlag情報取得
ini_set( 'display_errors', "On" );
session_start();
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


	require_once '../class/EventMManager.php'; //EventMManagerの読み込み
//抽選当選者取得
$lottery = KanrilotteryData();
?>

<html>
<head>
<title>抽選数管理画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />
</head>

<body>
　　　
<div align="center">
<h1>抽選管理画面</h1>


<div align="right">
<form action="./kanrievent.php" method = "POST">
<input type='hidden' name='kanriid' value="<?php echo $_SESSION['kanriid'];?>">
<input type='hidden' name='kanripass' value="<?php echo $_SESSION['kanripass'];?>">
<input type ="submit" value="戻る" id="submit_button_back"/>
</form>
<br />
</div>

<table border=1>
<?php
//参加者の順位を表示
//縦
$i = 0;
foreach($lottery as $lotterylist){
//学生の名前取得
	$name = KanriUsernameData($lottery[$i][0]);
//抽選種類判定
if($lottery[$i][2] == 1){
$kekka = "ダンス";
}else if($lottery[$i][3] == 1){
$kekka = "ミスター";
}else if($lottery[$i][4] == 1){
$kekka = "ミス";
}else if($lottery[$i][5] == 1){
$kekka = "シンガー";
}
	//横
	
?>
<tr>

	<td>
	<?php echo $lottery[$i][0]; ?>
	</td>
	<td>
	<?php
	echo $name[0][2];
	?>
	</td>
	<td>
	<?php
	echo $kekka;
	?>
	</td>
</tr>
<?php
$i++;
}
?>
</table>

</br>

<form action="../class/MLotteryManager.php" method = "POST">
ミスコン抽選人数：<INPUT TYPE="number" size="15" maxlength="3"  style="font-family:Tahoma; ime-mode:disabled;" NAME="mssettei" pattern="^[0-9A-Za-z]+$" title="半角英数文字で入力してください" required ><br /><br />
ミスター抽選人数：<INPUT TYPE="number" size="15" maxlength="3"  style="font-family:Tahoma; ime-mode:disabled;" NAME="mistersettei" pattern="^[0-9A-Za-z]+$" title="半角英数文字で入力してください" required ><br /><br />
歌うま抽選人数：<INPUT TYPE="number" size="15" maxlength="3"  style="font-family:Tahoma; ime-mode:disabled;" NAME="singersettei" pattern="^[0-9A-Za-z]+$" title="半角英数文字で入力してください" required ><br /><br />
ダンス抽選人数：<INPUT TYPE="number" size="15" maxlength="3"  style="font-family:Tahoma; ime-mode:disabled;" NAME="dancesettei" pattern="^[0-9A-Za-z]+$" title="半角英数文字で入力してください" required ><br /><br />
<input type ="submit" value="抽選開始" id="submit_button_insert"/>
</form>

</div>
</body>
</html>