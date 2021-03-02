<?php
include("connect.php");

$id = intval($_GET['id']);

$result = mysqli_query($con, "DELETE FROM request where request_id=$id");

mysqli_close($con);

echo '<script>window.location.href="viewrequest.php";</script>';
 ?>
