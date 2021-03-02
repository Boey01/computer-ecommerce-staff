<html>
<?php
include("session.php");
?>
<head>
	<title>Manage Computer</title>
	<link rel='stylesheet' href='Staff.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<style>
body {
  padding: 0;
  margin:0;
	background-image:linear-gradient(75deg,rgb(220, 222, 227),rgb(204, 205, 209));
	font-family: 'Montserrat', sans-serif;
	overflow-x: hidden;
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

<div class="content">
<div class="panel">
  <div class="searchbar">
       <form method="post" action="ManageComputer.php">
          <input type="text" name="search" placeholder="Type some keyword" id="search1">
          <input type="submit" name="searchbtn" value="Search"  id="search2">

<p>Search by:</p>
<select name="searchby">
						<option value=""> Name</option>
	          <option value="CPU">CPU Processor</option>
            <option value="RAM">RAM</option>
            <option value="Storage">Storage</option>
            <option value="GPU">GPU</option>
</select>
</form>
         </div>
<div class="wrapbuttonmanage">
<div class="buttons">
<button onclick="window.location.href='ManageSpec.php'">Manage Spec</button>
<a href="new_computer.php" rel="modal:open" id="createnewcomp">Create New Computer</a>
<button onclick="window.location.href='StaffMain.php'"><< Back</button>

</div>
</div>
</div>

<div class="display">
	<?php
	include("connect.php");

	if(isset($_POST['searchbtn']) && $_POST['searchby'] == '')
{
  $sql = "SELECT * FROM computer WHERE computer_name LIKE '%".$_POST['search']."%'";
}

else if(isset($_POST['searchbtn']) && $_POST['searchby'] == 'CPU'){
	  $sql = "SELECT computer.*, specification_detail.computer_id,specification.spec_name
		 FROM computer, specification_detail, specification
		 WHERE computer.computer_id = specification_detail.computer_id
		 AND specification.spec_category = 'CPU'
     AND specification.spec_id = specification_detail.spec_id
		 AND specification.spec_name LIKE '%".$_POST['search']."%'
		 GROUP BY computer.computer_id";

}

else if(isset($_POST['searchbtn']) && $_POST['searchby'] == 'RAM'){
	  $sql = "SELECT computer.*, specification_detail.computer_id,specification.spec_name
		 FROM computer, specification_detail, specification
		 WHERE computer.computer_id = specification_detail.computer_id
		 AND specification.spec_category = 'RAM'
     AND specification.spec_id = specification_detail.spec_id
		 AND specification.spec_name LIKE '%".$_POST['search']."%'
		 GROUP BY computer.computer_id";

}

else if(isset($_POST['searchbtn']) && $_POST['searchby'] == 'Storage'){
	  $sql = "SELECT computer.*, specification_detail.computer_id,specification.spec_name
		 FROM computer, specification_detail, specification
		 WHERE computer.computer_id = specification_detail.computer_id
		 AND specification.spec_category = 'Storage'
     AND specification.spec_id = specification_detail.spec_id
		 AND specification.spec_name LIKE '%".$_POST['search']."%'
		 GROUP BY computer.computer_id";

}

else if(isset($_POST['searchbtn']) && $_POST['searchby'] == 'GPU'){
	  $sql = "SELECT computer.*, specification_detail.computer_id,specification.spec_name
		 FROM computer, specification_detail, specification
		 WHERE computer.computer_id = specification_detail.computer_id
		 AND specification.spec_category = 'GPU'
     AND specification.spec_id = specification_detail.spec_id
		 AND specification.spec_name LIKE '%".$_POST['search']."%'
		 GROUP BY computer.computer_id";

}
	else {
		$sql = "SELECT * FROM computer ";
	}
	$result = mysqli_query($con,$sql);

		while ($row = mysqli_fetch_array($result))
		{

	echo '	<div class="computercard">
				<center>
				<p> Computer ID:&nbsp&nbsp<span>'.$row['computer_id'].'</span></p>
				<img src="images/'.$row['thumbnail'].'">
				<p> '.$row['computer_name'].'</p>
				<a href="editcomputer.php?id='.$row['computer_id'].'" rel="modal:open">More info</a>
				</center>
				</div>';
		}
			?>



</div>

</div>

</body>
</html>
