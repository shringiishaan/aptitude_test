<?php


session_start();
include('dbconnect.php');

if($_SESSION['test_testname'] == 'qlr')
{	
	$sql = "update livetesttime set `testname`='qnr', `starttime` = '".date("Y-m-d H:i:s",strtotime("now"))."'";
	$_SESSION['test_testname'] = 'qnr';
}
else if ($_SESSION['test_testname'] == 'qnr')
{
	$sql = "update livetesttime set `testname`='vbr', `starttime` = '".date("Y-m-d H:i:s",strtotime("now"))."'";
	$_SESSION['test_testname'] = 'vbr';
}
else if ($_SESSION['test_testname'] == 'vbr')
{
	$sql = "delete from livetesttime where userid = '".$_SESSION['user_userid']."'";
	mysqli_query($conn, $sql);
	header('location:submittest.php');
	exit();
}

mysqli_query($conn, $sql);
	
header('Location:../test/question.php?qnum=1');
exit();
?>