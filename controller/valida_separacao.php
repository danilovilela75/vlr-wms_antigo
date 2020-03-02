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
        #       VALIDA DADOS DE SEPARAÇÃO E ESTORNO          #
        #         REALIZADO POR ECONSISTE E TELESET          #
        #                  JULHO DE 2019                     #
        ######################################################

        $user = $_SESSION['usuario'];
        $ambiente = $_SESSION['ambiente'];

        $prepedido      =   $_POST['prepedido'];
        $codigobarras   =   $_POST['codigobarras'];
        $endereco       =   $_POST['endereco'];
        $usuario        =   $_POST['usuario'];
        $estorna        =   $_POST['estorna'];
        $ultapto        =   $_POST['ultapto'];

        $wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP004.apw?WSDL";

        $dados = array(
                    'PREPEDIDO'         => $prepedido,
                    'CODIGOBARRAS'      => $codigobarras,
                    'BARRASENDERECO'    => $endereco,
                    'ESTORNO'           => $estorna,
                    'CARREGA'           => "0",
                    'USUARIO'           => $usuario,
                    'ULTAPTO'           => $ultapto
        );

        try {

            $soap = new SoapClient($wsdl);

            $exec = $soap->WSMPCP004($dados);

            echo "<br><br><div class='container'>Separação realizada com sucesso, $prepedido -> $codigobarras, $endereco</div>";
            echo "<center><br><br><a href='../view/separacao.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            
        } 

        catch (SoapFault $e) {
            $message = $e->getMessage();

            echo "<br><br><div class='container'>$message</div>";
            echo "<center><br><br><a href='../view/separacao.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            
        }

    ?>

</body>
</html>