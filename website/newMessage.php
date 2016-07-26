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
#content {
	text-shadow: none;
}
	
</style>

</head>

<body>
<section id="container">
<?php include 'phpbits/main1.php' ?>





<section id="content">



<?php 
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if(isset($_SESSION['user']))
	{
		if(isset($_POST['newChatButton']))
		{
			include("phpbits/connectDB.php");
			$recipient = $_POST['recipient'];
			$unsafeMessage = $_POST['message'];
			$message = str_replace( "'", "\'", $unsafeMessage );
			$unsafeTitle = $_POST['title'];
			$title = str_replace( "'", "\'", $unsafeTitle );
			$user = $_SESSION['user'];
			$query = "INSERT INTO chats (recipient, sender, date, title) VALUES ('$recipient', '$user', CURRENT_TIMESTAMP, '$title');";
			if (mysqli_query($dbc, $query)){
				echo '<script>alert("New chat created")</script>';
				$query = "SELECT * FROM chats ORDER BY chatID DESC LIMIT 1;";
				if ($results = mysqli_query($dbc, $query)){
					$row = mysqli_fetch_array($results);
					$chatID = $row['chatID'];
					$query = "INSERT INTO messages (sender, chatID, body, date) VALUES ('$user', '$chatID', '$message', CURRENT_TIMESTAMP);";
					if (mysqli_query($dbc, $query)){
						echo '<script>alert("New message sent")
							window.location.href="chats.php"</script>';
					}
					else {
						echo '<script>alert("Something went wrong sending first message")
							window.location.href="chats.php"</script>';
					}
				}
			} else {
				echo '<script>alert("Something went wrong creating new chat")
						window.location.href="chats.php"</script>';
			}
			mysqli_close($dbc);
		}	
		if(isset($_POST['replyButton']))
		{
			include("phpbits/connectDB.php");
			$chatID = $_SESSION['chatID'];
			unset($_SESSION['chatID']);
			$user = $_SESSION['user'];
			$unsafeMessage = $_POST['replyMessage'];
			$message = str_replace( "'", "\'", $unsafeMessage );
			$query = "INSERT INTO messages (sender, chatID, body, date) VALUES ('$user', '$chatID', '$message', CURRENT_TIMESTAMP);";
			$query2 = "UPDATE chats SET date = CURRENT_TIMESTAMP WHERE chatID = '$chatID';";
			if (mysqli_query($dbc, $query) && mysqli_query($dbc, $query2)){
				echo '<script>alert("Message sent")
						window.location.href="chats.php"</script>';
			} else {
				echo '<script>alert("Something went wrong inserting reply message")
						window.location.href="chats.php"</script>';
			}
			mysqli_close($dbc);
		}
		
		if(isset($_SESSION['chatID'])) {
			echo '<h3>Reply</h3>
				<form name="reply" action="" method="post">
				<p>
					Reply Message: <textarea name="replyMessage" rows="10" cols="60" required></textarea>
				</p>
				<p><button type="submit" name="replyButton">Send</button></p>
				</form>';
		}
		else if(isset($_GET['sendto']))
		{
			echo '<h3>New Chat</h3>
				<form name="newChat" action="" method="post">
				<p>
					To: 	<input type="text" name="recipient" value="' . $_GET['sendto'] . '" readonly/><br>
					Chat Title: <input type="text" name="title" maxLength="80"/><br>
					Message: <textarea name="message" rows="10" cols="60" required></textarea>
				</p>
				<p><button type="submit" name="newChatButton">Send</button></p>
				</form>';
		}
		else {
			echo '<h3>New Chat</h3>
				<form name="newChat" action="" method="post">
				<p>
					To: 	<input type="text" name="recipient" pattern="^[A-Za-z0-9_.]+@[fF][aA][rR][mM][iI][nN][gG][dD][aA][lL][eE].[eE][dD][uU]$" required/><br>
					Chat Title: <input type="text" name="title" maxLength="80"/><br>
					Message: <textarea name="message" rows="10" cols="60" required></textarea>
				</p>
				<p><button type="submit" name="newChatButton">Send</button></p>
				</form>';
		}

 
						
	}
	else {
		echo '<p>You must be logged in to send messages</p>';
	}
?>




</section> <!-- end content -->

<?php include 'phpbits/main2.php'?>
</section> <!-- end container -->
</body>
</html>
