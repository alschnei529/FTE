<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(isset($_SESSION['user']))
{
	echo '<li><a href="phpbits/signOut.php">Sign Out</a>  |</li>';
	echo '<li><a href="userProfile.php?user=' . $_SESSION["user"] . '">' . substr($_SESSION["user"], 0 , -16) . '\'s Profile</a>  |</li>';
	echo '<li><a href="chats.php">My Chats</a>  |</li>';
	
	if ( $_SESSION['teacher'] == 1 || $_SESSION['admin'] == 1 ) {
		echo  '<li><a href="teacherFeatures.php">Teacher Edit</a></li>';
	}
	if ( $_SESSION['admin'] == 1 ) {
		echo  '  |<li><a href="adminFeatures.php">Admin Edit</a></li>';
	}
}
else
{
	echo  '<li><a href="signIn.php">Sign In</a>  |</li>
			<li><a href="register.php">Register</a></li>';
}

?>