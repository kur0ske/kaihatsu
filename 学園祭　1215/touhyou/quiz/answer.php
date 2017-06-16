<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>問題回答画面</title>
<link href="./style.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
function quizcheack(mondai){

var answer = mondai;

var usernumber = localStorage.getItem('usernumber');
			$.ajax({
				type: 'post',
                   		 url: 'http://www.asofestival2016.click/touhyou/quiz/class/QuizDecisionManager.php',
				　data:{usernumber:usernumber,answer:answer,
                         },
			 dataType:'json',
			success: function (data) {	
				if(data["flag"] == 'true'){
			       	 
				location.href = "./quiznijyu.php";
				}else if(data["flag"] == 'false'){
                        			
				location.href = "./answerComp.php";	
				}else{
				  alert("回答期間が終了しています");
				location.href = "./quizprivate.php";
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

	<header>
		<div class="backdiv">
		</div>
		<h2>クイズ</h2>
	</header>

<br /><br />

<?php
if(!isset($_SESSION)){ 
session_start(); 
}
require_once "./class/DBManager.php";

$con = DBConnect();


	require_once './class/EventFlagManager.php'; //EventFlagマネージャーの読み込み
//クイズ公開情報取得
	$gakusaiflag = gakusaiflag();
//クイズ公開情報判定
	if($gakusaiflag[0][3] == 0){
	 header('location: ./quizprivate.php');
	}

$question = getKuizuAll($con);
$_SESSION['kuizid'] =$question[0][1];
$mondai = array();
$mondai = array($question[0][3],$question[0][4],$question[0][5],$question[0][6]);

//配列の中身をシャッフル
shuffle($mondai);

dconnect($con);

?>



<div class="contentsdiv">
<center><h1><?php echo $question[0][2] ?></h1></center>


<div class="menudiv" onClick='quizcheack("<?php echo $mondai[0];?>")'><h2><?php echo $mondai[0];?></h2></div>


<div class="menudiv" onClick='quizcheack("<?php echo $mondai[1];?>")'><h2><?php echo $mondai[1];?></h2></div>


<div class="menudiv" onClick='quizcheack("<?php echo $mondai[2];?>")'><h2><?php echo $mondai[2];?></h2></div>


<div class="menudiv" onClick='quizcheack("<?php echo $mondai[3];?>")'><h2><?php echo $mondai[3];?></h2></div>



</div>


</body>

</html>
