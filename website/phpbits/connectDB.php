<?php
	
	$host = "127.0.0.1";
	$user = "schna3";
	$pass = "0529893561";
	$db = "schna3";

	if ($dbc = @mysqli_connect($host, $user, $pass, $db)) {
		//echo 'db connection OK';
	}
	else { 
		echo 'db connection ERROR';
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	}
?>