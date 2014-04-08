<?php
// gets the information from the form (index.php) and puts it in the database

	// submit post info without page redirect
	// http://code.tutsplus.com/tutorials/submit-a-form-without-page-refresh-using-jquery--net-59
	
	// http://stackoverflow.com/questions/17267468/jquery-variable-to-php-variable

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
	var_dump ($_POST);
	
	// close connection 
	mysqli_close($con);

?>