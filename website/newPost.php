<!DOCTYPE html>
<html>
<head>

<!--
	Farmingdale Textbook Exchange
	Author: Alex Schneider
	Date: 	May 17, 2016
-->

<script src="modernizr-2.js"></script>
<title>Farmingdale Textbook Exchange - Home</title>

<link rel="stylesheet" href="fscbookexchangestyles.css" type="text/css" />
<style>
aside ul li {
	font-size: 0.7em;
	text-transform: uppercase;
	text-decoration: underline;
	padding: 6px;
}


aside h2 {
	color: goldenrod;
}

form {
	background: #FFF url('images/background.png');
	color: #ff4d94;
	text-shadow: none;
	
}





input {
	font-size: 30px;
	padding-left: 1.4em;
}

textarea {
	
}
</style>

</head>

<body>
<section id="container">
<?php include "phpbits/main1.php" ?>






<section id="content">


<?php
if(!isset($_SESSION))  { 
    session_start(); 
} 

if(isset($_SESSION['user'])) {
	$userID = $_SESSION['user'];
}
else {
	echo '<script>alert("Must be signed in to add new post")
		window.location.href="signIn.php"</script>';

}
?>


<h3>New Post</h3>
<form name="newPost" action="phpbits/addNewPost.php" method="post">
	<fieldset>

	Department: 	
	<select id="deptSelect" name="deptSelect" onchange="myFunction()">
	<option value="">
		<?php 
			include("phpbits/connectDB.php");
			$queryDept = "SELECT departmentID FROM departments";
			$resultsDept = mysqli_query($dbc, $queryDept);
			while($rowDept = mysqli_fetch_array($resultsDept)) {
				echo '<option value="' . $rowDept["departmentID"] . '"';
				if (isset($_GET['dept']) && $_GET['dept'] == $rowDept["departmentID"]) {
					echo ' selected ';
				}
				echo '\>' . $rowDept["departmentID"] . '</option>';
			}
		?>
	</select><br>
	
	<script>
		function myFunction() {
			var dept = document.getElementById("deptSelect").value;
			window.location.href="newPost.php?dept=" + dept;
		}
	</script>

	<?php 
		if (isset($_GET['dept'])) {
			echo 'Course: <select id="courseSelect" name="courseSelect">';
			include("phpbits/connectDB.php");
			$queryCourse = 'SELECT courseID, description FROM courses WHERE department = "' . $_GET['dept'] . '" ORDER BY courseID;';
			$resultsCourse = mysqli_query($dbc, $queryCourse);
			while($rowCourse = mysqli_fetch_array($resultsCourse)) {
				echo '<option value="' . $rowCourse['courseID'] . '"\>' . $rowCourse['courseID'] . ' - ' . $rowCourse['description'] .  '</option>';
			}
			echo '</select><br>';
			echo 'Post Title: <input type="text" name="title" maxlength="45" required><br>';
			echo 'Textbook ISBN (10 or 13): <input type="text" name="ISBN" pattern="(^[0-9]{10}$)|(^[0-9]{13}$)"><br>';
			echo 'Post Body: <textarea name="body" rows="10" cols="60" required></textarea>';
			echo '<input type="submit" value="Submit">';
		}
	?>
	
	</fieldset>
</form>


</section> <!-- end content -->






<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
