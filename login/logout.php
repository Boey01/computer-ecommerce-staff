<?php

include("conn.php");

if (!$con){
	
	die("connection failed:  ".mysqli_connect_error());
}
else {
	session_start();
		header("location:login.php");
	session_destroy();

}
