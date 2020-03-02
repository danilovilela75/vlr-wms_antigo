<?php 

	session_start(['valoremwms']);

	session_destroy();

	include_once '../view/dependencias.php';

	echo "<br><br><div class='container'><b>Logoff realizado!</b></div>";
	header("Location: ../index.php");

 ?>