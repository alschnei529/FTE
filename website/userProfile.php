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
  
  #content {
	text-shadow: none;
	background-image: url('images/medieval.png');
	color: green;
  
  }
  
  
  form {
	background: #FFF url('images/background.png');
	color: #ff4d94;
	text-shadow: none;
	
}
</style>

</head>

<body>
<section id="container">
<?php include "phpbits/main1.php" ?>







<section id="content">






<?php 

if(!isset($_SESSION))
{
	session_start();
}
if(isset($_POST['changePasswordButton']))
{
	include("phpbits/connectDB.php");
	$oldPass = $_POST['oldPass'];
	$newPass1 = $_POST['newPass1'];
	$newPass2 = $_POST['newPass2'];
	$email = $_SESSION['user'];
	$query = "SELECT * FROM users WHERE userID = '$email';";
	$results = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($results);
	
	
	
	if ($newPass1 != $newPass2) {
		echo '<script>alert("New passwords do not match")</script>';
	}
	else if ($oldPass != $row['userPass']) {
		echo '<script>alert("Incorrect Password")</script>';
	}
	else {
		$query2 = "UPDATE users SET userPass = '$newPass1' WHERE userID = '$email';";
		if (mysqli_query($dbc, $query2)) {
			echo '<script>alert("Your password has been changed")</script>';
		}
		else {
			echo '<script>alert("An error occurred, your password has not been changed")</script>';
		}
	}

}
if(isset($_POST['rateUserButton']))
{
	include("phpbits/connectDB.php");
	$rater = $_SESSION['user'];
	$ratee = $_GET['user'];
	$rating = $_POST['rating'];
	$note = $_POST['note'];
	
	$query1 = "SELECT * FROM ratings WHERE rater = '$rater' AND ratee = '$ratee';";
	$results1 = mysqli_query($dbc, $query1);
	if ( mysqli_num_rows($results1) > 0 ) {
		echo '<script>alert("You have already rated this user. You may only rate each user once.")</script>';
	}
	else {
		$query2 = "INSERT INTO ratings (rater, ratee, rating, note) VALUES ('$rater', '$ratee', '$rating', '$note');";
		if ( mysqli_query($dbc, $query2) ) {
			echo '<script>alert("Rating added successfully")</script>';
		}
		else {
			echo '<script>alert("Error adding rating")</script>';
		}
	}

}
if(isset($_POST['removePostButton'])) {
	include("phpbits/connectDB.php");
	$postID = $_POST['removePostButton'];
	$query = "UPDATE posts SET hidden = 1 WHERE postID = '$postID'";
	mysqli_query($dbc, $query);
}
if(isset($_POST['relistPostButton'])) {
	include("phpbits/connectDB.php");
	$postID = $_POST['relistPostButton'];
	$query = "UPDATE posts SET hidden = 0, date = CURRENT_TIMESTAMP WHERE postID = '$postID'";
	mysqli_query($dbc, $query);
}
if(isset($_GET['user']))
{
	include("phpbits/connectDB.php");
	$email = $_GET['user'];
	$userName = substr($email, 0 , -16);
	$query = "SELECT * FROM users WHERE userID = '$email';";
	$results = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($results);
	$fName = $row['fName'];
	$lName = $row['lName'];
	echo "<h1>Profile for $userName</h1>";
	echo "First Name: $fName <br>" ;
	echo "Last Name: $lName <br>";
	echo "Email: $email <br>";
	
	$rating = 0;
	$count = 0;
	$ratingsQuery = "SELECT rating FROM ratings WHERE ratee = '$email';";
	$ratingsResults = mysqli_query($dbc, $ratingsQuery);
	while ($ratingsRow = mysqli_fetch_array($ratingsResults)) {
		$rating += $ratingsRow['rating'];
		$count++;
	}
	if ($count > 0){
		$rating /= $count;
		$rating = round($rating, 1);
		echo "This users average rating is: $rating <br><br>";
		echo "*Rating* | *User Note*<br><br>";
		$query3 = "SELECT * FROM ratings WHERE ratee = '$email';";
		$results3 = mysqli_query($dbc, $query3);
		while ( $row3 = mysqli_fetch_array($results3) ) {
			$rating3 = $row3['rating'];
			$note3 = $row3['note'];
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$rating3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;\"$note3\"<br>";
		}
		
		
		
		
		
	}
	else {
		echo 'This user has not been rated';
	}
	
	if ( isset($_SESSION['user'])) {
		if ($email == $_SESSION['user']) {
			?>
				<h1> Change Password </h1>
				<form name="changePassword" action="" method="post">
					<fieldset>
					Old Password: <input type="password" name="oldPass" pattern="^.{8,20}$" required><br/>
					New Password: <input type="password" name="newPass1" pattern="^.{8,20}$" required><br/>
					New Password (repeated):  <input type="password" name="newPass2" pattern="^.{8,20}$" required><br/>
					<button type="submit" name="changePasswordButton">Submit</button>
					</fieldset>
				</form><br><br>

				<h1> Your Posts </h1>
				<?php
				 $postsQuery = "SELECT * FROM posts WHERE userID = '$email' ORDER BY date DESC;";
				 $postsResults = mysqli_query($dbc, $postsQuery);
				 while ( $postsRow = mysqli_fetch_array($postsResults) ) {
				 	$postID = $postsRow['postID'];
				 	$postDate = substr($postsRow['date'], 0 , -9);
				 	$postTitle = $postsRow['title'];
				 	$hidden = $postsRow['hidden'];

				 	if ($hidden == 0) {
				 		echo "<form name='removePost' action='' method='post'>
				 		<h4>$postDate - <a style='color:blue;'href=posts.php?postID=$postID>$postTitle</a> 
				 		<button style='display:inline-block;float:right;'' type='submit' name='removePostButton' value='$postID'>Remove Post</button><h4>
				 		</form>";
				 	}
				 	else {
				 		echo "<form name='relistPost' action='' method='post'>
				 		<h4>$postDate - (REMOVED) - $postTitle
				 		<button style='display:inline-block;float:right;color:grey;'' type='submit' name='relistPostButton' value='$postID'>Relist Post</button><h4>
				 		</form>";

				 	}
				 	echo '----------------------------------------------------------------------';
				 }
				?>
			<?php 
		}
		else {
			?>
				<h1> Rate This User </h1>
				<form name="rateUser" action="" method="post">
					<fieldset>
					Rating (1-5): <input type="number" name="rating" min="1" max="5" required><br/>
					Personal Note (optional): <input type="text" name="note" maxlength="50"><br/>
					<button type="submit" name="rateUserButton">Submit</button>
					</fieldset>
				</form>
			<?php 
		}

	}
}
else {
	echo 'Error: No user selected';
}


?>




</section> <!-- end content -->











<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
