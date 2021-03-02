<?php

include("connect.php");

$id = intval($_GET['id']);

$result = mysqli_query($con, "DELETE FROM computer where computer_id=$id");
$result2 = mysqli_query($con, "DELETE FROM specification_detail where computer_id=$id");

mysqli_close($con);


echo '<script>alert("The computer record has deleted successfully.");window.location.href="ManageComputer.php";</script>';
 ?>
