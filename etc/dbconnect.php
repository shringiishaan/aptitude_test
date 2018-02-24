<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aptitude_test";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) 
{
     echo '<script>alert("Database connection not established");</script>';
	 exit();
}

?>
