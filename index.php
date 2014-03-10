<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Prismatic - Client Login</title>

<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="assets/js/jquery.js"></script>

</head>

<body>


	<?php
	
		/* error reporting on */
		error_reporting(E_ALL);
	
	?>

	<!-- header -->
	<header class="header">
    	<h1>Prismatic</h1>
       <h2>Client Login</h2>
       
       <form id="searchBox" action="#">
          Search:<input type="search" name="search">
          <input type="submit">
       </form>
    </header>
    
    
    <main>
    	
        <div class="clientName">
        	<h1>Client Name</h1>
        </div>
        
        <section class="clientInfo">
        	
        	<form action="#">
            	Type: <input type="text" name="inputType">
              	URL: <input type="url" name="inputUrl"><br />
              	Username: <input type="text" name="inputUsername">
              	Password: <input type="text" name="inputPassword">
            	
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
