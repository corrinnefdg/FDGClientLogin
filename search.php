<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php

	echo "<h2>Search Results:</h2>";

	//If they did not enter a search term we give them an error
	/*if ($find == ""){
		echo "You forgot to enter a search term!";
		exit;
	}*/
	
	// define constants for connecting
	define('DB_USER', 'test_user');
	define('DB_PASSWORD', 'test');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'client_login');
	
	// connect
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	// check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
	$find = $_POST['find'];
	
	// We perform a bit of filtering
	/* $find = strtoupper($find);
	$find = strip_tags($find);
	$find = trim ($find);
		var_dump($find); */
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