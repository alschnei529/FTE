<?php
	//run php file to make db connection
	include("connectDB.php"); 
	
	//collect data from form, place into variables
    $email = strtolower($_POST['email']);
    $pass = $_POST['pass'];
    $fName = $_POST['fName'];
	$lName = $_POST['lName'];
	
	//prep query to be run
	$query = "INSERT INTO users (userID, userPass, fName, lName, admin) VALUES ('$email', '$pass', '$fName', '$lName', 0)";
	
	//try to run query, check if successful
	if (mysqli_query($dbc, $query)){
		header("location: ../index.php");
		exit();	
	} else {
		echo 'error running addUser query';
	}
	
	//close db connection
	mysqli_close($dbc); 
?>