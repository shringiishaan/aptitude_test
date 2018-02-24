<?php

session_start();
if(!isset($_POST['opt']))
{
	header('location:logout.php');
	exit();
}

include('dbconnect.php');
$userid = $_SESSION['user_userid'] ;
$sql = "update `livetest` set `useranswer` = '".$_POST['opt']."' where `userid` = '$userid' and `testname` = '".$_SESSION['test_testname']."' and `qnum` = '".$_POST['qnum']."' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
mysqli_close($conn);
header('Location:../test/question.php?qnum='.$_POST['qnum']);
exit();


?>