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

if(isset($_POST['signInButton']))
{
	include 'phpbits/connectDB.php';
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$query = "SELECT * FROM users WHERE userID = '$email'";
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	if (mysqli_num_rows($result) == 0)
	{
		echo "<script>alert('Email \"" . $email . "\" does not exist');</script>";
	}
	else if ($row['banned'] == '1') {
		echo "<script>alert('This account has been banned')</script>";
	}
	else if ($row['userPass'] == $pass)
	{
		
		
		$_SESSION['user'] = $row['userID'];
		$_SESSION['admin'] = $row['admin'];
		$_SESSION['teacher'] = $row['teacher'];
		echo "<script>alert('Sign In Successful');</script>";
		header("location:index.php");
	}
	else
	{
		echo "<script>alert('Incorrect Password');</script>";
	}
	mysqli_close($dbc);
}
?>









<h3>Sign In</h3>

<form name="signIn" action="" method="post">
	<fieldset>
	Email: <input type="email" name="email" pattern="^[A-Za-z0-9_.]+@[fF][aA][rR][mM][iI][nN][gG][dD][aA][lL][eE].[eE][dD][uU]$" required><br/>
	Password: <input type="password" name="pass" pattern="^.{8,20}$" required><br/>
	</fieldset>
	<button type="submit" name="signInButton">Sign In</button>
</form>

</section> <!-- end content -->






<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
