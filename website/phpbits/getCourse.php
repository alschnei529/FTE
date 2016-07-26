<?php
include("phpbits/connectDB.php");
$query = "SELECT courseID, description FROM courses WHERE courseID = AVN";
$results = @mysqli_query($dbc, $query);

?>