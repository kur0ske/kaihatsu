<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　</title>
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
?>

	<header>
		<div class="backdiv">
			<img alt="戻る" src="../img/back.png" onClick="location.href='../../index.html'"></div>
		<h2>前夜祭</h2>
	</header>
	<div class="contentsdiv">
		<div class="commingdiv"><h2>まだ公開していません。しばらくしてから再度アクセスしてください。</h2></div>

	</div>



</body>
</html>



