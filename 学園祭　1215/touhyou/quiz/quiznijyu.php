<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>二重投票</title>
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
		<div class="commingdiv"><h2>回答済みです。</h2></div>

	
		<?php header("Refresh: 3; URL= ./quizParticipantTop.php");
        		exit(); ?>
</body>



</html>