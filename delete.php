<?php
	include('config.php');

	if (isset($_POST['delete'])) {
		
		// get value from hidden field in form
		$cid = $_POST['clientRecordId'];
		
		$sql_delete = "DELETE FROM test WHERE id='$cid'";
		
		// tells if added successfully or not
		if (!mysqli_query($con,$sql_delete)) {
			die('Error: ' . mysqli_error($con));
		}
		echo "1 record deleted";
	}
	
	// close connection 
	mysqli_close($con);
 ?>