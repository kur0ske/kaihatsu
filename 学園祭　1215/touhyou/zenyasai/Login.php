<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　スタート画面</title>
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
					location.href = "./BeforeEventSelection.php";

				}else{

				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("承認に失敗しました");
                    }
                });

	}

</script>

<script type="text/javascript">
	function logincheack(){

		if(document.fm.usernumber.value == "") {

	       	   alert("学籍番号を入力してください");
		}else{
		var usernumber = document.fm.usernumber.value;
			$.ajax({
				type: 'post',
                   		 url: 'http://www.asofestival2016.click/touhyou/class/UserLoginManager.php',
				　data:{usernumber:document.fm.usernumber.value,
                         },
			 dataType:'json',
			success: function (data) {
				//出席テーブルの学籍番号と一致していたら
				 if(data["flag"] == 1){
					if(window.confirm(usernumber+"\n"+data["username"]+"ですか？")){
					// 「OK」時の処理開始 ＋ 確認ダイアログの表示
					localStorage.setItem("usernumber",usernumber);
					location.href = "./BeforeEventSelection.php"; // イベント選択画面へジャンプ
					}
				}else{
					window.alert('出席をしていません'); // 警告ダイアログを表示
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("承認に失敗しました");
                    }
                });
	}
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
<div id="topArea">
<form name="fm">

<!--//ロゴ表示 -->
<img class="topLogo" alt="Logo" src="../img/logo.png">

<input class="topTextbox" placeholder="学籍番号を入力してください" type="number" name="usernumber">

<img class="buttonDesign1" alt="ログイン" src="../img/loginbutton.png" onClick="logincheack()">
</form>
</div>
</body>


</html>
