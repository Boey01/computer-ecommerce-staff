<?php
    $con = mysqli_connect("localhost","root","","itech","3306");
	
	if (mysqli_connect_errno())
	{
		echo"Failed to connect to MySQL :".mysqli_connect_error();
	}
    /*else
	{ 
        echo "MySQL successfully connected";
	}*/
?>