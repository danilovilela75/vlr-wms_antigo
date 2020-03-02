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
    #            VALIDA DADOS DE CARREGAMENTO            #
    #         REALIZADO POR ECONSISTE E TELESET          #
    #                  JULHO DE 2019                     #
    ######################################################

    $user = $_SESSION['usuario'];
    $ambiente = $_SESSION['ambiente'];

    $prepedido      =   $_POST['prepedido'];
    $codigobarras   =   $_POST['codigobarras'];
    $usuario        =   $_POST['usuario'];
    $ultapto        =   $_POST['ultapto'];

    $wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP004.apw?WSDL";

    $dados = array(
                'PREPEDIDO'         => $prepedido,
                'CODIGOBARRAS'      => $codigobarras,
                'BARRASENDERECO'    => "",
                'ESTORNO'           => "0",
                'CARREGA'           => "1",
                'USUARIO'           => $usuario,
                'ULTAPTO'           => $ultapto
    );

    try {

        $soap = new SoapClient($wsdl);
        $result = $soap->WSMPCP004($dados);

        echo "<br><br><div class='container'>Separação realizada com sucesso, $prepedido -> $codigobarras</div>";
        echo "<center><br><br><a href='../view/carregamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
        
    } 

    catch (SoapFault $e) {
        
        $message = $e->getMessage();

        echo "<br><br><div class='container'>$message</div>";
        echo "<center><br><br><a href='../view/carregamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
        
    }

?>

</body>
</html>