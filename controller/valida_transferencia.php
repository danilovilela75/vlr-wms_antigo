<?php include_once '../model/Protecao.class.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once '../view/dependencias.php'; ?>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

	<?php 

	    ######################################################
	    #       VALIDA TRANSFERENCIAS DE ENDEREÇAMENTOS      #
	    #         REALIZADO POR ECONSISTE E TELESET          #
	    #                   MAIO DE 2019                     #
	    ######################################################

		$user = $_SESSION['usuario'];
		$ambiente = $_SESSION['ambiente'];
		
		$codigo		=	$_POST['codigo'];
		$endereco	=	$_POST['endereco'];

		$wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP003.apw?WSDL";

		$dadostf = array(
						'CODIGOBARRAS' => $codigo,
						'BARRASENDERECO' => $endereco,
						'USUARIO' => $user
		);

		try {

			$validaTF = new SoapClient($wsdl);

			$result = $validaTF->WSMPCP003($dadostf);

			echo "<br><br><div class='container'>Transferencia realizada com sucesso, $codigo -> $endereco</div>";
			echo "<center><br><br><a href='../view/transferencia.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";

			
		} 

		catch (Soapfault $e) {
			$message = $e->getMessage();

	        echo "<br><br><div class='container'>$message</div>";
	        echo "<center><br><br><a href='../view/transferencia.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
		}

	 ?>

</body>
</html>