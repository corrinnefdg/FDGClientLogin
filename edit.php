<?php

	//UPDATE Customers
	//SET ContactName='Alfred Schmidt', City='Hamburg'
	//WHERE CustomerName='Alfreds Futterkiste';
	
	// http://stackoverflow.com/questions/18386495/make-form-fields-editable-on-button-click
	
	
	include('config.php');

	if (isset($_POST['edit'])) {
		
		// get value from hidden field in form
		$cid = $_POST['clientRecordId'];
		
		// get changed values from client info field
		$ctype = $_POST['clientRecordType'];
		$curl = $_POST['clientRecordUrl'];
		$cuser = $_POST['clientRecordUsername'];
		$cpass = $_POST['clientRecordPassword'];
		
		// SET column1=value1,column2=value2,...
		$sql_edit = "UPDATE test SET type='$ctype', url='$curl', username='$cuser', password='$cpass' WHERE id='$cid'";
		
		// tells if added successfully or not
		if (!mysqli_query($con,$sql_edit)) {
			die('Error: ' . mysqli_error($con));
		}
		echo "1 record edited";
	}
	
	// close connection 
	mysqli_close($con);

?>