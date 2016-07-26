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
  
  #content ul{
	list-style-image: url('images/listBookIconSmall.png');
	margin-left: 20px;
	font-size: 24px;
	
  }
</style>

</head>

<body>
<section id="container">
<?php include "phpbits/main1.php"?>







<section id="content">
  
  <h1>Courses</h1>

<?php

if ( isset($_GET['dept'])) {
	include("phpbits/connectDB.php");
	$dept = $_GET['dept'];
	$query = 'SELECT * FROM courses WHERE department = "' . $dept . '" ORDER BY courseID;';
	$results = mysqli_query($dbc, $query);
	echo '<ul>';
	while ($row = mysqli_fetch_array($results)) {
		echo '<li><a href="posts.php?course=' . $row["courseID"] . '&dept=' . $dept .  '" style="color:#3399ff;text-shadow: none;">' . $row["courseID"] . ' - ' . $row["description"] . '</a></li>';
	}

	echo '</ul>';
}



?>




</section> <!-- end content -->






<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
