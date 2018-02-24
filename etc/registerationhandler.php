<?php
//HANDLES REGISTERATIN AND SENDS BACK SESSION['ERROR'] AND PRINTS THERE IF EXIST
session_start();

function test_data($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$_SESSION["user_username"] = test_data($_POST["username"]);
$_SESSION["user_password"] = test_data($_POST["password"]);
$_SESSION["user_email"] = $_POST["email"];
$_SESSION["user_fullname"] = $_POST["fullname"];
$_SESSION["user_gender"] = $_POST["gender"];
$_SESSION["user_contact"] = $_POST["contact"];
$_SESSION["user_address"] = $_POST["address"];

if($_POST["password"] != $_POST["password2"])
{
	$_SESSION['error'] = "Passwords don't match! Please try again";
	header('Location:../registeration.php');
	exit();
}
	
include('dbconnect.php');


$sql = "SELECT * FROM users WHERE username = '".$_SESSION["user_username"]."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) != 0)
{
	$_SESSION['error'] = "Username already exists! Please try again";
	header('Location:../registeration.php');
	exit();
}

include('../assets/encryptdecrypt.php');
$encryptedpassword = myEncrypt($_SESSION["user_password"]);

$sql = "INSERT INTO users (fullname, username, password,email,address,contact,gender,examflag)
VALUES ('".$_POST['fullname']."','".$_SESSION["user_username"]."','".$encryptedpassword."','".$_POST['email']."','".$_POST['address']."','".$_POST['contact']."','".$_POST['gender']."','0'); ";
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM users WHERE username = '".$_SESSION["user_username"]."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION["user_userid"] = $row["userid"];
$_SESSION["user_examflag"] = 0;

mysqli_close($conn);
$_SESSION['message'] = "You have been successfully registered. please Login !";
header('Location:/etc/logout.php');
exit();


?>