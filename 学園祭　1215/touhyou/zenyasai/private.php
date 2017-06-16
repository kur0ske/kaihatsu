<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　SAMPLE</title>
<link href="./style.css" rel="stylesheet" type="text/css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
	if(localStorage.getItem("usernumber") != null){
			var usernumber = localStorage.getItem("usernumber");
					$.ajax({
				type: 'post',
                   		 url: 'http://www.asofestival2016.click/touhyou/class/UserLoginManager.php',
				　data:{usernumber:usernumber,
                         },
			 dataType:'json',
			success: function (data) {
				//出席テーブルの学籍番号と一致していたら
				 if(data["flag"] == 1){

				}else{
				alert("出席していません");
				location.href = "./Login.php"

				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("承認に失敗しました");
                    }
                });

	}

</script>

</head>
<body>
<?php
session_start();
ini_set( 'display_errors', "On" );

	require_once '../class/EventFlagManager.php'; //EventFlagマネージャーの読み込み
//学祭公開情報取得
	$gakusaiflag = gakusaiflag();
//学祭公開情報判定
	if($gakusaiflag[0][1] == 0){
	 header('location: ./zenyasaiprivate.php');
	}

$eventid = $_SESSION['eventid'];
require_once '../class/EventIdManager.php';
$event = EventIdData($eventid);
?>
	<header>
		<div class="backdiv">
			<img alt="戻る" src="../img/back.png" onClick="history.back()"></div>
		<h2><?php echo $event[0][1]; ?></h2>
	</header>
	<div class="contentsdiv">
		<div class="commingdiv"><h2>まだ公開していません。しばらくしてから再度アクセスしてください。</h2></div>

	</div>



</body>
</html>



