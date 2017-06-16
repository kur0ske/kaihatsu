<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　SAMPLE</title>
<link href="./style.css" rel="stylesheet" type="text/css">

</head>
<?php
session_start();
ini_set( 'display_errors', "On" );

	require_once '../honsaiclass/EventFlagManager.php'; //EventFlagマネージャーの読み込み
//学祭公開情報取得
	$gakusaiflag = gakusaiflag();
//学祭公開情報判定
	if($gakusaiflag[0][2] == 0){
	 header('location: ./honsaiprivate.php');
	}


$eventid = $_SESSION['eventid'];
require_once '../honsaiclass/EventIdManager.php';
$event = EventIdData($eventid);
?>
	<header>
		<div class="backdiv">
			<img alt="戻る" src="../img/back.png" onClick="location.href='./EventSelection.php'">
		</div>
		<h2><?php echo $event[0][1]; ?></h2>
	</header>

<body>

	<div class="contentsdiv">


<?php

require_once '../honsaiclass/VoteManager.php';

$Datail = DatailData();

for($i = 0; $i< count($Datail); $i++){
?>
			<form action='./EventVote.php' method = 'POST' name="Form<?php echo $i; ?>">
			<input type='hidden' name='Datailid' value='<?php echo $Datail[$i][0]; ?>'>
			<input type='hidden' name='usernumber' id ="usernumber">
			<script>
				document.getElementById( 'usernumber' ).value =
				localStorage.getItem( 'usernumber' );
			</script>

			<div class="applicantdiv" onClick='javascript:Form<?php echo $i; ?>.submit()'><img alt="出場者" src="<?php echo $Datail[$i][3]; ?>" ><p><?php echo $Datail[$i][1]; ?></div>
			</form>
<?php
$i++;

}
?>

	</div>

</body>

</html>