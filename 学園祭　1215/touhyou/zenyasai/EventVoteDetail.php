<!DOCTYPE html>

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
			<img alt="戻る" src="../img/back.png" onClick="location.href='./BeforeEventSelection.php'">
		</div>
		<h2><?php echo $event[0][1]; ?></h2>
	</header>

<body>

	<div class="contentsdiv">


<?php

require_once '../class/VoteManager.php';

$Datail = DatailData();

$i = 0;
foreach($Datail as $data){
?>
			
			<form action='./EventVote.php' method = 'POST' name="Form<?php echo $i; ?>">
			<input type='hidden' name='Datailid' value='<?php echo $Datail[$i][0]; ?>'>
			<input type='hidden' name='usernumber' id ="usernumber">
			<script>
				document.getElementById( 'usernumber' ).value =
				localStorage.getItem( 'usernumber' );
			</script>

			<div class="applicantdiv" onClick='javascript:Form<?php echo $i; ?>.submit()'><img alt="出場者" src="<?php echo $Datail[$i][3]; ?>" ><p><?php echo $Datail[$i][1]; ?></div>
			</form>


<?php

$i++;

}
?>

	</div>

</body>

</html>