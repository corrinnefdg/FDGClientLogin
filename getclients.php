<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Get Clients</title>

<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="assets/js/jquery.js"></script>

</head>

<body>

	<!-- header -->
	<?php include('header.php'); ?>

	<main>
		<?php
			
			include('config.php');
			
			echo "<h1>Client:</h1>";	
			
			// Select statement
			$select = "SELECT * FROM test ORDER BY client_name";
				echo $select; 
			
			// Display
			$q_result = $con->query($select) or die('Query did not work.');
				echo $q_result;
				
			// Seeing if there are any matches
			$anymatches = mysqli_num_rows($q_result);
				echo $anymatches;
			
			
			// Tryin' to loop through results and display
			while($result = mysqli_fetch_array( $q_result )){
				echo "<p><strong>".$result['client_name']."</strong></p>";
			}

			echo "words";
		
		?>
   </main>


</body>
</html>