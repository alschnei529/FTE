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
	if (isset($_GET['isbn'])) {
		$isbn = $_GET['isbn'];
		$key = "AIzaSyAjHFOEB44lXkiZKZeCbJrbPdrTcbOPTMM";
		$books_url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn . "&key=" . $key . "";
		$results_json = file_get_contents($books_url);
		$results_array = json_decode($results_json, true);
		if(isset($results_array['items'])) {
			foreach ($searchResults['items'] as $item) {
				$title = $item['volumeInfo']['title'];
				echo 'TITLE: ' . $title . '<br>';
				if (isset($item['volumeInfo']['authors'])){
					foreach ($item['volumeInfo']['authors'] as $authors) {
						$author = $authors;
						echo 'AUTHOR: ' . $author . '<br>';
					}
				}
				else { 
					echo 'AUTHOR: no author found<br>';
				}
				if (isset($item['volumeInfo']['publishedDate'])){
					$pubDate = $item['volumeInfo']['publishedDate'];
					echo 'PUBLISHED: ' . $pubDate . '<br>';
				}
				else {
					echo 'PUBLISHED: no publish date found<br>'; 
				}
				if (isset($item['volumeInfo']['industryIdentifiers'])){
					$isbn = $item['volumeInfo']['industryIdentifiers'][0]['identifier'];
					echo 'ISBN: ' . $isbn . '<br>';
				}
				else {
					echo 'ISBN: no ISBN found<br>'; 
				}
			}	
		}
		else {
			echo "<script>alert('Given ISBN does not exist in database')</script>";
		}
	}
	else {
		echo 'Nothing to see here. No textbook selected.';
	}
?>


</section> <!-- end content -->











<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
