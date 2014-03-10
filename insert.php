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
	
	// get values from form
	$sql = "INSERT INTO test (client_name, type, url, username, password)
	VALUES ('$_POST[inputName]',
		'$_POST[inputType]',
		'$_POST[inputUrl]',
		'$_POST[inputUsername]',
		'$_POST[inputPassword]')";
	
	// tells if added successfully or not
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	
	// close connection 
	mysqli_close($con);

?>