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
 if ($rowno < 5){
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

h1{
	color:rgb(58, 165, 214);
}
</style>

</head>

<body>

<div class="createcomp">
<h1> Creating new computer</h1>
<form action="insertComputer.php" method="POST" ENCTYPE="multipart/form-data">
<p>Name</p>
<input type="text" name="compname" style="width:90%;" required><br>

<p>Price (RM)</p>
<input type="number" name="compprice" min="1" step="0.01" style="width:60%;" required><br>
		<p>Laptop Size (Inches)</p>
<select name="compsize" required><br>
<option value="">Please Select</option>
<option value="13">13.3"</option>
<option value="14">14.0"</option>
<option value="15">15.6"</option>
<option value="17">17.0"</option>
</select>
<p>CPU</p>
<select name="compcpu" required><br>
<option value="">Please Select</option>
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
<option value="">Please Select</option>
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
<option value="">Please Select</option>
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
<option value="">Please Select</option>
<option value="Home">Home</option>
<option value="Business">Business</option>
<option value="Student">Student</option>
<option value="Gaming">Gaming</option>
</select>

<p>Storage</p>
<table id="storage_table">
   <tr id="row1">
    <td>
    <select name ='compstorage[]' required>
      <option value=''> Please Select</option>
			<?php
include("connect.php");
$cpusql = "SELECT * FROM specification where spec_category = 'Storage' ";
$result = mysqli_query($con,$cpusql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
    </select>
  </td>
   </tr>

	  <tr id="row2">
    <td>
    <select name ='compstorage[]' >
      <option value=''> Please Select</option>
			<?php
include("connect.php");
$cpusql = "SELECT * FROM specification where spec_category = 'Storage' ";
$result = mysqli_query($con,$cpusql);
while($row = mysqli_fetch_array($result))
	{

 echo "<option value=".$row{'spec_id'}.">" . $row{'spec_name'} . "</option>";
}
mysqli_close($con);
?>
    </select>
  </td>
   </tr>
  </table>

<p>Thumbnail of the computer</p>
<input type="file" name="upload" accept="image/*" style="width:80%;" required>

<p>Description</p>
<textarea name="compdescp"></textarea>
<br>
<input type="submit" value="Create" id="newcompcreate">
</div>

</form>

</body>

</html>
