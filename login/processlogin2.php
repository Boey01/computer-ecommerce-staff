<?php

include("conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{

$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$sql="SELECT * FROM account WHERE username='$username' and
password='$password'";

if ($result=mysqli_query($con,$sql))
 {
$rowcount=mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result))
{
    $userid = $row["user_id"];
		$test = $row["account_type"];
}

if($rowcount==1) {
session_start();
$_SESSION['mySession']=$username;
$_SESSION['myUserID']=$userid;

if($test ==="admin"){
	echo"<script>window.location.href=' '</script>";
}
if($test ==="staff"){
	echo"<script>window.location.href='/SDP/StaffMain.php'</script>";
}

if($test ==="customer"){
	echo"<script>window.location.href=''</script>";
}
}
else
{
  echo"<script>alert('Invalid Credentials! Please try again.');window.location.href='login.php'</script>";
}
}
mysqli_close($con);
}

?>
