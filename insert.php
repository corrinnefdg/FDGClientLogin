<?php
// gets the information from the form and puts it in the database

	include('config.php');
	
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