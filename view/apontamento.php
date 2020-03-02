<?php include_once '../model/Protecao.class.php'; ?>
<?php $_SESSION['uCod'] = ""; $_SESSION['uFunc'] = ""; ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'dependencias.php'; ?>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

	<hr>
	<h5 class="text-center"><img src="../img/logovlrico.png" width="40" height="42"></h5>
	<h5 class="text-center"><b>PROCESSO DE APONTAMENTO</b></h5>
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

	<form method="POST" action="../controller/valida_dados.php">
		<div class="container">

			<div class="row">

				<div class="col-md-12">
					<h5 class="text-center">
						<button class="btn btn-primary btn-xs">BUSCAR <i class="fas fa-search"></i></button>
						&nbsp;
						<a class="btn btn-warning btn-xs" href="../index.php">PAINEL <i class="fas fa-home"></i></i></a>
					</h5>
				</div>

				<div class="col-md-6"><br>
					<b>CODIGO DE BARRAS: </b><br>
					<input type="text" name="codigo" class="form-control" onsubmit="false" autocomplete="off">
				</div>

				<div class="col-md-3"><br>
					<b>Processo:</b>
					<select class="form-control" name="funcao">
						<option value="1">EXCLUSÃO</option>
						<option value="0" selected="selected">INCLUSÃO</option>
					</select>
				</div>

				<div class="col-md-6"><br>
					<b>USUÁRIO: </b>
					<input type="text" name="usuario" class="form-control" value="<?php echo $_SESSION['usuario']; ?>" readonly>
				</div>

				
			</div>
			
		</div>
	</form>

</body>
</html>