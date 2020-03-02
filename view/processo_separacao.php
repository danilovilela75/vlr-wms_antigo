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
        <h5 class="text-center">PROCESSO DE SEPARAÇÃO</h5>
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

    <form method="POST" action="../controller/valida_separacao.php">

    <h5 class="text-center">
    	<button class="btn btn-primary btn-xs">Processar</button>
    	&nbsp;
    	<a href="../" class="btn btn-warning btn-xs">Painel <i class="fas fa-home"></i></a>
    	&nbsp;
    	<a href="../controller/finaliza_separacao.php" class="btn btn-danger btn-xs">Finalizar</a>
    </h5>

    

    	<div class="container">

    		<div class="form-row">

    			<div class="col-md-4"><br>
    				<b>PRÉ-PEDIDO: </b><br>
    				<input type="text" name="prepedido" class="form-control" readonly value="<?=$_SESSION['prepedido'];?>">
    			</div>

    			<div class="col-md-4"><br>
    				<b>CÓDIGO DE BARRAS: </b>
    				<input type="text" name="codigobarras" class="form-control" autocomplete="off">
    			</div>

    			<div class="col-md-4"><br>
    				<b>ENDEREÇAMENTO: </b>
    				<input type="text" name="endereco" class="form-control" autocomplete="off">
    			</div>

    			<div class="col-md-4"><br>
    				<b>ESTORNA: </b><br>
    				<select name="estorna" class="form-control">
    					<option value="0" selected="selected">NÃO</option>
    					<option value="1">SIM</option>
    				</select>
    			</div>

    			<div class="col-md-4"><br>
    				<b>ÚLTIMO APONTAMENTO: </b><br>
    				<select name="ultapto" class="form-control">
    					<option value="0" selected="selected">NÃO</option>
    					<option value="1">SIM</option>
    				</select>
    			</div>

    			<div class="col-md-4"><br>
    				<b>USUÁRIO: </b>
    				<input type="text" name="usuario" class="form-control" readonly value="<?=$_SESSION['usuario'];?>">
    			</div>
    			
    		</div>
    		
    	</div>
    	
    </form>

</body>
</html>