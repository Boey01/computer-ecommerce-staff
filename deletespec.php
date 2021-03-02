<?php
include("connect.php");

$id = intval($_GET['id']);

$result = mysqli_query($con, "DELETE FROM specification where spec_id=$id");

mysqli_close($con);

echo '<script>window.location.href="ManageSpec.php";</script>';
 ?>
