<?php
// gets the information from the form (index.php) and puts it in the database

	include('config.php');
	
	$inputName = $_POST['inputName'];
	$inputType = $_POST['inputType'];
	$inputUrl = $_POST['inputUrl'];
	$inputUser = $_POST['inputUser'];
	$inputPass = $_POST['inputPass'];
	echo $inputName;
	
	// get values from form
	$sql = "INSERT INTO test (client_name, type, url, username, password)
	VALUES ('$inputName',
		'$inputType',
		'$inputUrl',
		'$inputUser',
		'$inputPass')";
	
	// tells if added successfully or not
	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	//var_dump ($_POST);
	
	// close connection 
	mysqli_close($con);

?>