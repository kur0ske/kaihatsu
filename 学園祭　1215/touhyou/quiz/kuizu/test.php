<html>
<body>

<?php

ini_set( 'display_errors', "On" );
		require_once ("../class/DBManager.php");

$usernumber = $_POST["usernumber"];
		$con = DBConnect();

		$a = getParticipant($con,$usernumber);

		echo $a[0][0];
		echo $a[0][1];
		echo $a[0][2];
		echo $a[0][3];
		echo $a[0][4];
		echo $a[1][0];


?>


</body>
</html>