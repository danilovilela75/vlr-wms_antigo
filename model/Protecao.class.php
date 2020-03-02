<?php 
	session_start(['valoremwms']);

	$verifica = "WMSok";

	$valida = $_SESSION['valida'];

	if ($verifica != $valida) {
		echo "<script>window.alert('Usuário não logado!');</script>";
		echo "<script>window.location = '../model/Sair.class.php';</script>";
		/*echo "<br><br><div class='container'><b>Usuário não logado!</b></div>";
		echo "<center><br><br><a href='../index.php'>Voltar <i class='fas fa-arrow-left'></i></a></center>";*/
	}

 ?>