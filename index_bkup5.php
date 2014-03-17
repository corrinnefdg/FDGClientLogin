<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Prismatic - Client Login List</title>

<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="assets/js/jquery.js"></script>

</head>

<body>

	<!-- header -->
    <header class="header">
    	<h1><img src="assets/images/prismatic.png" alt="Prismatic" /></h1>
       
       <form id="searchBox" method="post" action="">
          Search: <input type="text" name="find">
          <input type="submit">
       </form>
    </header>
    
   	<main>
    
    <?php 
		include('config.php');
	?>
    
    <!-- SEARCH FUNCTION =============================================== -->
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
                  </ul>
               </div>
               
               <?php } ?> <!-- end PHP foreach loop -->
               
                 <p class="addNew slideNew">Add New Entry</p>
                    <div class="addNewInfo">
                        <form action="insert.php" method="post">
                            Client Name: <input type="text" name="inputName">
                            Type: <input type="text" name="inputType">
                            URL: <input type="text" name="inputUrl">
                            <br />
                            Username: <input type="text" name="inputUsername">
                            Password: <input type="text" name="inputPassword">
                            <input type="submit" name="saveButton" value="Save">
                        </form>
                    </div>
        	</section>
		<?php } ?> <!-- end PHP foreach loop -->
    	<!-- End Search -->
        
        
       <!-- DELETE ENTRY FUNCTION =============================================== -->
       <?php
	   
	   		
			
	   ?>
       
       
       <!-- EDIT ENTRY FUNCTION =============================================== -->
       <?php
	   
	   ?>
        
        
    	<!-- ADD NEW CLIENT =============================================== -->
       <div class="newClientName slideTitle">
       		<h1>Add New Client</h1>
       </div>
           <section class="newClientInfo slideInfo">
                <form action="insert.php" method="post">
                    Client Name: <input type="text" name="inputName">
                    Type: <input type="text" name="inputType">
                    URL: <input type="text" name="inputUrl">
                    <br />
                    Username: <input type="text" name="inputUsername">
                    Password: <input type="text" name="inputPassword">
                    <input type="submit" name="saveButton" value="Save">
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
				  <ul>
						<li>Type:<p><?php echo $client_record['type']; ?></p></li>
					 	<li>URL:<p><?php echo $client_record['url']; ?></p></li>
					 	<li>Username:<p><?php echo $client_record['username']; ?></p></li>
					 	<li>Password:<p><?php echo $client_record['password']; ?></p></li>
                      
                      <li><a href="">Edit Entry</a></li>
                      <li><?php  //trying to delete crap 
					  			// make a link like: 
								//echo '<a href="admin.php?action=delete&id=$id">Delete this!</a>'; 
									
								// if delete was requested AND an id is present... 
								//if(($_GET['action'] == 'delete') && isset($_GET['id'])) { 
								
									//$sql = mysql_query("DELETE FROM table WHERE id = '".$_GET['id']."'"); 
								
									//if($sql) { 
									
										//echo 'Record deleted!'; 
									
									//} 
									
								//}  
								// end trying crap
								
								//client_record['id']
								echo '<form id="form_'.$client_record['id'].'" method="post">
							  		<input type="hidden" name="'.$client_record['id'].'" value="'.$client_record['id'].'" />
							  		<input type="submit" name="delete_'.$client_record['id'].'" value="delete" />
							  		</form>';
								
									
					  			//while ($row = mysql_fetch_assoc($items)) {
									//echo '
									//<form action="" method="post">
										//<input name="delete['.$client_record['id'].']" type="checkbox">
										//<input type="submit" name="deleteButton" value="Delete">
									//</form>';
								//}
					  
								$delete = $_POST['delete_'.$client_record['id']];
				
								foreach($delete as $id => $value){
									$id = mysqli_real_escape_string($id);
									mysqli_query("DELETE FROM test WHERE id = ".$client_record['id']);
									//echo $testme;
								}
							?>Delete Entry</li>
				  </ul>
			  </div>
            
       		<?php } ?> <!-- end PHP foreach loop -->

            <p class="addNew slideNew">Add New Entry</p>
                <div class="addNewInfo">
                    <form action="insert.php" method="post">
                        Client Name: <input type="text" name="inputName">
                        Type: <input type="text" name="inputType">
                        URL: <input type="text" name="inputUrl">
                        <br />
                        Username: <input type="text" name="inputUsername">
                        Password: <input type="text" name="inputPassword">
                        <input type="submit" name="saveButton" value="Save">
                    </form>
                </div>
        </section>
      <?php } ?> <!-- end PHP foreach loop -->
        
    </main>

</body>
</html>
