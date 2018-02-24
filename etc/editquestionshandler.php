<?php
session_start();

if(isset($_POST['correctans']))
{
		include('dbconnect.php');
		$sql = "UPDATE questionbank set question='".$_POST['question']."', a='".$_POST['opta']."', b='".$_POST['optb']."',c='".$_POST['optc']."',
				d='".$_POST['optd']."',correctanswer='".$_POST['correctans']."' where testname = '".$_POST['testname']."' and qnum = '".$_POST['qnum']."'";
				
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		$_SESSION['message'] = "Question Edited successfully !";
		header('Location:/admin/editquestions.php');
		exit();
}

		header('Location:/etc/logout.php');
		exit();


?>