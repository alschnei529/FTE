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
	font-size: 20px;
  }
  
  #content strong {
	color: #F5D37D;
  }
  
  #content em{
	color: #D37DF5;
	text-decoration: none;
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
		if(isset($_POST['isbnSearch']))
		{
			header("location:searchPosts.php?isbn=" . $_POST['isbnSearch'] . "");
		}

		include 'phpbits/connectDB.php';
		$searchResults = $_SESSION['searchResults'];
		//$items = $searchResults->listItems();
		
		//$results = $service->volumes->listVolumes
		//print_r($searchResults['items']);
		//foreach ($searchResults['items'] as $item) {
		//	print_r($item);

			//echo '<br><p>' . $title . '___' . $author . '___' . $pubDate . '</p><br>';
		//}
		
		
			//$book_title = $results_array['items'][0]['volumeInfo']['title'];
		
		echo '<h3>Which textbook are looking for?</h3>';
		

		if(isset($searchResults['items'])) {
			foreach ($searchResults['items'] as $item) {
				echo '<form id="bookItem" action="" method="POST" style="overflow:auto; color:#D37DF5; border-radius: 25px; padding: 10px; text-shadow:1px 1px black;//border:solid; //border-color:black; background-color:#7DF5D3;">';
				$title = $item['volumeInfo']['title'];
				echo '<strong>TITLE:</strong><em> ' . $title . '</em><br>';
				if (isset($item['volumeInfo']['authors'])){
					foreach ($item['volumeInfo']['authors'] as $authors) {
						$author = $authors;
						echo '<strong>AUTHOR:</strong> ' . $author . '<br>';
					}
				}
				else { echo '<strong>AUTHOR: no author found</strong><br>'; }
				if (isset($item['volumeInfo']['publishedDate'])){
					$pubDate = $item['volumeInfo']['publishedDate'];
					echo '<strong>PUBLISHED:</strong> ' . $pubDate . '<br>';
				}
				else { echo '<strong>PUBLISHED: no publish date found</strong><br>'; }
				if (isset($item['volumeInfo']['industryIdentifiers'])){
					$isbn = $item['volumeInfo']['industryIdentifiers'][0]['identifier'];
					echo '<strong>ISBN:</strong> ' . $isbn . '<br>';
				}
				else { echo '<strong>ISBN: no ISBN found</strong><br>'; }
				echo '<button type="submit" name="isbnSearch" value="' . $isbn . '" style="float:right;">View Listings</button>';
				echo '</form><br>';
			}
		}
		else { echo 'No results'; }
		
		
	?>



</section> <!-- end content -->




<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
