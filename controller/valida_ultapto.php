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
		#													 #
	    #       VALIDA DADOS INFO DE ULTIMO APONTAMENTO      #
	    #         REALIZADO POR ECONSISTE E TELESET          #
	    #                   MAIO DE 2019                     #
		#													 #
	    ######################################################

		$user = $_SESSION['usuario'];
		$ambiente = $_SESSION['ambiente'];

		$codigo 	= $_POST['codigo'];
		$op 		= $_POST['op'];
		$peso		= $_POST['peso'];

		$wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP002.apw?WSDL";

		try {
			
			$WSPCP002B = new SoapClient($wsdl);

			$paramb = array(
							'PESO' => $peso,
							'ORDEMPROD' => $op
			);

			$R1 = $WSPCP002B->WSMPCP002B($paramb);

			$R2 = $R1->WSMPCP002BRESULT;

			$R3 = $R2->LISTAOP;

			$R4 = $R3->DADOSOP;

			$qtdjaentop = $R4->QTDJAENTOP;
			$qtdtotalemp = $R4->QTDTOTALEMP;
			$qtdtotalop = $R4->QTDTOTALOP;



		} catch (Soapfault $e) {
			$message = $e->getMessage();

			echo "<div class='container'><br><br>$message</div>";
			echo "<center><br><br><a href='../view/apontamento.php' class='btn btn-secondary btn-xs'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
		}

	 ?>

</body>
</html>