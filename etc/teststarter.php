<?php

session_start();

if(!isset($_SESSION['user_examflag']) or $_SESSION['user_examflag']==1)
{
	$_SESSION['message'] = "You Have already given our test !";
	header('location:/');
	exit();
}

$_SESSION['test_testname'] = 'qlr';
	
include('dbconnect.php');

$sql = "SELECT * FROM questionbank where testname = 'qlr' order by rand() LIMIT 30 ";
$result = mysqli_query($conn, $sql);
for($i=1;$i<=30;$i++)
{
	$row = mysqli_fetch_assoc($result);
	$sql = "INSERT INTO `livetest` (`userid`, `testname`, `qnum`, `question`,`a`,`b`,`c`,`d`,`correctanswer`,`useranswer`) 
			VALUES ('".$_SESSION['user_userid']."','qlr','".$i."','".$row['question']."','".$row['a']."','".$row['b']."',
			'".$row['c']."','".$row['d']."','".$row['correctanswer']."','Z')";
	mysqli_query($conn, $sql);
}	

$sql = "SELECT * FROM questionbank where testname = 'qnr' ORDER BY RAND() LIMIT 30";
$result = mysqli_query($conn, $sql);
for($i=1;$i<=30;$i++)
{
	$row = mysqli_fetch_assoc($result);
	$sql = "INSERT INTO `livetest` (`userid`, `testname`, `qnum`, `question`,`a`,`b`,`c`,`d`,`correctanswer`,`useranswer`) 
			VALUES ('".$_SESSION['user_userid']."','qnr','".$i."','".$row['question']."','".$row['a']."','".$row['b']."',
			'".$row['c']."','".$row['d']."','".$row['correctanswer']."','Z')";
	mysqli_query($conn, $sql);
}	

$sql = "SELECT * FROM questionbank where testname = 'vbr' ORDER BY RAND() LIMIT 30";
$result = mysqli_query($conn, $sql);
for($i=1;$i<=30;$i++)
{
	$row = mysqli_fetch_assoc($result);
	$sql = "INSERT INTO `livetest` (`userid`, `testname`, `qnum`, `question`,`a`,`b`,`c`,`d`,`correctanswer`,`useranswer`) 
			VALUES ('".$_SESSION['user_userid']."','vbr','".$i."','".$row['question']."','".$row['a']."','".$row['b']."',
			'".$row['c']."','".$row['d']."','".$row['correctanswer']."','Z')";
	mysqli_query($conn, $sql);
}

$sql = "Insert into livetesttime (`userid`, `testname`, `starttime`) VALUES ('".$_SESSION['user_userid']."','qlr','".date("Y-m-d H:i:s",strtotime("now"))."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);
header('Location:../test/question.php?qnum=1');
exit();

?>