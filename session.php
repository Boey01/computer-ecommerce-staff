<?php
session_start();
if (!isset($_SESSION['mySession']))
{
header("location: /SDP/login/login.php");
}
?>
