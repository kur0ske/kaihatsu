<?php
mb_language("ja");
mb_internal_encoding("UTF-8");


//class呼び出してFlag情報取得
session_start();
ini_set( 'display_errors', "On" );
	if(isset($_SESSION["kanriid"]) && isset($_SESSION["kanripass"])){
	}else{
		header( "Location: kanrilogin.html" );
	}



?>

<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>問題削除画面</title>
<link rel="stylesheet" type="text/css" href="./kanrilogin.css" media="all" />

<script type="text/javascript">
<!--

function disp(){

	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('本当に削除しますか？')){

		location.href = "deleteComp.php"; // example_confirm.html へジャンプ

	}
	// 「OK」時の処理終了

	// 「キャンセル」時の処理開始
	else{

		window.alert('キャンセルされました'); // 警告ダイアログを表示

	}
	// 「キャンセル」時の処理終了

}

// -->
</script>

</head>

<body>
<div align="center">
<?php

echo "<h1>問題削除画面</h1>";
?>
<div align="right">
<form action="quiztopPage.php" method = "POST">
<input type ="submit" value="戻る" id="submit_button_back"/>
</form>
</div>
<?php
echo "<form action='./deleteComp.php' method='POST' onsubmit='return disp()'>";

echo "削除したいクイズ番号を入力してください<br /><input type='text' name='kuizuID' value=''><br /><br />";

echo "<input type= 'submit' value='削除'  id='submit_button_delete'>";

?>


</body>

</html>
