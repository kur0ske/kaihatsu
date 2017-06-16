<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　本祭メニュー</title>
<link href="./style.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>	
	<script type="text/javascript">
	if(localStorage.getItem("usernumber") == null){
					$.ajax({
				type: 'post',
                   		 url: 'http://35.161.0.34/touhyou/honsaiclass/UserUpdateSelect.php',
			 dataType:'json',
			success: function (data) {
					localStorage.setItem("usernumber",data["usernumber"]);
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("承認に失敗しました");
                    }
                });
}
	</script>

<?php
	require_once '../honsaiclass/EventFlagManager.php'; //EventFlagマネージャーの読み込み
//学祭公開情報取得
	$gakusaiflag = gakusaiflag();
//学祭公開情報判定
	if($gakusaiflag[0][2] == 0){
	 header('location: ./honsaiprivate.php');
	}
?>

<body>
	<header>
		<h2><img alt="ロゴ" src="../img/headerlogo.png" class="headerlogo" >本祭イベント</h2>
	</header>


	<div class="contentsdiv">

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="befor">
			<input type='hidden' name='eventid' value="5">
			<div class="menudiv" onClick='javascript:befor.submit()'><h2>ビフォーアフターの階層</h2></div>
			</form>

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="muscle">
			<div class="menudiv" onClick='javascript:muscle.submit()'><h2>筋肉の階層</h2></div>
			<input type='hidden' name='eventid' value="6">
			</form>

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="mister">
			<div class="menudiv" onClick='javascript:mister.submit()'><h2>きゅんと(男)の階層</h2></div>
			<input type='hidden' name='eventid' value="7">
			</form>

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="girl">
			<div class="menudiv" onClick='javascript:girl.submit()'><h2>きゅんと(女)の階層</h2></div>
			<input type='hidden' name='eventid' value="12">
			</form>

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="dansou">
			<div class="menudiv" onClick='javascript:dansou.submit()'><h2>男装の階層</h2></div>
			<input type='hidden' name='eventid' value="8">
			</form>

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="josou">
			<div class="menudiv" onClick='javascript:josou.submit()'><h2>女装の階層</h2></div>
			<input type='hidden' name='eventid' value="9">
			</form>

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="kosupure">
			<div class="menudiv" onClick='javascript:kosupure.submit()'><h2>コスプレの階層</h2></div>
			<input type='hidden' name='eventid' value="10">
			</form>

			<form action='../honsaiclass/EventManager.php' method = 'POST' name="sugoi">
			<div class="menudiv" onClick='javascript:sugoi.submit()'><h2>すごい事の階層</h2></div>
			<input type='hidden' name='eventid' value="11">
			</form>

	</div>
</body>

</div>
</html>