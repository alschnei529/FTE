<?php
include("phpbits/connectDB.php");

if(isset($_POST['adminElevateButton'])) {
	$user = $_POST['adminElevateSelect'];
	$query = "UPDATE users SET admin = 1 WHERE userID = '$user';";
	if (mysqli_query($dbc, $query)) {
		//update added successful message
	}
	else {
		echo '<script>alert("adminElevate error")</script>';
	}
}
if(isset($_POST['adminDemoteButton'])) {
	$user = $_POST['adminDemoteSelect'];
	$query = "UPDATE users SET admin = 0 WHERE userID = '$user';";
	if (mysqli_query($dbc, $query)) {
		//update added successful message
	}
	else {
		echo '<script>alert("adminDemote error")</script>';
	}
}
if(isset($_POST['teacherElevateButton'])) {
	$user = $_POST['teacherElevateSelect'];
	$query = "UPDATE users SET teacher = 1 WHERE userID = '$user';";
	if (mysqli_query($dbc, $query)) {
		//update added successful message
	}
	else {
		echo '<script>alert("teacherElevate error")</script>';
	}
}
if(isset($_POST['teacherDemoteButton'])) {
	$user = $_POST['teacherDemoteSelect'];
	$query = "UPDATE users SET teacher = 0 WHERE userID = '$user';";
	if (mysqli_query($dbc, $query)) {
		//update added successful message
	}
	else {
		echo '<script>alert("teacherDemote error")</script>';
	}
}
if(isset($_POST['userBanButton'])) {
	$user = $_POST['userBanSelect'];
	$query = "UPDATE users SET banned = 1 WHERE userID = '$user';";
	if (mysqli_query($dbc, $query)) {
		//update added successful message
	}
	else {
		echo '<script>alert("userBan error")</script>';
	}
}
if(isset($_POST['userUnbanButton'])) {
	$user = $_POST['userUnbanSelect'];
	$query = "UPDATE users SET banned = 0 WHERE userID = '$user';";
	if (mysqli_query($dbc, $query)) {
		//update added successful message
	}
	else {
		echo '<script>alert("userUnban error")</script>';
	}
}
if(isset($_POST['clearOldPostsButton'])) {
	$query = "DELETE FROM posts WHERE date < SUBDATE(CURRENT_TIMESTAMP, 60);";
	mysqli_query($dbc, $query);
}
?>




<h3>Elevate User TO Admin</h3>
<form name="adminElevate" action="" method="post">
<select id="adminElevateSelect" name="adminElevateSelect">
<?php 
	$query = "SELECT * FROM users WHERE admin != 1 ORDER BY userID;";
	$results = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($results)) {
		echo '<option value="' . $row["userID"] . '"\>' . $row["userID"] . '</option>';
	}
?>
</select>
<button type="submit" name="adminElevateButton">Submit</button><br><br>
</form>



<h3>Demote User FROM Admin</h3>
<form name="adminDemote" action="" method="post">
<select id="adminDemoteSelect" name="adminDemoteSelect">
<?php 
	$query = "SELECT * FROM users WHERE admin = 1 ORDER BY userID;";
	$results = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($results)) {
		echo '<option value="' . $row["userID"] . '"\>' . $row["userID"] . '</option>';
	}
?>
</select>
<button type="submit" name="adminDemoteButton">Submit</button><br><br>
</form>



<h3>Elevate User TO Teacher</h3>
<form name="teacherElevate" action="" method="post">
<select id="teacherElevateSelect" name="teacherElevateSelect">
<?php 
	$query = "SELECT * FROM users WHERE teacher != 1 ORDER BY userID;";
	$results = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($results)) {
		echo '<option value="' . $row["userID"] . '"\>' . $row["userID"] . '</option>';
	}
?>
</select>
<button type="submit" name="teacherElevateButton">Submit</button><br><br>
</form>



<h3>Demote User FROM Teacher</h3>
<form name="teacherDemote" action="" method="post">
<select id="teacherDemoteSelect" name="teacherDemoteSelect">
<?php 
	$query = "SELECT * FROM users WHERE teacher = 1 ORDER BY userID;";
	$results = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($results)) {
		echo '<option value="' . $row["userID"] . '"\>' . $row["userID"] . '</option>';
	}
?>
</select>
<button type="submit" name="teacherDemoteButton">Submit</button><br><br>
</form>



<h3>Ban User</h3>
<form name="userBan" action="" method="post">
<select id="userBanSelect" name="userBanSelect">
<?php 
	$query = "SELECT * FROM users WHERE banned != 1 ORDER BY userID;";
	$results = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($results)) {
		echo '<option value="' . $row["userID"] . '"\>' . $row["userID"] . '</option>';
	}
?>
</select>
<button type="submit" name="userBanButton">Submit</button><br><br>
</form>



<h3>Unban User</h3>
<form name="userUnban" action="" method="post">
<select id="userUnbanSelect" name="userUnbanSelect">
<?php 
	$query = "SELECT * FROM users WHERE banned = 1 ORDER BY userID;";
	$results = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($results)) {
		echo '<option value="' . $row["userID"] . '"\>' . $row["userID"] . '</option>';
	}
?>
</select>
<button type="submit" name="userUnbanButton">Submit</button><br><br>
</form>



<h3>Clear Old Posts</h3>
<form name="clearOldPosts" action="" method="post">
<button type="submit" name="clearOldPostsButton">Submit</button><br><br>
</form>