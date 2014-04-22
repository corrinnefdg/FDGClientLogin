<?php
	include('config.php');

	// get value from hidden field in form
	$cid = $_POST['clientRecordId'];
	
	$sql_delete = "DELETE FROM test WHERE id='$cid'";
	
	// tells if added successfully or not
	if (!mysqli_query($con,$sql_delete)) {
		die('Error: ' . mysqli_error($con));
	}
	echo "Entry deleted";
	
	// close connection 
	mysqli_close($con);
 ?>