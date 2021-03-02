<?php
$servername ="localhost";
$Name = "root";
$password="password";
$dbname="itech";
// Create connection
$con = mysqli_connect($servername,$Name,$password,$dbname);
//Check connection
if (!$con) {
	die("Connection failed:".mysqli_connect_error());
}


?>