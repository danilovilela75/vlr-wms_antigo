<?php include_once '../model/Protecao.class.php'; ?>
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

    	<form method="POST" action="../controller/valida_carregamento.php">

                        <h5 class="text-center">
                            <button class="btn btn-primary btn-xs">Processar</button>
                            &nbsp;
                            <a href="../menu.php" class="btn btn-warning btn-xs">Painel <i class="fas fa-home"></i></a>
                            &nbsp;
                            <a href="../controller/finaliza_carregamento.php" class="btn btn-danger btn-xs">Finalizar</a>
                        </h5>

    		<div class="container">

    			<div class="form-row">

    				<div class="col-md-4"><br>
    					<b>PRÉ-PEDIDO:</b>
    					<input type="text" name="prepedido" class="form-control" readonly value="<?=$_SESSION['carregamento'];?>">
    				</div>

    				<div class="col-md-4"><br>
    					<b>CÓDIGO DE BARRAS: </b>
    					<input type="text" name="codigobarras" class="form-control" required autocomplete="off">
    				</div>

                    <div class="col-md-4"><br>
                        <b>ÚLTIMO APONTAMENTO: </b>
                        <select name="ultapto" class="form-control">
                            <option value="0" selected="selected">NÃO</option>
                            <option value="1">SIM</option>
                        </select>
                    </div>

                    <div class="col-md-4"><br>
                        <b>USUÁRIO: </b>
                        <input type="text" name="usuario" class="form-control" value="<?=$_SESSION['usuario'];?>" readonly>
                    </div>
    				
    			</div>
    			
    		</div>
    	</form>

</body>
</html>