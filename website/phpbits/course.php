<!DOCTYPE html>
<html>
<head>

<!--
	BCS130 Web Development Final Project
	Author: Adrian Ramchaite
	Date: 	January 17, 2016

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
<?php include "phpbits/main1.php"?>







<section id="content">

<?php

if (isset($_GET['dept'])) {
	include("phpbits/connectDB.php");
	$queryCourse = 'SELECT * FROM courses WHERE department = "' . $_GET['dept'] . '" ORDER BY courseID;';
	$resultsCourse = mysqli_query($dbc, $queryCourse);
	echo '<ul>';
	while($rowCourse = mysqli_fetch_array($resultsCourse)) {
		echo '<li><a href="posts.php?course=' . $row["courseID"] . '" style="color:black;">' . $row["courseID"] . '</br>' . $row["courseDescription"] . '</a></li>';;
	}
	echo '</ul>';
?>




</section> <!-- end content -->






<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
