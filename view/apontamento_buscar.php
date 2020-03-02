<?php include_once '../model/Protecao.class.php'; ?>
<head>
    <?php include_once 'dependencias.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<?php  

    include_once '../controller/valida_dadosapto.php';

    if (empty($_POST['ultapto'])) {
        $ultapto = "NULL";
    }
    else {
        $ultapto = $_POST['ultapto'];
    }
    
?>

<hr>
<h5 class="text-center"><img src="../img/logovlrico.png" width="40" height="42"></h5>
<h5 class="text-center"><b>DADOS PARA APONTAMENTO</b></h5>
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

    <div class="container">

        <h5 class="text-center">
            <div class="col-md-12"><br>
                <button class="btn btn-primary btn-xs" id="btnapt" data-toggle="modal" data-target="#modalPSN">APONTAR</button>
                &nbsp;
                <a class="btn btn-secondary btn-xs" href="../view/apontamento.php">VOLTAR <i class="fas fa-arrow-left"></i></a>
                &nbsp;
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalPS">Ult APTO</button>
            </div>
        </h5>

       <!--<h5 class="text-right">
            <b>Último Apontamento </b>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <div class="onoff"> 
            <input type="checkbox" class="toggle" id="onoff1" data-toggle="modal" data-target="#modalPS">
            <label for="onoff1"></label>
            </div>
        </h5>-->


        <div class="row">

            <div class="col-md-6"><br>
                <b>CÓDIGO DE BARRAS:</b><br>
                <input type="text" name="codigo" class="form-control" value="<?=$codigo;?>" autocomplete="off">
            </div>

            <div class="col-md-6"><br>
                <b>OP:</b><br>
                <input type="text" readonly name="op" value="<?=$op;?>" class="form-control" autocomplete="off">
            </div>

        </div>
    </div>


    <div class="container">
        <div class="row">
            
            <div class="col-md-6"><br>
                <b>PROCESSO: </b>
                <input type="text" name="processo" class="form-control" value="<?=$processo;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>LOTE: </b>
                <input type="text" name="lote" class="form-control" value="<?=$lote;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>CONTRATO: </b>
                <input type="text" name="contrato" class="form-control" value="<?=$contrato;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>SAFRA: </b>
                <input type="text" name="safra" class="form-control" value="<?=$safra;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>CLIENTE: </b>
                <input type="text" name="client" class="form-control" value="<?=$cliente;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>PRODUTO: </b>
                <input type="text" name="produto" class="form-control" value="<?=$produto;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>CAMPO: </b>
                <input type="text" name="campo" class="form-control" value="<?=$campo;?>" readonly>
            </div>

            <div class="col-md-6"><br>
                <b>SEQUENCIA: </b>
                <input type="text" name="sequencia" class="form-control" value="<?=$sequencia;?>" readonly>
            </div>

            <div class="col-md-12">
                &nbsp;
            </div>

        </div>
    </div>

<!-- modal Peso -->
<div class="modal fade" id="modalPS" tabindex="-1" role="dialog" aria-labelledby="Apontamento WMS" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Apontamento WMS"><b>Último Apontamento WMS</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="ultapto.php">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12"><br>
                            <b>CODIGO:</b>
                            <input type="text" name="codigo" class="form-control" value="<?=$codigo;?>" readonly>
                        </div>

                        <div class="col-md-12"><br>
                            <b>OP:</b>
                            <input type="text" name="op" class="form-control" value="<?=$op;?>" readonly>
                        </div>

                        <div class="col-md-12"><br>
                            <b>Peso:</b>
                            <input type="text" name="peso" class="form-control" required autocomplete="off">
                        </div>

                        <div class="col-md-6"><br>
                            <button class="btn btn-primary btn-sm">APONTAR</button>
                            &nbsp;
                            <button class="btn btn-secondary btn-sm" data-dismiss="modal">FECHAR</button>
                        </div>

                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- modal Peso final -->

<!-- modal Peso -->
<div class="modal fade" id="modalPSN" tabindex="-1" role="dialog" aria-labelledby="Apontamento WMS" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Apontamento WMS"><b>Apontamento WMS</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="../controller/valida_apontamentosq.php">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12"><br>
                            <b>CODIGO:</b>
                            <input type="text" name="codigo" class="form-control" value="<?=$codigo;?>" readonly>
                        </div>

                        <div class="col-md-12"><br>
                            <b>OP:</b>
                            <input type="text" name="op" class="form-control" value="<?=$op;?>" readonly>
                        </div>

                        <div class="col-md-12"><br>
                            <b>Peso:</b>
                            <input type="text" name="peso" class="form-control" required>
                        </div>

                        <div class="col-md-6"><br>
                            <button class="btn btn-primary btn-sm">APONTAR</button>
                            &nbsp;
                            <button class="btn btn-secondary btn-sm" data-dismiss="modal">FECHAR</button>
                        </div>

                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- modal Peso final -->