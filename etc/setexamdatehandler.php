<?php

session_start();
if(!isset($_POST['examstart']))
{
	header('location:logout.php');
	exit();
}
include('dbconnect.php');
$userid = $_SESSION['user_userid'] ;
$sql = "update `admin` set `examstart` = '".$_POST['examstart']."', `examend` = '".$_POST['examend']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
mysqli_close($conn);
$_SESSION['message'] = "Exam Dates have been updated successfully !";
header('Location:../admin/setexamdate.php');
exit();


?>