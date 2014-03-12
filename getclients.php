<?php
	
	include('config.php');
	
	echo "<h1>Client</h1>";	
	
	// Select statement
	$select = "SELECT * FROM test ORDER BY client_name";
		echo $select; 
	
	// Display
	$q_result = $con->query($select) or die('Query did not work.');
		
	// Seeing if there are any matches
	$anymatches = mysqli_num_rows($q_result);
		echo $anymatches;
	
	
	// Tryin' to loop through results and display
	while($result = mysqli_fetch_array( $q_result )){
		echo "<p><strong>".$result['client_name']."</strong></p>";
	}

	echo "words";

?>