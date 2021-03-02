<html>
<head>
<link rel='stylesheet' href='Staff.css'>
<style>
  body {
	font-family: 'Montserrat', sans-serif;
}

h1{
color:	rgb(10, 157, 230);
}
</style>
</head>
<body>
  <center>
<?php
include("connect.php");
$id = intval($_GET['id']);
$abc = "SELECT * FROM account,staff WHERE account.user_id = staff.user_id and staff.staff_id = $id";

$result = mysqli_query($con,$abc);
while($row = mysqli_fetch_array($result))
{
?>
<h1> My Profile</h1>
<form action='updatestaff.php' method='POST'>
  <input type="hidden" name="userid" value="<?php echo $row['user_id']?>">
  <div class="fields">
  <p>Username</p>
  <input type="text" name="username" value="<?php echo $row['username']?>" required>

    <p>Password</p>
  <input type="text" name="password" value="<?php echo $row['password']?>" required>

    <p>Email</p>
  <input type="text" name="email" value="<?php echo $row['email']?>" required>

    <p>Your Full Name</p>
  <input type="text" name="fullname" value="<?php echo $row['staff_name']?>" required>

    <p>Contact Number</p>
  <input type="text" name="contactnum" value="<?php echo $row['contact_number']?>" required>
<?php
}
mysqli_close($con);
 ?>
</div>
<br>
  <input type="submit" id="profileupdate" value="Update profile">
</form>
</center>
</body>
</html>
