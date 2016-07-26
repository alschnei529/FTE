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
			include 'phpbits/connectDB.php';
	        $query = "SELECT departmentID, description FROM departments";
	        $results = mysqli_query($dbc, $query);
	        
	        echo '<ul>';
	        while($row = mysqli_fetch_array($results)) {
	        		echo '<li><a href="course.php?dept=' . $row["departmentID"] . '" style="color:black;">' . $row["departmentID"] . '</br>' . $row["description"] . '</a></li>';
	        }
	 		echo '</ul>'
	    ?>




</section> <!-- end content -->






<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
