<?php
include("connect.php");
$accUP = "UPDATE account SET
username='$_POST[username]',
email='$_POST[email]',
password='$_POST[password]'
WHERE user_id=$_POST[userid];"
;

$query = mysqli_query($con,$accUP) or die(mysqli_error($con));
if ($query==1)
{
  $stfUP = "UPDATE staff SET
staff_name='$_POST[fullname]',
contact_number='$_POST[contactnum]'
WHERE user_id=$_POST[userid];";
session_start();
$_SESSION['mySession'] = $_POST['username'];

$query2 = mysqli_query($con,$stfUP) or die(mysqli_error($con));
if ($query2==1){

echo '<script>alert("Your profile is updated!")</script>';
echo '<script>window.location.href="StaffMain.php"</script>';
}
}
mysqli_close($con);
?>
