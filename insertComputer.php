<?php
include("connect.php");
$target_dir = "images/";
$target_file = $target_dir.basename($_FILES["upload"]["name"]);

if (move_uploaded_file($_FILES["upload"]["tmp_name"],$target_file)){

$comp_name = $_POST["compname"];
$comp_price = $_POST["compprice"];
$comp_cat = $_POST["compcat"];
$comp_descp = $_POST["compdescp"];
$comp_size = $_POST["compsize"];

$comp_cpu = $_POST["compcpu"];
$comp_ram = $_POST["compram"];
$comp_gpu = $_POST["compgpu"];
$comp_storage = $_POST["compstorage"];
$file_name = basename($_FILES["upload"]["name"]);

$sql = "INSERT INTO computer(computer_name,price,comp_category,description,screen_size,thumbnail)

VALUES

('$comp_name','$comp_price','$comp_cat','$comp_descp','$comp_size','$file_name')";

$query = mysqli_query($con,$sql) or die(mysqli_error($con));
$comp_id = $con->insert_id;

if ($query==1)
{
  	$sql2 = "INSERT INTO specification_detail(computer_id,spec_id)

VALUES

('$comp_id','$comp_cpu')";
$addcpu = mysqli_query($con,$sql2) or die(mysqli_error($con));
if ($addcpu==1)
  {
  	$sql3 = "INSERT INTO specification_detail(computer_id,spec_id)

VALUES

('$comp_id','$comp_ram')";
$addram = mysqli_query($con,$sql3) or die(mysqli_error($con));

  if ($addram==1)
  {

      	$sql4 = "INSERT INTO specification_detail(computer_id,spec_id)

        VALUES

        ('$comp_id','$comp_gpu')";
        $addgpu = mysqli_query($con,$sql4) or die(mysqli_error($con));

        if($addgpu ==1){

          for($i=0;$i<count($comp_storage);$i++)
          {
            if($comp_storage[$i]!="" )
            {

      	$sql5 = "INSERT INTO specification_detail(computer_id,spec_id)

        VALUES

        ('$comp_id','$comp_storage[$i]')";
        $addstorage = mysqli_query($con,$sql5) or die(mysqli_error($con));
            }
            echo '<script>alert("A new computer has been created successfully!"); window.location.href="ManageComputer.php";</script>';

          }
        }
  }
}
}
}
mysqli_close($con);
?>
