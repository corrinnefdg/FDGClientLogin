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
       
       
    	<!-- Temporary "get clients" button -->
    	<form action="getclients.php" method="post">
       		<input type="submit" name="getClients" value="Get Clients">
       </form>


    	<!-- Client List -->	
        <div class="clientName slideTitle">
        	<h1>Client Name</h1>
        </div>
        
        <section class="clientInfo slideInfo">
        	
        	<form action="insert.php" method="post">
            	Client Name: <input type="text" name="inputName">
            	Type: <input type="text" name="inputType">
              	URL: <input type="text" name="inputUrl">
              <br />
              	Username: <input type="text" name="inputUsername">
              	Password: <input type="text" name="inputPassword">
              <input type="submit" name="saveButton" value="Save">
            	
            	<!-- <select>
                	<option>Site URL</option>
                  <option>WordPress - Prismatic</option>
                  <option>WordPress - Client</option>
                  <option>FTP</option>
                  <option>Database</option>
					<option>CPANEL</option>
                  <option>Twitter</option>
                  <option>Joomla</option>
                  <option>Other</option>
                  
                  Social Media: Twitter, Instagram, Facebook
                  Hosting: GoDaddy, Hostaway
                  CMS: Joomla, Wordpress
                  
                  Mailchimp
                  Flickr
                  Youtube
                  
                  
              </select>-->
           </form>
        </section>
        
    </main>

</body>
</html>
