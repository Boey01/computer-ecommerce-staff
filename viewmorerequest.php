<html>
<?php
include("session.php");
?>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400&display=swap" rel="stylesheet">
<style>
*{
	font-family: 'Montserrat', sans-serif;
}
</style>
</head>

<body>
<center>

<?php
include("connect.php");
$id = intval($_GET['id']);
$sql = "SELECT customer.customer_name, request.*
  from customer, request WHERE customer.customer_id = request.customer_id
  and request.request_id = $id";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
?>

<h4> Customer Name:</h4>
<?php echo $row['customer_name']?>
<h4> Budget: </h4>
RM <?php echo $row['budget']?>
<br><br>
<textarea style="resize:none;width:80%;height:100px;outline:none;text-align: center;" readonly>
<?php echo $row['request_description']?>
</textarea>
<?php
}
mysqli_close($con);
?>
<br>

<form action="updaterequest.php" method="POST" class="suggest">
<p> Suggest Computer: </p>

<input type="hidden" name="repliedby" value="<?php echo $_SESSION['myUserID']?>">
<input type="hidden" name="requestid" value="<?php echo $id; ?>">
<select name="suggestedlaptop" required>
  <?php
include("connect.php");
$getsql = "SELECT * FROM computer";
$result = mysqli_query($con,$getsql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'computer_id'}.">" . $row{'computer_name'} . "</option>";
}
mysqli_close($con);
?>
</select>

<input type="submit" value="Submit">
</form>
</center>
</body>

</html>
