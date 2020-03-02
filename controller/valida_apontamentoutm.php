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
	    #     VALIDA ULTIMO APONTAMENTO PARA PESO E PERDA    #
	    #         REALIZADO POR ECONSISTE E TELESET          #
	    #                   MAIO DE 2019                     #
	    ######################################################

		$user = $_SESSION['usuario'];
		$ambiente = $_SESSION['ambiente'];

		$codigo = $_SESSION['uCod'];
		$funcao = $_SESSION['uFunc'];
		$qtdorgop = $_POST['qtdorgop'];
		$qtdorgemp = $_POST['qtdorgemp'];
		$pdcpstot = $_POST['pdcpstot'];
		$pesolanc = $_POST['pesolanc'];
		$perda = $_POST['perda'];
		$consumototal = $_POST['consumototal'];

		$wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP002.apw?WSDL";

		try {

			$apontamento = new SoapClient($wsdl);

			$valores = array(
						'CODIGOBARRAS' => $codigo,
						'PESO' => $pesolanc,
						'PERDA' => $perda,
						'CONSUMO' => $consumototal,
						'EXCLUIR' => $funcao,
						'ULTAPTO' => "1",
						'USUARIO' => $user
					);

			$resultado = $apontamento->WSMPCP002C($valores);

			echo "<br><br><div class='container'>Produção apontada com sucesso para o código: $codigo</div>";
			echo "<center><br><br><a href='../view/apontamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
			
		}

		catch (Soapfault $e) {

			$message = $e->getMessage();

			echo "<br><br><div class='container'>$message</div>";
			echo "<center><br><br><a href='../view/apontamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";

		}

	 ?>

</body>
</html>