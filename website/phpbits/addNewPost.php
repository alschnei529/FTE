<?php
	//run php file to make db connection
	include("connectDB.php"); 
	if(!isset($_SESSION))  {
		session_start();
	}
	if(isset($_SESSION['user'])) {
		$userID = $_SESSION['user'];
	}
	
	//collect data from form, place into variables
	$courseID = $_POST['courseSelect'];
    $departmentID = $_POST['deptSelect'];
    $title = $_POST['title'];
	$body = $_POST['body'];
	$ISBN = $_POST['ISBN'];
	
	
	//prep query to be run
	$query = "INSERT INTO posts (userID, departmentID, courseID, title, body, date, textbook, hidden) VALUES ('$userID', '$departmentID', '$courseID', '$title', '$body', CURRENT_TIMESTAMP, '$ISBN', 0);";
	
	//try to run query, check if successful
	if (mysqli_query($dbc, $query)){
		echo '<script>alert("Post added successfully")
				window.location.href="../newPost.php"</script>';
	} else {
		echo '<script>alert("Something went wrong")
				window.location.href="../newPost.php"</script>';
	}
	
	//close db connection
	mysqli_close($dbc); 
?>