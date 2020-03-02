<?php include_once '../model/Protecao.class.php'; ?>
<?php 

	include_once '../model/Conexao.class.php';
	include_once '../model/Manager.class.php';
	$manager = new Manager();

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
	<h5 class="text-center"><b>GERENCIAMENTO DE USUÁRIOS</b></h5>
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
	<div class="container"><b>USUÁRIO: </b><?php echo $_SESSION['usuario']; ?></div>
	<hr>

	<div class="container">

		<h5 class="text-right">
			<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalCAD">CADASTRAR <i class="fas fa-save"></i></button>
			&nbsp;
			<a class="btn btn-secondary btn-xs" href="../index.php">VOLTAR <i class="fas fa-arrow-left"></i></a>
		</h5>

		<div class="table-responsive">

			<table class="table table-striped table-hover table-sm" id="tabela">

				<thead>
					<tr>
						<th>ID</th>
						<th>NOME</th>
						<th>USUARIO</th>
						<th>E-MAIL</th>
						<th colspan="2">AÇÕES</th>
					</tr>
				</thead>

				<?php foreach($manager->listDados("usuario","idUsuario") as $client): ?>
				<tbody>
					<tr>
						<td><?=$client['idUsuario']?></td>
						<td><?=$client['nome']?></td>
						<td><?=$client['usuario']?></td>
						<td><?=$client['email']?></td>

						<td style="padding-top: 5px; padding-left: 0px; padding-right: 0px;" width="40" height="40">
							<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVER<?=$client['idUsuario']?>"><i class="fas fa-search"></i></button>
						</td>

						<td style="padding-top: 5px; padding-left: 0px; padding-right: 0px;" width="40" height="40">
							<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEDT<?=$client['idUsuario']?>"><i class="fa fa-edit"></i></button>
						</td>

					</tr>
				</tbody>

				<!-- modal Visualizar -->
				<div class="modal fade" id="modalVER<?=$client['idUsuario']?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="largeModalLabel"><b>Visualizar Usuários</b></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="container">

									<div class="row">

										<div class="col-md-12"><br>
											<b>NOME: </b>
											<input type="text" name="nome" class="form-control" readonly value="<?=$client['nome']?>">
										</div>

										<div class="col-md-12"><br>
											<b>E-MAIL: </b>
											<input type="email" name="email" class="form-control" readonly value="<?=$client['email']?>">
										</div>

										<div class="col-md-6"><br>
											<b>USUÁRIO: </b>
											<input type="text" name="usuario" class="form-control" readonly value="<?=$client['usuario']?>">
										</div>

										<div class="col-md-6"><br>
											<b>SENHA: </b>
											<input type="text" name="senha" class="form-control" readonly value="<?=$client['senha']?>">
										</div>
										
									</div>
									
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary btn-xs" data-dismiss="modal">Fechar <i class="fas fa-times"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- end Visualizar-->

				<!-- modal Alterar -->
				<div class="modal fade" id="modalEDT<?=$client['idUsuario']?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="largeModalLabel"><b>Alterar Usuários</b></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="../controller/altuser.php">
							<div class="modal-body">
								<div class="container">

									<div class="row">

										<div class="col-md-12"><br>
											<b>NOME: </b>
											<input type="text" name="nome" class="form-control" value="<?=$client['nome']?>">
										</div>

										<div class="col-md-12"><br>
											<b>E-MAIL: </b>
											<input type="email" name="email" class="form-control" value="<?=$client['email']?>">
										</div>

										<div class="col-md-6"><br>
											<b>USUÁRIO: </b>
											<input type="text" name="usuario" class="form-control" readonly value="<?=$client['usuario']?>">
										</div>

										<div class="col-md-6"><br>
											<b>SENHA: </b>
											<input type="text" name="senha" class="form-control" readonly value="<?=$client['senha']?>">
										</div>
										
									</div>
									
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary btn-xs">Alterar <i class="fa fa-edit"></i></button>
								&nbsp;
								<button class="btn btn-secondary btn-xs" data-dismiss="modal">Fechar <i class="fas fa-times"></i></button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- end Alterar-->

				<?php endforeach; ?>
				
			</table>
			
		</div>
		
	</div>

 			<!-- modal Cadastrar -->
			<div class="modal fade" id="modalCAD" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel"><b>Cadastrar Usuários</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php include_once 'caduser.php'; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- end Cadastrar-->

			<!-- DATA TABLES -->
              <script src="vendor/datatables/jquery.dataTables.min.js"></script>
              <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#tabela').DataTable();
              } );
              </script>

			
</body>
</html>