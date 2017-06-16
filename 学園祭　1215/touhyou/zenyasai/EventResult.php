<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　SAMPLE　結果</title>
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
//EventIdManagerの読み込み
require_once '../class/EventIdManager.php';
$event = EventIdData($eventid);
?>

	<header>
		<div class="backdiv">
			<img alt="戻る" src="../img/back.png" onClick="history.back()""></div>
		<h2><?php echo $event[0][1]; ?>　結果</h2>
	</header>


	<div class="contentsdiv">

<?php


require_once '../class/DBManager.php';

$con = DBConnect();

$eventid = $_SESSION['eventid'];

$rank = Ranking($con,$eventid);


for($i=0;$i<3;$i++){
	if($i==0){
		if(!empty($rank [$i][0])){
?>
		<div class="rankdiv">
			<h2>優勝</h2>			
			<img alt="写真"  src="<?php echo $rank[$i][2]; ?>" >
			<h2><?php echo $rank[$i][1]; ?></h2>
		</div>
<?php
		}

	}else{
		if(!empty($rank [$i][0])){

?>
		<div class="rankdiv">
			<h2><?php echo $i+1;?>位</h2>			
			<img alt="写真"  src="<?php echo $rank[$i][2]; ?>" >
			<h2><?php echo $rank[$i][1]; ?></h2>
		</div>

<?php
		}
	}
}
?>
		</div>
</body>

</html>