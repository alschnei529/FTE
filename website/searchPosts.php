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
	if(!isset($_SESSION)) { 
	    session_start(); 
	}
	if(isset($_GET['isbn'])) {
		$isbn = $_GET['isbn'];
		include 'phpbits/connectDB.php';
		$query = "SELECT * FROM posts WHERE textbook = '$isbn' AND hidden = 0 ORDER BY date;";
		$results = mysqli_query($dbc, $query);
		if(mysqli_num_rows($results) == 0)
		{
			echo 'There are no posts for this textbook';
		}
		while ($row = mysqli_fetch_array($results)){
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
	else { 
		echo '<h4>No search criteria given</h4>'; 
	}

?>

</section> <!-- end content -->





<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
