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
        #              VALIDA DADOS DE RETIRADA              #
        #         REALIZADO POR ECONSISTE E TELESET          #
        #                  JULHO DE 2019                     #
        ######################################################

        $user = $_SESSION['usuario'];
        $ambiente = $_SESSION['ambiente'];

        $prepedido      =   $_POST['prepedido'];
        $codigobarras   =   $_POST['codigobarras'];
        $endereco       =   $_POST['endereco'];
        $usuario        =   $_POST['usuario'];

        $dados = array(
                    'PREPEDIDO'         => $prepedido,
                    'CODIGOBARRAS'      => $codigobarras,
                    'BARRASENDERECO'    => $endereco,
                    'USUARIO'           => $usuario
        );

        $wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP005.apw?WSDL";

        try {

            $soap = new SoapClient($wsdl);
            $result = $soap->WSMPCP005($dados);

            echo "<br><br><div class='container'>Retirada realizada com sucesso, $prepedido -> $codigobarras, $endereco</div>";
            echo "<center><br><br><a href='../view/carregamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            
        } 

        catch (SoapFault $e) {
            $message = $e->getMessage();

            echo "<br><br><div class='container'>$message</div>";
            echo "<center><br><br><a href='../view/retirada.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            
        }

    ?>

</body>
</html>