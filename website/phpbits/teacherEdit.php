<?php 
	if (!empty($_POST)) {
		include("phpbits/connectDB.php");
		$course = $_POST['courseSelect'];
    	$department = $_POST['deptSelect'];
		$note = $_POST['body'];
		$ISBN = $_POST['ISBN'];
		$teacher = $_SESSION['user'];
		$query = "INSERT INTO teachernotes (ISBN, Course, Department, Note, Teacher) VALUES ('$ISBN', '$course', '$department', '$note', '$teacher');";
		if (mysqli_query($dbc, $query)){
			echo '<script>alert("Added successfully")
					window.location.href="teacherFeatures.php"</script>';
		} else {
			echo '<script>alert("Something went wrong")
					window.location.href="teacherFeatures.php"</script>';
		}
	}
?>

<h3>Teacher Edit</h3>
<form name="teacherEdit" action="" method="post">
	<fieldset>
	
	Department: 	
		<select id="deptSelect" name="deptSelect" onchange="myFunction()">
		<option value="">
			<?php 
				include("phpbits/connectDB.php");
				$queryDept = "SELECT departmentID FROM departments";
				$resultsDept = mysqli_query($dbc, $queryDept);
				while($rowDept = mysqli_fetch_array($resultsDept)) {
					echo '<option value="' . $rowDept["departmentID"] . '"';
					if (isset($_GET['dept']) && $_GET['dept'] == $rowDept["departmentID"]) {
						echo ' selected ';
					}
					echo '\>' . $rowDept["departmentID"] . '</option>';
				}
			?>
		</select><br>
		
		<script>
			function myFunction() {
				var dept = document.getElementById("deptSelect").value;
				window.location.href="teacherFeatures.php?dept=" + dept;
			}
		</script>
		
	<?php 
		if (isset($_GET['dept'])) {
			echo 'Course: 
				<select id="courselect" name="courseSelect">';
			include("phpbits/connectDB.php");
			$queryCourse = 'SELECT courseID, description FROM courses WHERE department = "' . $_GET['dept'] . '" ORDER BY courseID;';
			$resultsCourse = mysqli_query($dbc, $queryCourse);
			while($rowCourse = mysqli_fetch_array($resultsCourse)) {
				echo '<option value="' . $rowCourse['courseID'] . '"\>' . $rowCourse['courseID'] . ' - ' . $rowCourse['description'] .  '</option>';
			}
			echo '</select><br>';
			echo 'Textbook ISBN (10 or 13): <input type="text" name="ISBN" pattern="(^[0-9]{10}$)|(^[0-9]{13}$)"><br>
				Other Notes: <textarea name="body" rows="10" cols="60" required></textarea>';
		}
	?>
	</fieldset>
	<input type="submit" value="Submit">
</form>
