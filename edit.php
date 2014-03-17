<?php

	//UPDATE Customers
	//SET ContactName='Alfred Schmidt', City='Hamburg'
	//WHERE CustomerName='Alfreds Futterkiste';
	
	// http://stackoverflow.com/questions/18386495/make-form-fields-editable-on-button-click
	
	
	include('config.php');

	if (isset($_POST['edit'])) {
		
		// get value from hidden field in form
		$cid = $_POST['clientRecordId'];
		
		$sql_edit = "UPDATE FROM test WHERE id='$cid'";
		
		// tells if added successfully or not
		if (!mysqli_query($con,$sql_edit)) {
			die('Error: ' . mysqli_error($con));
		}
		echo "1 record edited";
	}
	
	// close connection 
	mysqli_close($con);

?>