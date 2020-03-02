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
        <h5 class="text-center">PROCESSO DE ENDEREÇAMENTO</h5>
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
        <form method="POST" action="../controller/valida_enderecamento.php">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h5 class="text-center">
                            <button class="btn btn-primary btn-xs">ENDEREÇAR</button>
                            &nbsp;
                            <a class="btn btn-warning btn-xs" href="../index.php">PAINEL <i class="fas fa-home"></i></a>
                        </h5>
                    </div>
                    
                    <div class="col-md-4"><br>
                        <b>CODIGO DE BARRA:</b><br>
                        <input type="text" name="codigo" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-4"><br>
                        <b>ENDEREÇAMENTO</b><br>
                        <input type="text" name="endereco" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-2"><br>
                    	<b>ESTORNAR: </b><br>
                        <select name="st" class="form-control">
                        	<option value="1">Sim</option>
                        	<option selected="selected" value="0">Não</option>
                        </select>
                    </div>

                    <div class="col-md-4"><br>
                        <b>USUÁRIO: </b>
                        <input type="text" name="usuario" class="form-control" readonly value="<?php echo $_SESSION['usuario']; ?>">
                    </div>

                </div>
            </div>
        </form>
    </body>
    </html>