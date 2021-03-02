<?php
include("connect.php");

$comp_id = $_POST["compid"];
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

$spec_d_cpu = $_POST["specd_cpu"];
$spec_d_ram = $_POST["specd_cpu"];
$spec_d_gpu = $_POST["specd_cpu"];
$spec_d_storage = $_POST["specd_storage"];

$spec_d_storagecounter1 = $spec_d_storage[0];

if( ($comp_storage[0] =="" && $comp_storage[1] =="") or ($comp_storage[0] =="empty" && $comp_storage[1] =="empty")){

  echo' <script>alert("Please have ATLEAST 1 storage!");window.location.href="ManageComputer.php";</script>';
}

  else {

  if($_FILES["upload"]["error"] == 4) {

  $sql = "UPDATE computer SET
  computer_name='$_POST[compname]',
  price='$_POST[compprice]',
  comp_category='$_POST[compcat]',
  description='$_POST[compdescp]',
  screen_size ='$_POST[compsize]'
  WHERE computer_id=$comp_id;"
  ;

  }
  else{

    $target_dir = "images/";
  $target_file = $target_dir.basename($_FILES["upload"]["name"]);

  move_uploaded_file($_FILES["upload"]["tmp_name"],$target_file);
  $file_name = basename($_FILES["upload"]["name"]);

  $sql = "UPDATE computer SET
  computer_name='$_POST[compname]',
  price='$_POST[compprice]',
  comp_category='$_POST[compcat]',
  description='$_POST[compdescp]',
  screen_size ='$_POST[compsize]',
  thumbnail= '$file_name'
  WHERE computer_id=$comp_id;"
  ;
  }

$query = mysqli_query($con,$sql) or die(mysqli_error($con));


  //Storage
    $storagecounter1 =  $comp_storage[0];
    $storagecounter2 =  $comp_storage[1];

    $checkstoragesql = "SELECT sd.spec_detail_id, s.spec_id, s.spec_name
                        FROM computer =c, specification_detail =sd, specification =s
                        WHERE c.computer_id = sd.computer_id
                        AND sd.spec_id = s.spec_id
                        AND sd.computer_id = $comp_id
                        AND s.spec_category = 'Storage'";
$result = mysqli_query($con,$checkstoragesql);

if (mysqli_num_rows ( $result ) ==1 ){
  $a = array_filter($comp_storage);

          if (count($a) ==2){

          $updatesql = "UPDATE specification_detail SET
          spec_id='$storagecounter1'
          WHERE spec_detail_id=$spec_d_storagecounter1;";

          $insertsql = "INSERT INTO specification_detail(computer_id,spec_id)
          VALUES
          ('$comp_id','$storagecounter2')";

          $query1 = mysqli_query($con,$updatesql) or die(mysqli_error($con));
          $query2 = mysqli_query($con,$insertsql) or die(mysqli_error($con));
          }

          if (count($a) ==1){
        for($i=0;$i<count($comp_storage);$i++)
          {
            if($comp_storage[$i]!="" )
            {
           $updatesql = "UPDATE specification_detail SET
          spec_id='$comp_storage[$i]'
          WHERE spec_detail_id=$spec_d_storagecounter1;";
          $query1 = mysqli_query($con,$updatesql) or die(mysqli_error($con));

          }
}
}
}

 if (mysqli_num_rows ( $result ) ==2 ){
    $spec_d_storagecounter2 = $spec_d_storage[1];
     $a = array_filter($comp_storage);
          if (count($a) ==2){
                    for($i=0;$i<count($comp_storage);$i++)
          {
            if($comp_storage[$i]!="" )
            {
           $updatesql = "UPDATE specification_detail SET
          spec_id='$comp_storage[$i]'
          WHERE spec_detail_id= $spec_d_storage[$i]";
          $query1 = mysqli_query($con,$updatesql) or die(mysqli_error($con));

          }
          if ($comp_storage[$i] =="empty" ){
            $deletesql = "DELETE FROM specification_detail where spec_detail_id=$spec_d_storage[$i]";
            $query2 = mysqli_query($con,$deletesql) or die(mysqli_error($con));
          }
          }
          }
        }
        echo '<script>alert("The computer is updated");
        window.location.href="ManageComputer.php";
        </script>';
 }



mysqli_close($con);
?>
