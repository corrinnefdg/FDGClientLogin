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

<script src="assets/js/functions.js"></script>

</head>

<body>

	<!-- header -->
    <header class="header">
    	<h1><img src="assets/images/prismatic.png" alt="Prismatic" /></h1>
       
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
				<label for='cli_user'>Username:</label><input id="cli_user" type="text" name="inputUsername">
				<label for='cli_pass'>Password:</label><input id="cli_pass" type="text" name="inputPassword">
				<button type="submit" name="saveButton" value="Save">Save</button>
			</form>
	   </section>
           
       
       
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
			 <form class="cli_entry" action="edit.php" method="post">
			   <label for="cli_type">Type:</label>
					 <input type="text" id="cli_type" class="makeEdit" name="clientRecordType" value="<?php echo $client_record['type'] ?>" disabled />
			   <label for="cli_url">URL:</label>
					 <input type="text" id="cli_url" class="makeEdit" name="clientRecordUrl" value="<?php echo $client_record['url'] ?>" disabled  />
			   <br />

			   <label for="cli_user">Username:</label>
					  <input type="text" id="cli_user" class="makeEdit" name="clientRecordUsername" value="<?php echo $client_record['username'] ?>" disabled />
			   <label for="cli_pass">Password:</label>
					  <input type="text" id="cli_pass" class="makeEdit" name="clientRecordPassword" value="<?php echo $client_record['password'] ?>" disabled />
			   <br />

			   <!-- hidden ID field to tell database what row it is -->
			   <input type="hidden" name="clientRecordId" value="<?php echo $client_record['id'] ?>" />
			   <input id="edit" class="editButton" type="button" value="Edit Entry" />
			   <input id="cancel" class="cancelButton" type="button" value="Cancel Edit" />
			   <input type="submit" name="edit" value="Save Changes" />
			</form>

				 
			<!-- "Delete Entry" button -->
			<form action="delete.php" method="post">
				<input type="hidden" name="clientRecordId" value="<?php echo $client_record['id'] ?>" />
				<input type="submit" name="delete" value="Delete Entry" />
			</form>
		  </div>
		
		<?php } ?> <!-- end PHP foreach loop creating each Client Entry -->

		<p class="addNew slideNew">Add New Entry</p>
			<div class="addNewInfo">
				<form action="insert.php" method="post">
					<!-- Hidden field inputs the client_name automatically for consistency -->
					<input type="hidden" name="inputName" value="<?php echo $client_name ?>">
					<label for='cli_type'>Type:</label><input id="cli_type" type="text" name="inputType">
					<label for='cli_url'>URL:</label><input id="cli_url" type="text" name="inputUrl">
					<label for='cli_user'>Username:</label><input id="cli_user" type="text" name="inputUsername">
					<label for='cli_pass'>Password:</label><input id="cli_pass" type="text" name="inputPassword">
					<input type="submit" name="saveButton" value="Save">
				</form>
			</div>
	</section>
        
      <?php } ?> <!-- end PHP foreach loop for creating each Client Name section -->
        
    </main>

</body>
</html>
