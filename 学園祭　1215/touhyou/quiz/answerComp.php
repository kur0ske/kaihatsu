<!DOCTYPE html>
<html>

<head>


<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>回答完了画面</title>
<link href="./style.css" rel="stylesheet" type="text/css">

</head>

<?php
	require_once './class/EventFlagManager.php'; //EventFlagマネージャーの読み込み
//クイズ公開情報取得
	$gakusaiflag = gakusaiflag();
//クイズ公開情報判定
	if($gakusaiflag[0][3] == 0){
	 header('location: ./quizprivate.php');
	}
?>

<body>
	<header>
		<div class="backdiv">
		</div>
		<h2>クイズ</h2>
	</header>

<?php
/*
	

	require_once "./class/DBManager.php";

	$con = DBConnect();

	$usernumber = $_POST['usernumber'];
	$kuizuid = $_POST['kuizuid'];
	$answer = $_POST['kuizdetail'];


	//参加者データ取得(2重投票確認)
	$flag = particiSerch($con,$usernumber,$kuizuid);

	if(!empty($flag[0][0])){

      	if($flag[0][0] == $usernumber){
dconnect($con);
	header("Refresh: 0; URL= ./quiznijyu.php");
	exit;
	}
	}else{
	
	answerRegi($con,$usernumber,$kuizuid,$answer);
	}

	

	dconnect($con);
*/?>

		<div class="commingdiv"><h2>回答しました。</h2></div>
		<?php header("Refresh: 3; URL= ./quizParticipantTop.php");
        		exit(); ?>
</body>

</html>
