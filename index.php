<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Prismatic - Client Login List</title>

<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<script src="functions.js"></script>

</head>

<body>

	<!-- header -->
    <header class="header">
    	<img src="assets/images/prismatic.png" alt="Prismatic" />
       
       <form id="searchBox" method="post" action="">
          <input type="text" name="find" placeholder="Search">
          <button class="icon icon-search" type="submit"></button>
       </form>
    </header>
    
   	<main>
    
    <?php 
		include('config.php');
		include('search.php');
	?>

 
	<!-- ADD NEW CLIENT =============================================== -->
	<div class="newClientName slideTitle">
		<h1>Add New Client</h1>
	</div>
	   <section class="newClientInfo slideInfo">
			<form action="insert.php" method="post">
				<label for='cli_name'>Client Name:</label><input id="cli_name" type="text" name="inputName">
				<br />
				<label for='cli_type'>Type:</label><input id="cli_type" type="text" name="inputType">
				<label for='cli_url'>URL:</label><input id="cli_url" type="text" name="inputUrl">
				<br />
				<label for='cli_user'>Username:</label><input id="cli_user" type="text" name="inputUser">
				<label for='cli_pass'>Password:</label><input id="cli_pass" type="text" name="inputPass">
				<button class="icon icon-checkmark" type="submit" name="addButton" value="Add"></button>
			</form>
	   </section>
           
       
   <section id="sortable">
   <!-- CLIENT LIST=============================================== -->
	<?php

		// Select statement
		$select = "SELECT * FROM test ORDER BY client_name";
		
		// Display
		$q_result = $con->query($select) or die('Query did not work.');
		
		$client_list = array();
		
		// Looping through results to display each client
		while($result = mysqli_fetch_array( $q_result )){

			//fill the $client_list array with client information
			$client_name = $result['client_name'];
			$client_list[$client_name][] = $result;
		}
		
		// get each heading
		foreach($client_list as $client_name => $client_records){
		?>
			
			<div class="clientName slideTitle">
				<h1><?php echo $client_name; ?></h1>
			</div>
			<section class="clientInfo slideInfo">
			  
			<?php
				// get each entry
				foreach($client_records as $client_record){
			?>
			<div class="clientEntry">
				 <form class="cli_entry" method="post"><!-- action = edit.php -->
				   <label for="cli_type">Type:</label>
						 <input type="text" id="cli_type" class="makeEdit" name="clientRecordType" value="<?php echo $client_record['type'] ?>" disabled />
				   <label for="cli_url">URL:</label>
						 <input type="text" id="cli_url" class="makeEdit" name="clientRecordUrl" value="<?php echo $client_record['url'] ?>" disabled />
				   <br />
				
				   <label for="cli_user">Username:</label>
						  <input type="text" id="cli_user" class="makeEdit" name="clientRecordUser" value="<?php echo $client_record['username'] ?>" disabled />
				   <label for="cli_pass">Password:</label>
						  <input type="text" id="cli_pass" class="makeEdit" name="clientRecordPass" value="<?php echo $client_record['password'] ?>" disabled />
				   <br />
				
				   <!-- hidden ID field to tell database what row it is -->
				   <input type="hidden" name="clientRecordId" id="cli_id" value="<?php echo $client_record['id'] ?>" />
				   <button class="icon icon-pencil editButton" type="button" value="Edit Entry"></button>
				   <button class="icon icon-close cancelButton" type="button" id="cancel" value="Cancel Edit"></button>
				   <button class="icon icon-disk saveButton" type="submit" name="edit" value="Save Changes"></button>
				</form>
				
					 
				<!-- "Delete Entry" button -->
				<form method="post"><!-- action = delete.php -->
					<input type="hidden" name="clientRecordId" id="cli_id" value="<?php echo $client_record['id'] ?>" />
					<button class="icon icon-remove deleteButton" type="submit" name="delete" value="Delete Entry"></button>
				</form>
		  </div>
		
		<?php } ?> <!-- end PHP foreach loop creating each Client Entry -->

		<div class="newEntry">
			<p class="icon icon-plus addNew slideNew"> New Entry</p>
			<div class="addNewInfo">
				<form method="post"><!-- action="insert.php"  -->
					<!-- Hidden field inputs the client_name automatically for consistency -->
					<input value="<?php echo $client_name ?>" id="cli_name" type="hidden" name="inputName">
					<label for='cli_type'>Type:</label><input id="cli_type" type="text" name="inputType">
					<label for='cli_url'>URL:</label><input id="cli_url" type="text" name="inputUrl">
					<br />
					<label for='cli_user'>Username:</label><input id="cli_user" type="text" name="inputUser">
					<label for='cli_pass'>Password:</label><input id="cli_pass" type="text" name="inputPass">
					<button id="addButton" class="icon icon-checkmark" type="submit" name="addButton" value="Add"></button>
				</form>
			</div>
		</div>
	</section>
        
	<?php } ?> <!-- end PHP foreach loop for creating each Client Name section -->
        
	</section>
		
	</main>

</body>
</html>
