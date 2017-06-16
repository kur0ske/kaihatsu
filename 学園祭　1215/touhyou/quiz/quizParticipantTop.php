<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>クイズトップページ</title>
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
			<img alt="戻る" src="../img/back.png" onClick="location.href='../zenyasai/BeforeEventSelection.php'"></div>
		<h2>クイズ</h2>
	</header>

<br /><br />

<div class="contentsdiv">

<div class="menudiv" onClick="location.href='answer.php'">
<h2>回答する</h2>
</div>


<br /><br />




</div>


<br /><br />

</body>
</html>
