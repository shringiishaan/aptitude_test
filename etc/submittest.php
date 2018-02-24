<?php

session_start();

include('dbconnect.php');
$userid = $_SESSION['user_userid'] ;

//CHECKING QLR MARKS
$qlrmarks = 0;
$sql = "select * from livetest where testname = 'qlr' and userid = '$userid'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
	if($row['useranswer'] == $row['correctanswer'])
	{
		$qlrmarks = $qlrmarks + 4;
	}
	else if($row['useranswer'] != 'Z')
	{
		$qlrmarks = $qlrmarks - 1;
	}
}


//CHECKING QNR MARKS
$qnrmarks = 0;
$sql = "select * from livetest where testname = 'qnr' and userid = '$userid'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
	if($row['useranswer'] == $row['correctanswer'])
	{
		$qnrmarks = $qnrmarks + 4;
	}
	else if($row['useranswer'] != 'Z')
	{
		$qnrmarks = $qnrmarks - 1;
	}
}



//CHECKING VBR MARKS
$vbrmarks = 0;
$sql = "select * from livetest where testname = 'vbr' and userid = '$userid'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
	if($row['useranswer'] == $row['correctanswer'])
	{
		$vbrmarks = $vbrmarks + 4;
	}
	else if($row['useranswer'] != 'Z')
	{
		$vbrmarks = $vbrmarks - 1;
	}
}



$sql = "insert into results (userid,marksQLR,marksQNR,marksVBR,total) values ('$userid','$qlrmarks','$qnrmarks','$vbrmarks','".($qlrmarks+$qnrmarks+$vbrmarks)."')";
$result = mysqli_query($conn, $sql);


$sql = "update users set examflag = '1' where userid = '".$_SESSION['user_userid']."'";
$result = mysqli_query($conn, $sql);
$_SESSION["user_examflag"] = 1;

$sql = "delete from livetest where userid = '".$_SESSION['user_userid']."'";
$result = mysqli_query($conn, $sql);



mysqli_close($conn);

header('Location:../profile/');
exit();

?>