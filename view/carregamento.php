<?php include_once '../model/Protecao.class.php'; ?>
<?php 
    
    if (isset($_SESSION['carregamento'])) {
        if ($_SESSION['carregamento'] != "nulo") {
            header("Location: processo_carregamento.php");
        }
    }

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'dependencias.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

	<hr>
        <h5 class="text-center"><img src="../img/logovlrico.png" width="40" height="42"></h5>
        <h5 class="text-center">PROCESSO DE CARREGAMENTO</h5>
        <?php 
        $ambiente = $_SESSION['ambiente'];
        if ($ambiente == "8079") {
            echo "
                <h5 class='text-center'><sub>PRD - Ambiente de Produção</sub></h5>
            ";
        }
        else {
            echo "
                <h5 class='text-center'><sub>HML - Ambiente de Homologação</sub></h5>
            ";
        }
     ?>
    	<hr>

    	<form method="POST" action="../controller/gravar_carregamento.php">
    		<div class="container">

    			<div class="form-row">

                    <div class="col-md-12">
                        <h5 class="text-center">
                            <button class="btn btn-primary btn-xs">GRAVAR MAPA</button>
                            &nbsp;
                            <a href="../menu.php" class="btn btn-warning btn-xs">PAINEL <i class="fas fa-home"></i></a>
                        </h5>
                    </div>

    				<div class="col-md-12"><br>
    					<b>PRÉ-PEDIDO:</b>
    					<input type="text" name="prepedido" class="form-control" required autocomplete="off">
    				</div>
    				
    			</div>
    			
    		</div>
    	</form>

</body>
</html>