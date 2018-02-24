<?php
	session_start();
	
	if(!isset($_SESSION['user_userid']) or $_SESSION['user_userid']!=-99)
	{
		header('location:../etc/logout.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('../assets/metaData.php'); ?>
</head>

<body>

<div  id="wrapper">
	<?php include('../assets/navbar.php'); ?>
	<div class="container text-center">
		<div class="row text-center">
			<div class="col-lg-12">
				<h1 style="color:#337ab7"  class="page-header">Administrative Page</h1>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-lg-12">
				<br>
				<br>
				<a href="viewusers.php">View Users</a>
				<br>
				<br>
				<a href="setexamdate.php">Set Examination Date</a>
				
				<br>
				<br>
				<a href="viewquestions.php">View Questions</a>
				<br>
				<br>
				<a href="editquestions.php">Edit Questions</a>
				<br>
				<br>
				<a href="addquestion.php">Add/Remove Question</a>
				<br>
				<br>
				<a href="updatecutoffs.php">Update Examination Cutoffs</a>
				<br>
				<br>
				<a href="../results.php">View Result Chart</a>
				
				<br>
			</div>
		</div>
	</div>
</div>
           
</body>

</html>
