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
	<?php include('header.php'); ?>
    
   	<main>
    
    	<!-- Add new client -->
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
       
		<?php
			include('config.php');
			
			// Select statement
			$select = "SELECT * FROM test ORDER BY client_name";
			
			// Display
			$q_result = $con->query($select) or die('Query did not work.');
			
			// Looping through results to display each client
			while($result = mysqli_fetch_array( $q_result )){
		?>
			
        <!-- Database generated client list -->
        <div class="clientName slideTitle">
        	<h1><?php echo $result['client_name']; ?></h1>
        </div>
            <section class="clientInfo slideInfo">
            	  <div class="clientEntry">
                  	<ul>
                    		<li><?php echo $result['type']; ?></li>
                         <li><?php echo $result['url']; ?></li>
                         <li><?php echo $result['username']; ?></li>
                         <li><?php echo $result['password']; ?></li>
                     </ul>
                </div>
                
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
            
       <?php } ?> <!-- end PHP while loop -->
        
    </main>

</body>
</html>
