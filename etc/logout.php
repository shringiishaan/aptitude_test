<?php
session_start();

if(isset($_SESSION['message']))
{
	$message = $_SESSION['message'];
}

session_unset();
setcookie('userid', '', (time()-360000));

$_SESSION['message'] = $message ;

header('Location:../');
exit();
?>