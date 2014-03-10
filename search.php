<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php

	include('config.php');

	echo "<h2>Search Results:</h2>";

	//If they did not enter a search term we give them an error
	/*if ($find == ""){
		echo "You forgot to enter a search term!";
		exit;
	}*/
	
	
	/* $find = $_POST['find'];
	var_dump($find); */
	
	
	
	if (isset($_POST['find'])) {
	// Filter
	$find = ($_POST['find']);
	var_dump($find);
	
	// Select statement
	$search = "SELECT * FROM test WHERE client_name LIKE '%$find%'";
	// Display
	$result = mysql_query($search) or die('query did not work');
	}
	echo ($result);
	
	// We perform a bit of filtering
	$find = strtoupper($find);
	$find = strip_tags($find);
	$find = trim ($find);
		var_dump($find); 
		
	//Now we search for our search term, in the field the user specified
	$clientName = mysqli_query("SELECT * FROM test WHERE client_name LIKE '%$find%'");
	var_dump($clientName);
	
	//And we display the results
	while($result = mysqli_fetch_array( $find ))
	{
		echo $result['inputName'];
		echo "<br>";
		echo $result['inputType'];
		echo "<br>";
		echo $result['inputUsername'];
		echo "<br>";
		echo $result['inputPassword'];
	}
	var_dump($result);
	
	// displays the number or results
	$anymatches=mysqli_num_rows($clientName);
	if ($anymatches == 0){
		echo "Sorry, but we can not find an entry to match your query...<br />";
	}
	
	//And we remind them what they searched for
	echo "<strong>Searched For:</strong> " .$find;
	//}

?>

</body>
</html>