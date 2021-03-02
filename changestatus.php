<?php
include("connect.php");

$id = intval($_GET['id']);

  $sql = "UPDATE orders SET shipment_status = 'Shipping' WHERE order_id = $id;";

$query = mysqli_query($con,$sql) or die(mysqli_error($con));
if ($query==1)
{

echo '<script>alert("The order is updated!")</script>';
echo '<script>window.location.href="ManageOrder.php";</script>';
}
mysqli_close($con);
 ?>
