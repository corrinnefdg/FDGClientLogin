<?php
// gets the information from the form and puts it in the database

	// submit post info without page redirect
	// http://code.tutsplus.com/tutorials/submit-a-form-without-page-refresh-using-jquery--net-59
	
	// curl
	// http://stackoverflow.com/questions/7886778/posting-variables-from-php-to-another-php-without-page-redirect
	// http://stackoverflow.com/questions/3045097/php-redirect-and-send-data-via-post

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