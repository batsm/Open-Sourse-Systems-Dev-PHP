<?php
	//  replace mysqllogin and mysqlpassword with your own
	$conn = mysqli_connect("localhost", "21605525", "MyPass", "db4_21605525");

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

?>
