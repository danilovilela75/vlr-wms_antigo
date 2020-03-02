<?php 
	
	include_once '../model/Conexao.class.php';
	include_once '../model/Manager.class.php';
	include_once '../view/dependencias.php';
	$manager = new Manager();

	$pegaid = $_POST['idUsuario'];
	$data = $_POST;

	$table = "usuario";
	$campo = "idUsuario";

	if (isset($pegaid) && !empty($pegaid)) {
		$manager->AltDados($table, $data. $campo, $pegaid);
		header("Location: ../view/usuarios.php");
	}
	else {
		echo "<script>alert('Erro no código!')</script>";
		echo "<script>window.location = '../view/usuarios.php'</script>";
	}

 ?>