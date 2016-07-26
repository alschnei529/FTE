<h3>Messages</h3>



<?php
	include("phpbits/connectDB.php");
	if(!isset($_SESSION))
	{
		session_start();
	}
	if(isset($_POST['replyButton']))
	{
		$_SESSION['chatID'] = $_POST['chatID'];
		header("Location: newMessage.php");
		exit;
	}

	$user = $_SESSION['user'];
	
	$chatsQuery = "SELECT * FROM chats WHERE sender = '$user' OR recipient = '$user' ORDER BY date DESC;";
	$chatsResults = mysqli_query($dbc, $chatsQuery);
	while( $chatsRow = mysqli_fetch_array($chatsResults) ) {
		echo '<div style="border:solid; overflow:auto;">';
		echo '<p>' . $chatsRow["title"] . '</p>';
		if ($chatsRow['sender'] == $_SESSION['user']) {
			echo '<p>Chatting with: ' . $chatsRow['recipient'] . '</p><br>';
		}
		else if ($chatsRow['recipient'] == $_SESSION['user']) {
			echo '<p>Chatting with: ' . $chatsRow['sender'] . '</p><br>';
		}
		else { echo 'Something went wrong here line 32 mychats.php'; }
		$messagesQuery = "SELECT * FROM messages WHERE chatID = " . $chatsRow['chatID'] . " ORDER BY date;";
		$messagesResults = mysqli_query($dbc, $messagesQuery);
		while ( $messagesRow = mysqli_fetch_array($messagesResults) ) {
			echo '<p ';
			if ($messagesRow['sender'] == $user) {
				echo 'style="text-align:right; color:black;"';
			}
			echo '>' . $messagesRow['body']  . '</p><br>';	
		}
		echo '<form name="reply" action="" method="post">';
		echo '<input type="hidden" name="chatID" value="' . $chatsRow["chatID"] . '"/>';
		echo '<button style="float:right;" type="submit" name="replyButton">Reply</button></form>';
		echo '</div>';
	}
	
		
		

	
?>

