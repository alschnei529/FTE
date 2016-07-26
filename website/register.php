<!DOCTYPE html>
<html>


<!--
	Farmingdale Textbook Exchange
	Author: Alex Schneider
	Date: 	May 17, 2016
-->


<?php 
	//test if email is taken
	include("phpbits/connectDB.php");
	$query = "SELECT userID FROM users";
	$results = mysqli_query($dbc, $query);
	
	//mysqli_query returns a query object. Need to convert it into a simple array
	while ($row = mysqli_fetch_row($results)) {
		$emailArray[] = $row[0];
	}
?>


<script type="text/javascript">
	//move '$emailArray' variable from php to javascript
	var emailArray = <?php echo json_encode($emailArray); ?>;

	function validateForm() {
		var email = document.forms["addUser"]["email"].value;
	    var pass = document.forms["addUser"]["pass"].value;
	    var pass2 = document.forms["addUser"]["pass2"].value;
	    
	    //get index of given email , or '-1' if it does not exist in the array
		var emailIndex = emailArray.indexOf(email);
	    
	    if (pass != pass2) {
	        alert("Password does not match");
	        return false;
	    }
	    else if (emailIndex >= 0){
		    alert("Email is already registered");
		    return false;
	    }
	    else { 
			return true;
		}
	}	
</script>



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
</style>

</head>

<body>
<section id="container">
<?php include "phpbits/main1.php" ?>



<section id="content">

<h3>Register</h3>
<form name="addUser" action="phpbits/addUser.php" onsubmit="return validateForm()" method="post">
	<p>
		First Name: 		<input type="text" name="fName" pattern="^[A-Za-z]+$" required/><br/> <!--any length, only letters-->
		Last Name: 			<input type="text" name="lName" pattern="^[A-Za-z]+$" required/><br/> <!--any length, only letters-->
		Farmingdale Email: 	<input type="email" name="email" pattern="^[A-Za-z0-9_.]+@[fF][aA][rR][mM][iI][nN][gG][dD][aA][lL][eE].[eE][dD][uU]$" required/><br/> <!--any length letters or numbers or _ or . followed by @farmingdale.edu-->
		Password: 			<input type="password" name="pass" pattern="^.{8,20}$" required/><br/> <!--any characters, 8-20 length-->
		Confirm Password: 	<input type="password" name="pass2" pattern="^.{8,20}$" required/><br/> <!--any characters, 8-20 length-->
	</p>
	<p><input type="submit" value="Submit"></p>
</form>

</section> <!-- end content -->





<?php include "phpbits/main2.php"?>
</section> <!-- end container -->
</body>
</html>
