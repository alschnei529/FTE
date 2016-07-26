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
	background-image: url('images/medieval.png');
	text-shadow: none; 
  }
  
  
  #content ul {
	
	margin-left: 1.4em;
	font-size: 24px;
	
  }
  
  #content ul li{
	list-style-image: url('images/listBookIconSmall.png');
	list-style-type: armenian;
	color: blue;
	
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
	        		echo '<li><a href="courses.php?dept=' . $row["departmentID"] . '" style="color:#3399ff;text-shadow: 1px;">' . $row["departmentID"] . ' - ' . $row["description"] . '</a></li>';
	        }
	 		echo '</ul>'
	    ?>




</section> <!-- end content -->






<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
