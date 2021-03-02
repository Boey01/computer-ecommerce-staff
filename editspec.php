<html>
<head>
	<title>Manage Spec</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400&display=swap" rel="stylesheet">
</head>
<style>

h1 {
  color:rgb(78, 148, 249);
  font-family:'Noto Sans JP', sans-serif;
  font-size: 40px;
  margin-bottom: 10px;

}

*{
	font-family: 'Montserrat', sans-serif;
}
option,input{
  font-weight: 300;
}

select,input{
  width:200px;
  height:35px;
  margin-bottom:20px;
  margin-top:5px;
  border:1px solid rgb(226, 226, 226);
  color:rgb(61, 61, 61);
  padding-left: 10px;
}

select:focus,input:focus{
  outline:none;
}

#update{
  background:rgb(78, 148, 249);
  color:white;
  border:none;
  font-size: 16px;
  font-weight:400;
  cursor: pointer;
  padding: 8px 50px 15px 50px;;
}

label{
  font-size: 20px;
    color:rgb(61, 61, 61);
}

#del{
  background:rgb(249, 86, 78);
  color:white;
  border:none;
  font-size: 16px;
  font-weight:400;
  text-decoration: none;
  padding: 6px 30px;
}
</style>
<body>
<?php
include("connect.php");
$id = intval($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM specification WHERE spec_id=$id");
while($row = mysqli_fetch_array($result))
{
?>

<h1>EDIT  SPEC</h1>
<form action="edit_spec.php" method="POST">
  <div class="addnewspec">
    <input type="hidden" name="specid" value="<?php echo $row['spec_id']?>">
<label for="specname" style="font-size:20px;">Name</label>
  <br>
<input type="text" name="specname" value="<?php echo $row['spec_name']?>" required>
<br>
<label for="speccat" style="font-size:20px;">Categories</label>
  <br>
        <select name="speccat" required>
            <option value="CPU"<?php if ($row['spec_category'] == "CPU") { ?>selected="selected"<?php } ?>>CPU Processor</option>
            <option value="RAM"<?php if ($row['spec_category'] == "RAM") { ?>selected="selected"<?php } ?>>RAM</option>
            <option value="Storage"<?php if ($row['spec_category'] == "Storage") { ?>selected="selected"<?php } ?>>Storage</option>
            <option value="GPU"<?php if ($row['spec_category'] == "GPU") { ?>selected="selected"<?php } ?>>GPU</option>
          </select>
          <br>
    <input type="submit" value="C h a n g e" id="update" >
    <?php echo '<a href="deletespec.php?id='.$row['spec_id'].'" id="del" onClick="return confirm(\'Are you sure you want to delete this spec?\');">Delete</a>';?>
</div>
</form>
<?php
}
mysqli_close($con);
?>
</body>
</html>
