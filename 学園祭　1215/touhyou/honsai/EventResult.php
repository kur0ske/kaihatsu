<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　　結果</title>
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
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
		<img alt="戻る" src="../img/back.png" onClick="location.href='EventSelection.php'"></div>
		<h2><?php echo $event[0][1]; ?>結果</h2>
	</header>


	<div class="contentsdiv">

<?php

require_once '../honsaiclass/DBManager.php';

$con = DBConnect();

$eventid = $_SESSION['eventid'];

$rank = Ranking($con,$eventid);


for($i=0;$i<3;$i++){
	if($i==0){
		if(!empty($rank [$i][0])){
?>
		<div class="rankdiv">
			<h2>優勝</h2>			
			<img alt="写真"  src="<?php echo $rank[$i][2]; ?>" >
			<h2><?php echo $rank[$i][1]; ?></h2>
		</div>
<?php
		}
	}else{
		if(!empty($rank [$i][0])){
?>
		<div class="rankdiv">
			<h2><?php echo $i+1;?>位</h2>			
			<img alt="写真"  src="<?php echo $rank[$i][2]; ?>" >
			<h2><?php echo $rank[$i][1]; ?></h2>
		</div>

<?php
		}
	}
}
?>
		</div>
</body>

</html>