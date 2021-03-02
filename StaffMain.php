<html>
<?php
include("session.php");
?>
<head>
	<title>Staff Main</title>
	<link rel='stylesheet' href='Staff.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>
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
	<a href="editstaffprofile?id=<?php echo $_SESSION['myUserID']?>" rel="modal:open">My Profile</a>
<button id="logout_btn" onclick="window.location.href='login/logout.php'">Logout</button>
</div>
</div>

<div class="content">
<div class="leftmain">
<h1>
<span style="font-size:60px;">
Welcome back</span>  ,
<br>
<?php echo  $_SESSION['mySession'].'.';?>
</h1>

<div class="manage_comp" onclick="window.location.href='ManageComputer.php'">
<p>Manage Computer</p>
</div>

<div class="manage_order" onclick="window.location.href='manageOrder.php'">
<p>View Order</p>
</div>

<div class="manage_request" onclick="window.location.href='viewrequest.php'">
<p>View Request</p>
</div>

</div>

<div class="rightmain">
	<img src="https://wp-media.petersons.com/blog/wp-content/uploads/2017/12/10124335/glenn-carstens-peters-203007-unsplash.jpg">
</div>

</div>
  </body>

  </html>
