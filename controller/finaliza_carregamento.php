<?php 
	include_once '../model/Protecao.class.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php include_once '../view/dependencias.php'; ?>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>

 	<?php 

		$prepedido	=	"nulo";

		$_SESSION['carregamento'] = $prepedido;

		try {
			echo "<br><br><div><b>MAPA Gravado!</b></div>";
			header("Location: ../view/carregamento.php");
		} 

		catch (Exception $e) {
			$message = $e->getMessage();
			echo "<br><br><div class='container'>$message</div>";
	        echo "<center><br><br><a href='../view/carregamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
		}

	 ?>
 
 </body>
 </html>