<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$database = "itech";
 $conn = mysqli_connect("localhost","root","","itech","3306");
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $database);

if (!$conn){
	
	die("connection failed:  ".mysqli_connect_error());
}
?>
