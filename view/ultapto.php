<?php include_once '../model/Protecao.class.php'; ?>
<head>
    <?php include_once 'dependencias.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<?php 

	include_once '../controller/valida_dadosapto.php';
	include_once '../controller/valida_ultapto.php';

 ?>

 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>

<h2 class="text-center">
	<b>ÚLTIMO APONTAMENTO</b>
</h2>
<hr>

<div class="container">
	<div class="row">
		
			<div class="col-md-6"><br>
                <b>PROCESSO: </b>
                <input type="text" autocomplete="off" name="processo" class="form-control" value="<?=$processo;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>OP: </b>
                <input type="text" name="op" class="form-control" value="<?=$op;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>LOTE: </b>
                <input type="text" name="lote" class="form-control" value="<?=$lote;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>CONTRATO: </b>
                <input type="text" name="contrato" class="form-control" value="<?=$contrato;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>SAFRA: </b>
                <input type="text" name="safra" class="form-control" value="<?=$safra;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>CLIENTE: </b>
                <input type="text" name="client" class="form-control" value="<?=$cliente;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>PRODUTO: </b>
                <input type="text" name="produto" class="form-control" value="<?=$produto;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>CAMPO: </b>
                <input type="text" name="campo" class="form-control" value="<?=$campo;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>SEQUENCIA: </b>
                <input type="text" name="sequencia" class="form-control" value="<?=$sequencia;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-6"><br>
            	<b>PESO:</b>
            	<input type="text" name="peso" class="form-control" value="<?=$peso;?>" readonly autocomplete="off">
            </div>

            <div class="col-md-2"><br>
                <button class="btn btn-sm" id="ultapto" data-toggle="modal" data-target="#modalULTAPTO">&nbsp;</button>
            </div>

	</div>
</div>

<!-- modal Peso -->
<div class="modal fade" id="modalULTAPTO" tabindex="-1" role="dialog" aria-labelledby="Apontamento WMS" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Apontamento WMS"><b>Último Apontamento</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../controller/valida_apontamentoutm.php" name="form">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6"><br>
                        <b>Qtd Orig OP:</b>
                        <input type="text" name="qtdorgop" class="form-control" value="<?=$qtdtotalop;?>" readonly>
                    </div>

                    <div class="col-md-6"><br>
                        <b>Qtd Orig Emp:</b>
                        <input type="text" name="qtdorgemp" class="form-control" value="<?=$qtdtotalemp;?>" readonly>
                    </div>

                    <div class="col-md-6"><br>
                        <b>Produção Peso Total:</b>
                        <input type="text" name="pdcpstot" class="form-control" value="<?=$qtdjaentop;?>" readonly onblur="soma()">
                    </div>

                    <div class="col-md-6"><br>
                        <b>Prod Peso Lanc:</b>
                        <input type="text" name="pesolanc" class="form-control" value="<?=$peso;?>" readonly onblur="soma()">
                    </div>

                    <div class="col-md-6"><br>
                        <b>Perda:</b>
                        <input type="text" name="perda" class="form-control" value="0" ng-model="perda" required onblur="soma()">
                    </div>

                    <div class="col-md-6"><br>
                        <b>Qtd Consumo Total:</b>
                        <input type="text" name="consumototal" class="form-control" id="resultado" readonly>
                        <input type="hidden" name="codigo" value="<?=$codigo;?>">
                    </div>

                    <div class="col-md-6"><br>
                        <button class="btn btn-primary btn-xs">OK</button>
                        &nbsp;
                        <a class="btn btn-secondary btn-xs" href="apontamento.php">Cancelar</a>
                    </div>

                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal Peso final -->

            <script type="text/javascript">
                window.setTimeout(function(){
                document.getElementById("ultapto").click();
                }, 5);
            </script>

            <script type="text/javascript">
                function soma() {
                    form.consumototal.value = (form.pdcpstot.value*1) + (form.pesolanc.value*1) + (form.perda.value*1)
                }
            </script>