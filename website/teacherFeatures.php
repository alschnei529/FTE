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
<?php include 'phpbits/main1.php' ?>




<section id="content">

<?php 
	if(!isset($_SESSION))  {
		session_start();
	}
	if ($_SESSION['teacher'] == 1 || $_SESSION['admin'] == 1)
	{
		include 'phpbits/teacherEdit.php';
	}
	else {
		echo '<p> you do not have permission to view this page <p>';
	}
?>



</section> <!-- end content -->

<?php include 'phpbits/main2.php'?>
</section> <!-- end container -->
</body>
</html>
