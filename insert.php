<?php
	
	// connect
	$con = mysqli_connect("localhost",
		"test_user",
		"test",
		"client_login");
	
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