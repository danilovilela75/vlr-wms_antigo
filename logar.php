<?php 
	session_start(["valoremwms"]);

	include_once 'model/Conexao.class.php';
	include_once 'model/Manager.class.php';
	include_once 'view/dependencias.php';
	$manager = new Manager();

	$usuario	=	$_POST['usuario'];
	$senha		=	$_POST['senha'];
	$ambiente	=	$_POST['ambiente'];
	$valida		=	"WMSok";

	foreach($manager->validaLogin("usuario", $usuario) as $client) {

		$chkuser = $client['usuario'];
		$chksenha = $client['senha'];
		$chktipo = $client['tipo'];

		if ($usuario != $chkuser) {
			echo "<br><br><div class='container'><b>Usuário não existe!</b></div>";
			echo "<center><br><br><a class='btn btn-secondary btn-xs' href='index.php'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
		}

		else {

			if ($senha != $chksenha) {
				echo "<br><br><div class='container'><b>Senha incorreta!</b></div>";
				echo "<center><br><br><a class='btn btn-secondary btn-xs' href='index.php'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
			}

			else {

				$_SESSION['usuario']	=	$usuario;
				$_SESSION['senha']		=	$senha;
				$_SESSION['ambiente']	=	$ambiente;
				$_SESSION['valida']		= 	$valida;
				$_SESSION['tipo']		=	$chktipo;

				header("Location: menu.php");

			}

		}

	}


 ?>