<!DOCTYPE html>
<html>

<!--
	Farmingdale Textbook Exchange
	Author: Alex Schneider
	Date: 	May 17, 2016
-->



<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_POST['searchButton']))
{
	include 'phpbits/connectDB.php';
	//$_SESSION['isbn'] = urlencode($_POST['isbn']);
	//$_SESSION['title'] = urlencode($_POST['title']);
	//$_SESSION['author'] = urlencode($_POST['author']);
	$isbn = urlencode($_POST['isbn']);
	$title = urlencode($_POST['title']);
	$author = urlencode($_POST['author']);
	$key = "AIzaSyAjHFOEB44lXkiZKZeCbJrbPdrTcbOPTMM";
	
	if ( $isbn != NULL ) {
		$books_url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn . "&key=" . $key . "";
		$results_json = file_get_contents($books_url);
		$results_array = json_decode($results_json, true);
		//$_SESSION['searchResults'] = $results_array;
		//$book_title = $results_array['items'][0]['volumeInfo']['title'];
		//echo '<script>alert("' . $book_title . '");</script>';

		if(!isset($results_array['items'])) {
			echo "<script>alert('ISBN does not exist in database')</script>";
		}
		else {
			header("location:searchPosts.php?isbn=" . $isbn . "");
		}

	}
	else if ( $title != NULL || $author != NULL ) {
		if ($title == NULL) {
			$books_url = "https://www.googleapis.com/books/v1/volumes?q=inauthor:" . $author . "&key=" . $key . "";
		}
		else if ($author == NULL) {
			$books_url = "https://www.googleapis.com/books/v1/volumes?q=intitle:" . $title . "&key=" . $key . "";
		}
		else {
			$books_url = "https://www.googleapis.com/books/v1/volumes?q=intitle:" . $title . "+inauthor:" . $author . "&key=" . $key . "";
		}

		$results_json = file_get_contents($books_url);
		$results_array = json_decode($results_json, true);
		$_SESSION['searchResults'] = $results_array;
		//$book_title = $results_array['items'][0]['volumeInfo']['title'];
		//echo '<script>alert("' . $book_title . '");</script>';
		header("location:searchBooks.php");
	}
	else {
		echo '<script>alert("Please enter a search criteria");</script>';
	}
	
	
}
?>



<head>


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
  
  
</style>

</head>

<body>
<section id="container">
<?php include "phpbits/main1.php" ?>






<section id="content">

<h3>Textbook Search</h3>

<form name="search" action="" method="post">
	<fieldset>
	Title: <input type="text" name="title" maxlength="80"><br/>
	<br>
	Author: <input type="text" name="author" maxlength="40"><br/>
	<br>OR<br><br>
	ISBN 10 or 13: <input type="text" name="isbn" pattern="^(\d{10}|\d{13})?$"><br/>
	</fieldset>
	<button type="submit" name="searchButton">Search</button>
</form>

</section> <!-- end content -->





<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
