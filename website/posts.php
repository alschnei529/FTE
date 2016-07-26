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
</style>

</head>

<body>
<section id="container">
<?php include "phpbits/main1.php" ?>





<section id="content">


	<?php 
	if( isset($_GET['course'] ) && isset($_GET['dept'] )) {
		include 'phpbits/connectDB.php';
		$course = $_GET['course'];
		$dept = $_GET['dept'];
		echo '<h1>Teacher\'s Notes</h1><br>';
		$queryTeacher = "SELECT * FROM teachernotes WHERE course = '$course' AND department = '$dept';";
		$resultsTeacher = mysqli_query($dbc, $queryTeacher);
		echo '<div style="text-decoration:none; overflow:auto; background:green;" id="teacherNotes">';
		while ($rowTeacher = mysqli_fetch_array($resultsTeacher)) {
			$teacherEmail = $rowTeacher['teacher'];
			$queryName = "SELECT * FROM users WHERE userID = '$teacherEmail';";
			$resultsName = mysqli_query($dbc, $queryName);
			$rowName = mysqli_fetch_array($resultsName);
			$lName = $rowName['lName'];
			echo "<p>Required Textbook: " . $rowTeacher['ISBN'] . "</p>";
			echo "<p>\"" . $rowTeacher['note'] . "\" - Prof. $lName </p><br>";
		}
		echo '</div>';
		$query = "SELECT * FROM posts WHERE courseID = '$course' AND departmentID = '$dept' AND hidden = 0 ORDER BY date ASC;";
		$results = mysqli_query($dbc, $query);
		echo '<h1>Posts</h1><br>';
		while ( $row = mysqli_fetch_array($results) ) {
			echo '<div style="text-decoration:none; overflow:auto; background:green;" id="post"><div id="postContent" style="font-weight:bold;">
				Title: ' . $row["title"] . '<br>
				Posted By: ' . $row["userID"] . '<br>
  				Date Posted: '	. $row["date"] . '<br>
  				Textbook: <a href="bookInfo.php?isbn=' . $row["textbook"] . '">' . $row["textbook"] . '</a><br>
				Body: ' . $row["body"] . '</br></div>
				<a href="userProfile.php?user=' . $row['userID'] . '" style="float:right;">View Profile</a><br>
				<a href="newMessage.php?sendto=' . $row['userID'] . '" style="float:right; clear:both;">Contact Seller</a>
				</div></br>';
		}
	}
	else if ( isset($_GET['postID']) ) {
		include 'phpbits/connectDB.php';
		$postID = $_GET['postID'];
		$query = "SELECT * FROM posts WHERE postID = '$postID';";
		$results = mysqli_query($dbc, $query);
		while ($row = mysqli_fetch_array($results)){
			echo '<div style="text-decoration:none; overflow:auto; background:green;" id="post"><div id="postContent" style="font-weight:bold;">
				Title: '. $row["title"] . '<br>
				Posted By: '. $row["userID"] . '<br>
  				Date Posted: '	. $row["date"] . '<br>
  				Textbook: <a href="bookInfo.php?isbn=' . $row["textbook"] . '">' . $row["textbook"] . '</a><br>
				Body: ' . $row["body"] . '<br></div>
				<a href="userProfile.php?user=' . $row['userID'] . '" style="float:right;">View Profile</a><br>
				<a href="newMessage.php?sendto=' . $row['userID'] . '" style="float:right; clear:both;">Contact Seller</a>
				</div></br>';
		}
	}
	else {
		echo "No search criteria set";
	}
	?>



</section> <!-- end content -->




<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
