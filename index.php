<?php 
	session_start(['valoremwms']);

	if (isset($_SESSION['usuario'])) {
		echo "<script>window.location = 'menu.php';</script>";
	}
	else {
		echo "<script>window.location = 'login.php';</script>";
	}
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Valorem WMS</title>
 	<link rel="stylesheet" type="text/css" href="./css/main.css">
 </head>
 <body>
 
 </body>
 </html>