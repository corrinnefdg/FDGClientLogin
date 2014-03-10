<?php

	// define constants for connecting
	define('DB_USER', 'test_user');
	define('DB_PASSWORD', 'test');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'client_login');
	
	// connect
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	// check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>