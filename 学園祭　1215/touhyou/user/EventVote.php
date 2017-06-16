<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta content="ja" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>ASO Festival　SAMPLE　出場者詳細画面</title>
<link href="./style.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<?php
session_start();
ini_set( 'display_errors', "On" );
?>

<script type="text/javascript">
	function votecheack(){

                  alert("投票しました");	
		  document.fm.submit();
	}

</script>







<body>
	<header>
		<div class="backdiv">
		</div>
		<h2>負荷テストです</h2>
	</header>



	<div class="contentsdiv">
		<div class="detaildiv">			
			<img alt="写真"  src="../eventimg/hirakawa.jpg" >

			<img alt="投票" src="../img/votebutton.png" style="cursor:pointer" onClick='votecheack()'>

			<form action='../class/Test.php' method = 'POST' name ="fm">
			<input type='hidden' name='eventdetailid' value = 2>
			<input type='hidden' name='eventid' value = 1>
			</form>
		
			<h2>平川貴子</h2>
			<p>一緒に飲む？飲む？</p>
		</div>
	</div>
</body>

</div>
</html>