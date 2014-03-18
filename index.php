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
                    <li>
                      	<?php 
								echo "<form action='delete.php' method='post'>";
									echo "<input type='hidden' name='clientRecordId' value='".$cid."' />";
									echo "<input type='submit' name='delete' value='Delete Entry' />";
							  	echo "</form>";
                          ?>
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
                            <input type="submit" name="saveButton" value="Save">
                        </form>
                    </div>
        	</section>
		<?php } ?> <!-- end PHP foreach loop creating each Client Name section -->
    	<!-- End Search -->

        
        
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
              	  <?php
                     echo "<form>";
                            echo "<input type='text' name='clientRecordType' value='".$client_record['type']."'  />";
                            echo "<input type='text' name='clientRecordUrl' value='".$client_record['url']."'  />";
                            echo "<input type='text' name='clientRecordUsername' value='".$client_record['username']."'  />";
                            echo "<input type='text' name='clientRecordPassword' value='".$client_record['password']."'  />";
								
							   
                    echo "</form>";
                 ?>
                 
                <!-- "Edit Entry" button -->
                <?php
                    // button to enable editing of the fields
                    /*echo "<form>";
                        echo "<input id='inp' type='text' disabled />";
                        echo "<input id='edit' type='button' value='Edit Entry' />";
                    echo "</form>"; */
					
                    // button to save edits
                    /*echo "<form action='edit.php' method='post'>";
                        echo "<input type='hidden' name='clientRecordId' value='".$client_record['id']."' />";
                        echo "<input type='submit' name='edit' value='Save Changes' />";
                    echo "</form>";*/
               ?>
                     
                <!-- "Delete Entry" button -->
            	  <?php 
                    echo "<form action='delete.php' method='post'>";
                        echo "<input type='hidden' name='clientRecordId' value='".$client_record['id']."' />";
                        echo "<input type='submit' name='delete' value='Delete Entry' />";
                    echo "</form>";
                ?>
			  </div>
            
       		<?php } ?> <!-- end PHP foreach loop creating each Client Entry -->

            <p class="addNew slideNew">Add New Entry</p>
                <div class="addNewInfo">
                    <form action="insert.php" method="post">
                        <?php
                        		echo "<input type='hidden' name='inputName' value='".$client_name."'>";
								// Hidden field inputs the client_name automatically for consistency
						   ?>
                        Type: <input type="text" name="inputType">
                        URL: <input type="text" name="inputUrl">
                        Username: <input type="text" name="inputUsername">
                        Password: <input type="text" name="inputPassword">
                        <input type="submit" name="saveButton" value="Save">
                    </form>
                </div>
        </section>
        
      <?php } ?> <!-- end PHP foreach loop for creating each Client Name section -->
        
    </main>

</body>
</html>
