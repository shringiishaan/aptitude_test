<?php

session_start();
include('	dbconnect.php');
if(isset($_POST['cutoffm']))
{
	if($_POST['testname']=='qlr' )
	{
		include('dbconnect.php');
		$sql = "UPDATE admin set cutoffQLR = '".$_POST['cutoffm']."' where 1 ";
	}
	if($_POST['testname']=='qnr' )
	{
		include('dbconnect.php');
		$sql = "UPDATE admin set cutoffQNR = '".$_POST['cutoffm']."' where 1 ";
	}
	if($_POST['testname']=='vbr' )
	{
		include('dbconnect.php');
		$sql = "UPDATE admin set cutoffVBR = '".$_POST['cutoffm']."' where 1 ";
	}
	
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	$_SESSION['message'] = "Cutoff updated successfully !";
	header('Location:/admin/updatecutoffs.php');
	exit();
}

?>