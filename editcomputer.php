<html>
<head>
	<title>New computer</title>
	<link rel='stylesheet' href='Staff.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$php = '<?php include("connect.php");$cpusql = "SELECT * FROM specification where spec_category = 'Storage' ";$result = mysqli_query($con,$cpusql);while($row = mysqli_fetch_array($result)){echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'}."</option>";}mysqli_close($con);?>';

function add_row()
{
 $rowno=$("#storage_table tr").length;
 $rowno=$rowno+1;
 if ($rowno <5){
 $("#storage_table tr:last").after("<tr id='row"+$rowno+"'><td><select name ='compstorage[]' required><option value=''> Please Select</option>"+$php+"</select></td><td><input type='button' value='X' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
<style>
body {
	font-family: 'Montserrat', sans-serif;
}

h3{
	color:rgb(58, 165, 214);
}
</style>

</head>

<body>

<center>

  <?php
include("connect.php");
$id = intval($_GET['id']);
$abc = "SELECT * FROM computer WHERE computer.computer_id = $id";

$genresult = mysqli_query($con,$abc);
while($genrow = mysqli_fetch_array($genresult))
{
?>
<div class="createcomp editcomp">
<h3> Computer ID: <?php echo $genrow['computer_id']?></h3>
<form action="updatecomp.php" method="POST" ENCTYPE="multipart/form-data">
	<input type="hidden" name="compid" value = "<?php echo $genrow['computer_id']?>">
  		<img src="images/<?php echo $genrow['thumbnail']?>">
<p>Name</p>
<input type="text" name="compname" style="width:90%;" value="<?php echo $genrow['computer_name']?>" required><br>

<p>Price (RM)</p>
<input type="number" name="compprice" min="1" step="0.01" style="width:60%;" value="<?php echo $genrow['price']?>" required><br>
		<p>Laptop Size (Inches)</p>
<select name="compsize" required><br>
<option value="13"<?php if ($genrow['screen_size'] == "13") { ?>selected="selected"<?php } ?>>13.3"</option>
<option value="14"<?php if ($genrow['screen_size'] == "14") { ?>selected="selected"<?php } ?>>14.0"</option>
<option value="15"<?php if ($genrow['screen_size'] == "15") { ?>selected="selected"<?php } ?>>15.6"</option>
<option value="17"<?php if ($genrow['screen_size'] == "17") { ?>selected="selected"<?php } ?>>17.0"</option>
</select>
<p>CPU</p>
<select name="compcpu" required><br>
  <?php
include("connect.php");
$getsql = "SELECT c.computer_id, sd.spec_detail_id,s.spec_id,s.spec_name
FROM computer =c, specification_detail=sd, specification =s
WHERE c.computer_id = sd.computer_id
and sd.computer_id =  $id
and s.spec_category = 'CPU'
and sd.spec_id = s.spec_id";
$result = mysqli_query($con,$getsql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
<?php
include("connect.php");
$cpusql = "SELECT * FROM specification where spec_category = 'CPU' ";
$result = mysqli_query($con,$cpusql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
</select>
	<p>RAM</p>
<select name="compram" required><br>
  <?php
include("connect.php");
$getsql = "SELECT c.computer_id, sd.spec_detail_id,s.spec_id,s.spec_name
FROM computer =c, specification_detail=sd, specification =s
WHERE c.computer_id = sd.computer_id
and sd.computer_id =  $id
and s.spec_category = 'RAM'
and sd.spec_id = s.spec_id";
$result = mysqli_query($con,$getsql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
<?php
include("connect.php");
$cpusql = "SELECT * FROM specification where spec_category = 'RAM' ";
$result = mysqli_query($con,$cpusql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
</select>

		<p>GPU</p>
<select name="compgpu" ><br>
  <?php
include("connect.php");
$getsql = "SELECT c.computer_id, sd.spec_detail_id,s.spec_id,s.spec_name
FROM computer =c, specification_detail=sd, specification =s
WHERE c.computer_id = sd.computer_id
and sd.computer_id =  $id
and s.spec_category = 'GPU'
and sd.spec_id = s.spec_id";
$result = mysqli_query($con,$getsql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
<?php
include("connect.php");
$cpusql = "SELECT * FROM specification where spec_category = 'GPU' ";
$result = mysqli_query($con,$cpusql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
</select>

		<p>Category</p>
<select name="compcat" required><br>
<option value="Home" <?php if ($genrow['comp_category'] == "Home") { ?>selected="selected"<?php } ?>>Home</option>
<option value="Business"<?php if ($genrow['comp_category'] == "Business") { ?>selected="selected"<?php } ?>>Business</option>
<option value="Student"<?php if ($genrow['comp_category'] == "Student") { ?>selected="selected"<?php } ?>>Student</option>
<option value="Gaming"<?php if ($genrow['comp_category'] == "Gaming") { ?>selected="selected"<?php } ?>>Gaming</option>
</select>

<p>Storage</p>
<table id="storage_table2">

<?php
include("connect.php");
$storage = "Storage";
$storagesql = "SELECT computer.*, specification_detail.spec_detail_id, specification.* FROM computer, specification_detail, specification WHERE specification_detail.computer_id = $id and computer.computer_id = specification_detail.computer_id and specification_detail.spec_id = specification.spec_id and specification.spec_category = 'Storage'";
$result = mysqli_query($con,$storagesql);

while($row = mysqli_fetch_array($result))
	{
 echo '<select name="compstorage[]">
<option value="'.$row['spec_id'].'"> '.$row['spec_name'].'</option>
<option value ="empty"> Empty</option>';

$abcsql = "SELECT * FROM specification where spec_category = 'Storage' ";
$result123 = mysqli_query($con,$abcsql);
while($row123 = mysqli_fetch_array($result123))
	{

 echo "<option value=".$row123{'spec_id'}.">" . $row123{'spec_name'} . "</option>";
}


echo'</select>';

}

if (mysqli_num_rows($result) == 1){
	 echo '<select name="compstorage[]">
<option value="">Please Select</option>';


$abcsql = "SELECT * FROM specification where spec_category = 'Storage' ";
$result123 = mysqli_query($con,$abcsql);
while($row123 = mysqli_fetch_array($result123))
	{

 echo "<option value=".$row123{'spec_id'}.">" . $row123{'spec_name'} . "</option>";
}


echo'</select>';

}
mysqli_close($con);
?>
  </table>
<p>Thumbnail of the computer</p>
<input type="file" name="upload" accept="image/*" style=" width:70%;background:rgb(181, 181, 181);border-radius:10px;">




<p>Description</p>
<textarea name="compdescp"><?php echo $genrow['description']?> </textarea>


<?php
include("connect.php");
$specd = "SELECT sd.spec_detail_id, s.spec_id, s.spec_name
FROM computer =c, specification_detail =sd, specification =s
WHERE c.computer_id = sd.computer_id
and sd.spec_id = s.spec_id
and sd.computer_id = $id
and s.spec_category = 'CPU'";
$result = mysqli_query($con,$specd);

while($row = mysqli_fetch_array($result))
	{
echo '<input type="hidden" name="specd_cpu" value="'.$row['spec_detail_id'].'">';
	}
mysqli_close($con);
	?>

	<?php
include("connect.php");
$specd = "SELECT sd.spec_detail_id, s.spec_id, s.spec_name
FROM computer =c, specification_detail =sd, specification =s
WHERE c.computer_id = sd.computer_id
and sd.spec_id = s.spec_id
and sd.computer_id = $id
and s.spec_category = 'RAM'";
$result = mysqli_query($con,$specd);

while($row = mysqli_fetch_array($result))
	{
echo '<input type="hidden" name="specd_ram" value="'.$row['spec_detail_id'].'">';
	}
mysqli_close($con);
	?>

	<?php
include("connect.php");
$specd = "SELECT sd.spec_detail_id, s.spec_id, s.spec_name
FROM computer =c, specification_detail =sd, specification =s
WHERE c.computer_id = sd.computer_id
and sd.spec_id = s.spec_id
and sd.computer_id = $id
and s.spec_category = 'GPU'";
$result = mysqli_query($con,$specd);

while($row = mysqli_fetch_array($result))
	{
echo '<input type="hidden" name="specd_gpu" value="'.$row['spec_detail_id'].'">';
	}
mysqli_close($con);
	?>

	<?php
include("connect.php");
$specd = "SELECT sd.spec_detail_id, s.spec_id, s.spec_name
FROM computer =c, specification_detail =sd, specification =s
WHERE c.computer_id = sd.computer_id
and sd.spec_id = s.spec_id
and sd.computer_id = $id
and s.spec_category = 'Storage'";
$result = mysqli_query($con,$specd);

while($row = mysqli_fetch_array($result))
	{
echo '<input type="hidden" name="specd_storage[]" value="'.$row['spec_detail_id'].'">';
echo '<input type="hidden" name="origin_spec_storage[]" value="'.$row['spec_id'].'">';
	}
mysqli_close($con);
	?>
<br>
<input type="submit" value="Edit" id="newcompcreate" >
<?php echo '<a href="deletecomputer.php?id='.$genrow['computer_id'].'" id="del_comp" onClick="return confirm(\'Are you sure you want to delete this computer?\');">Delete</a>';?>
</div>
</form>
</center>
<?php
}
include("connect.php");
mysqli_close($con);
?>
</body>

</html>
