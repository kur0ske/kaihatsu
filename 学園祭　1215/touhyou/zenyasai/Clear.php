<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　スタート画面</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
	localStorage.clear("usernumber");

</script>

<script type="text/javascript">
	function logincheack(){

		if(document.fm.usernumber.value == "") {

	       	   alert("学籍番号を入力してください");
		}else{
		var usernumber = document.fm.usernumber.value;
			$.ajax({
				type: 'post',
                   		 url: 'http://35.161.0.34/touhyou/class/UserLoginManager.php',
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

<body>
<div id="topArea">
<form name="fm">

<!--//ロゴ表示 -->
<img class="topLogo" alt="Logo" src="../img/logo.png">

<input class="topTextbox" placeholder="学籍番号を入力してください" type="text" name="usernumber">

<img class="buttonDesign1" alt="ログイン" src="../img/loginbutton.png" onClick="logincheack()">
</form>
</div>
</body>


</html>
