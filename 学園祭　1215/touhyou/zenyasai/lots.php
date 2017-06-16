<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　SAMPLE　出場者詳細画面</title>
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

<script type="text/javascript">

	function cheack(){

	//入力されたパスワードを格納
	var pw  = document.fm.pw.value;

	window.confirm("係員ですか？");
	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(pw=="111"){
		window.alert('承認されました');
	}

	// 「キャンセル」時の処理開始
	else{

		window.alert('承認が失敗しました'); // 警告ダイアログを表示

	}
		
}

function SAMPLE(){
location.href='BeforeEventSelection.php'
}

</script>

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
		<div class="backdiv">
			<img alt="戻る" src="../img/back.png" onClick="SAMPLE();"></div>
		<h2>抽選結果</h2>
	</header>
   <form name="fm">
	<div class="contentsdiv">
		<div class="lotsdiv">			
			<h2>当選しました！</h2>
		<h2>学籍番号:
		<script> document.write(localStorage.getItem("usernumber")); </script></h2>
			<p>この画面を出口で係員にお見せください</p>
			<input type="text" class="lotstextbox" placeholder="係員以外は絶対に入力しないでください" name ="pw">
			<img class="buttonDesign1" alt="当選確認" src="../img/lotsbutton.png" onClick="cheack();">
		</div>
       	</div>
  </form>
　　</body>
</html>



