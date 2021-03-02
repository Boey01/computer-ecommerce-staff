<?php
include("connect.php");
$sql = "UPDATE specification SET
spec_name='$_POST[specname]',
spec_category='$_POST[speccat]'
WHERE spec_id=$_POST[specid];"
;

$query = mysqli_query($con,$sql) or die(mysqli_error($con));
if ($query==1)
{

echo '<script>alert("The spec is updated!")</script>';
echo '<script>window.location.href="ManageSpec.php";</script>';
}


mysqli_close($con);
?>
