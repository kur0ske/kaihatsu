<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　前夜祭メニュー</title>
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
<?php
	require_once '../class/EventFlagManager.php'; //EventFlagマネージャーの読み込み
//学祭公開情報取得
	$gakusaiflag = gakusaiflag();
//学祭公開情報判定
	if($gakusaiflag[0][1] == 0){
	 header('location: ./zenyasaiprivate.php');
	}
?>

<body>
	<header>
		<h2><img alt="ロゴ" src="../img/headerlogo.png" class="headerlogo" >前夜祭イベント</h2>
	</header>


	<div class="contentsdiv">
	
			<form action='../class/EventManager.php' method = 'POST' name="dance">
			<div class="menudiv" onClick='javascript:dance.submit()'><h2>ダンス</h2></div>
			<input type='hidden' name='eventid' value="4">
			</form>	

			<form action='../class/EventManager.php' method = 'POST' name="misukon">
			<input type='hidden' name='eventid' value="1">
			<div class="menudiv" onClick='javascript:misukon.submit()'><h2>ミスコン</h2></div>
			</form>

			<form action='../class/EventManager.php' method = 'POST' name="mister">
			<div class="menudiv" onClick='javascript:mister.submit()'><h2>ミスターコン</h2></div>
			<input type='hidden' name='eventid' value="2">
			</form>

			<form action='../class/EventManager.php' method = 'POST' name="singer">
			<div class="menudiv" onClick='javascript:singer.submit()'><h2>歌うま</h2></div>
			<input type='hidden' name='eventid' value="3">
			</form>

			<form action='../quiz/quizLogin.php' method = 'POST' name="quiz">
			<div class="menudiv" onClick='javascript:quiz.submit()'><h2>クイズ</h2></div>
			</form>

			<form action='../class/LotteryManager.php' method = 'POST' name="lottery">
			<div class="menudiv" onClick='javascript:lottery.submit()'><h2>抽選結果</h2></div>
			<input type='hidden' name='usernumber' id ="usernumber">
			<script>
				//hiddenのusernumberにローカルストレージに入っている学籍番号をvalueとしてセットする。
				document.getElementById( 'usernumber' ).value =
				localStorage.getItem( 'usernumber' );
			</script>

			</form>
	</div>

</body>


</div>
</html>