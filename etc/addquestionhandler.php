<?php
session_start();

if(isset($_POST['correctans']))
{
	if(isset($_POST['testname']))
	{
		include('../etc/dbconnect.php');															
		$sql = "SELECT * FROM questionbank WHERE testname='".$_POST['testname']."' order by qnum desc";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$lastqnum = $row['qnum'];
		$qnum = $lastqnum +1;
		$sql = "INSERT INTO questionbank (testname,qnum,question, a, b,c,d,correctanswer)
				VALUES ('".$_POST['testname']."','$qnum','".$_POST['question']."','".$_POST['opta']."','".$_POST['optb']."',
				'".$_POST['optc']."','".$_POST['optd']."','".$_POST['correctans']."'); ";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		$_SESSION['message'] = "Question added successfully !";
		header('Location:/admin/addquestion.php');
		exit();
	}
}

if(isset($_POST['qnum']))
{
	if(isset($_POST['testname']))
	{
		include('dbconnect.php');
		$sql = "Delete from questionbank where testname='".$_POST['testname']."' and qnum = '".$_POST['qnum']."' ";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		$_SESSION['message'] = "Question Deleted successfully !";
		header('Location:/admin/addquestion.php');
		exit();
	}
}

header('Location:/etc/logout.php');
exit();

?>