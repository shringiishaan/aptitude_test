<?php

	
session_start();
include('dbconnect.php');

$_SESSION['user_userid'] = $_COOKIE['userid'];

$sql = "SELECT * FROM users WHERE userid = '".$_SESSION['user_userid']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION["user_username"] = $username;
$_SESSION["user_password"] = $username;
$_SESSION["user_email"] = $row["email"];
$_SESSION["user_gender"] = $row["gender"];
$_SESSION["user_fullname"] = $row["fullname"];
$_SESSION["user_contact"] = $row["contact"];
$_SESSION["user_address"] = $row["address"];
$_SESSION["user_examflag"] = $row["examflag"];

mysqli_close($conn);
header('Location:../');
exit();

?>