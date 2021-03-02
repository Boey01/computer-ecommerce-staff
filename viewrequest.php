<html>
<?php
include("session.php");
?>
<head>
	<title>View Request</title>
	<link rel='stylesheet' href='Staff.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>

* {
  box-sizing: border-box;
}

body {
  padding: 0;
  margin:0;
	background-image:linear-gradient(75deg,rgb(220, 222, 227),rgb(204, 205, 209));
	font-family: 'Montserrat', sans-serif;
}
</style>

</head>

<body>
<div class="tab">
<div class="title">
  <p>i<span style="font-weight:bold;">Tech</span></p>
</div>
<div class="logout">
<button id="logout_btn" onclick="">Logout</button>
</div>
</div>


<h2 style="margin-left:20px;">View Request</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ...">

<div class="table">
<table id="spectable">
  <thead>
  <tr class="header" style="  font-size: 16px;">
    <th style="width:20%;">Request ID</th>
    <th style="width:20%;">Customer ID</th>
    <th style="width:50%;">Budget</th>
    <th style="width:5%;"></th>
    <th style="width:5%;"></th>
  </tr>
</thead>
<tbody id="myTable">
<?php
include("connect.php");

$sql = "SELECT * FROM request WHERE staff_id=''";

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result))
{
  echo'<tr>
    <td>'.$row['request_id'].'</td>
    <td>'.$row['customer_id'].'</td>
    <td> RM '.$row['budget'].'</td>
    <td><a href="viewmorerequest.php?id='.$row['request_id'].'" rel="modal:open" style="background:rgb(46, 150, 235);">View</a></td>
    <td><a href="deleterequest.php?id='.$row['request_id'].'" style="  background: rgb(224, 79, 40);" onClick="return confirm(\'Are you sure you want to delete this spec?\');">Delete</a></td>
  </tr>';
}

  ?>
</tbody>
</table>
</div>
<div id="ex1" class="modal">
<h1 class="ans" style="  color:rgb(78, 148, 249);">ADD NEW SPEC</h1>
<form action="insertSpec.php" method="POST">
  <div class="addnewspec">
<label for="specname" style="font-size:20px;">Name</label>
  <br>
<input type="text" name="specname" required>
<br>
<label for="speccat" style="font-size:20px;">Categories</label>
  <br>
        <select name="speccat" required>
            <option value="">Please Select</option>
            <option value="CPU">CPU Processor</option>
            <option value="RAM">RAM</option>
            <option value="Storage">Storage</option>
            <option value="GPU">GPU</option>
          </select>
          <br>
    <input type="submit" value="C r e a t e" class="create" style="  color:white;" >
</div>
</form>
</div>

<br><br>
<button onclick="window.location.href='StaffMain.php'" class="addspec2"><< Back</button>

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  </body>

  </html>
