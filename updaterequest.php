<?php
include("connect.php");

$replyby = $_POST['repliedby'];
$suggest = $_POST['suggestedlaptop'];
$req_id = $_POST['requestid'];

$sql = "UPDATE request SET
staff_id='$replyby',
computer_id='$suggest'
WHERE request_id=$req_id;"
;

$query = mysqli_query($con,$sql) or die(mysqli_error($con));
if ($query==1)
{

echo '<script>alert("You\'ve successfully replied the request.")</script>';
echo '<script>window.location.href="viewrequest.php";</script>';
}





mysqli_close($con);
?>
