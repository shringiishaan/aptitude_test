<?php
//HANDLES LOGIN AND SENDS BACK SESSION['ERROR'] AND PRINTS THERE IF EXIST
//ADMIN USERID IS -99 AND ITS AUTHORISATION WILL BR CHECKED 
//IF(USERID == -99)
//{PERFORM ADMIN TASK};  
session_start();
include('dbconnect.php');

$userusername = test_data($_POST["username"]);    
$userpassword = test_data($_POST["password"]);

$_SESSION["user_username"] = $userusername;

function test_data($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$sql = "SELECT * FROM users WHERE username = '$userusername'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
include('../assets/encryptdecrypt.php');
$decryptedpassword = myDecrypt($row["password"]);

if ($userpassword == $decryptedpassword)
{
	if (isset($_POST['remember'])) 
	{
		setcookie('userid', $row["userid"] , time()+(60*60*24));
		// expires in 24 hours
	}
    $_SESSION["user_username"] = $userusername;
	$_SESSION["user_password"] = $userpassword;
	$_SESSION["user_email"] = $row["email"];
	$_SESSION["user_gender"] = $row["gender"];
	$_SESSION["user_fullname"] = $row["fullname"];
	$_SESSION["user_contact"] = $row["contact"];
	$_SESSION["user_address"] = $row["address"];
    $_SESSION["user_userid"] = $row["userid"];
	$_SESSION["user_examflag"] = $row["examflag"];
	
    mysqli_close($conn);
    header('Location:../');
    exit();
} 
else 
{
    mysqli_close($conn);
	$_SESSION['error'] = "Invalid Username or Password ! Please try again...";
    header('Location:../login.php');
    exit();        
}
	
?>