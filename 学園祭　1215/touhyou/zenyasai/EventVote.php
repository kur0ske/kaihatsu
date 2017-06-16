<!DOCTYPE html>

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

<script type="text/javascript">
	function votecheack(){
			var usernumber = localStorage.getItem('usernumber');
			$.ajax({
				type: 'post',
                   		 url: 'http://www.asofestival2016.click/touhyou/class/DecisionManager.php',
				　data:{usernumber:usernumber,
                         },
			 dataType:'json',
			success: function (data) {	
				if(data["flag"] == 'true'){
			       	   alert("2重投票です");
				}else if(data["flag"] == 'false'){
                        			alert("投票しました");				
				document.getElementById( 'usernumber' ).value = usernumber;
				document.fm.submit();
				}else{
				  alert("投票期間が終了しています");
				location.href = "./BeforeEventSelection.php";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
                        	alert("承認に失敗しました");
                    }
                });
	}

</script>







<body>
	<header>
		<div class="backdiv">
			<img alt="戻る" src="../img/back.png" onClick="location.href='EventVoteDetail.php'"></div>
		<h2><?php echo $event[0][1] ?></h2>
	</header>


	<?php

		require_once '../class/DatailManager.php';
		require_once '../class/VoteConfirmation.php';

		$detailid = $_POST['Datailid'];

		$Datail = DatailData($detailid);

		//$usernumber = $_POST['usernumber'];

		$votedata = VoteConfimation();

	?>


	<div class="contentsdiv">
		<div class="detaildiv">			
			<img alt="写真"  src="<?php echo $Datail[0][3]; ?>" >


			<?php 
				if($votedata == 'false'){
					
			?>
			<img alt="投票" src="../img/votebutton.png" style="cursor:pointer" onClick='votecheack()'>

			<form action='../class/GakusaiVoteInsert.php' method = 'POST' name ="fm">
			<input type='hidden' name='usernumber' id ="usernumber">
			<input type='hidden' name='eventdetailid' value = "<?php echo $Datail[0][0]; ?>">
			</form>
			<?php
				}
			?>
			
		
			<h2><?php echo $Datail[0][1]; ?></h2>
			<p><?php echo $Datail[0][2]; ?></p>
		</div>
	</div>
</body>

</div>
</html>