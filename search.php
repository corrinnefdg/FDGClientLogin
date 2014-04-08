<?php
	//SEARCH FUNCTION ===============================================

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
			// echo "<p>Found " .$anymatches. " matches for " .$find. ".</p>"; 
			// fix this for client_name
		}
	}
	else
	{
		$find = '';
		$query_result = [];
	}
	
	//And we display the results
	$client_list = array();
		
	// Looping through results to display each client
	while($result = mysqli_fetch_array( $query_result )){

		//fill the $client_list array with client information
		$client_name = $result['client_name'];
		$client_list[$client_name][] = $result;
	}
		// get each heading
		foreach($client_list as $client_name => $client_records){
?>
	 
<!-- Displaying Results ======================== -->  
<div class="clientName slideTitle">
	<h1><?php echo $client_name; ?></h1>
</div>
<section class="clientInfo slideInfo">

<?php
	// get each entry
	foreach($client_records as $client_record){
?>
	<div class="clientEntry">
	  <ul>
		<li>Type:<p><?php echo $client_record['type']; ?></p></li>
		<li>URL:<p><?php echo $client_record['url']; ?></p></li>
		<li>Username:<p><?php echo $client_record['username']; ?></p></li>
		<li>Password:<p><?php echo $client_record['password']; ?></p></li>
		<li>
				<form action="delete.php" method="post">
					<input type="hidden" name="clientRecordId" value="<?php echo $cid ?>" />
					<input type='submit' name='delete' value='Delete Entry' />
				</form>
		  </li>
	  </ul>
   </div>
   
   <?php } ?> <!-- end PHP foreach loop creating each Client Entry -->
   
	 <p class="addNew slideNew">Add New Entry</p>
		<div class="addNewInfo">
			<form action="insert.php" method="post">
				Client Name: <input type="text" name="inputName">
				Type: <input type="text" name="inputType">
				URL: <input type="text" name="inputUrl">
				<br />
				Username: <input type="text" name="inputUsername">
				Password: <input type="text" name="inputPassword">
				<input type="submit" name="addButton" value="Add">
			</form>
		</div>
</section>
<?php } ?> <!-- end PHP foreach loop creating each Client Name section -->