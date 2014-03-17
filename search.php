<?php

	
	
	if (isset($_POST['find'])) {
		
		$find = $_POST['find'];

		// Perform a bit of filtering
		$find = strtoupper($find);
		$find = strip_tags($find);
		$find = trim ($find);
		
		// If they did not enter a search term we give them an error.
		// Or if $find is empty after stripping tags and filtering
		if ($find == ""){
			echo "You forgot to enter a search term!";
			exit;
		}
	
		// Select statement
		$search = "SELECT * FROM test WHERE client_name LIKE '%$find%' ORDER BY client_name";
		
		echo "<h1>Search Results:</h1>";	
		// Remind them what they searched for
		echo "<p>Searched For:<strong> " .$find. "</strong></p>";
		
		// Display
		$query_result = $con->query($search) or die('Query did not work.');
		
		// Displays the number or results
		$anymatches = mysqli_num_rows($query_result);
		if ($anymatches == 0){
			echo "<p>Sorry, but we can not find an entry to match your query.</p>";
		}
		else {
			echo "<p>Found " .$anymatches. " matches for " .$find. ".</p>";
		}
	}
	else
	{
		$find = '';
		$query_result = [];
	}
	
	//And we display the results
	while($result = mysqli_fetch_array( $query_result ))
	{
		echo "<ul>";
		echo "<li><strong>".$result['client_name']."</strong></li>";
		echo "<li>".$result['type']."</li>";
		echo "<li>".$result['url']."</li>";
		echo "<li>".$result['username']."</li>";
		echo "<li>".$result['password']."</li>";
		echo "</ul>";
	}

?>