<?php
include("connect.php");

$spec_name = $_POST["specname"];
$spec_category = $_POST["speccat"];


$sql = "INSERT INTO specification(spec_name,spec_category)

VALUES

('$spec_name','$spec_category')";

$query = mysqli_query($con,$sql) or die(mysqli_error($con));

if ($query==1)
{
echo '<script>alert("A new spec has been added successfully!"); window.location.href="ManageSpec.php";</script>';

}

mysqli_close($con);

?>
