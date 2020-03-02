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
        #       VALIDA DADOS DE PRODUÇÃO OU EXCLUSÃO         #
        #         REALIZADO POR ECONSISTE E TELESET          #
        #                   MAIO DE 2019                     #
        ######################################################

        $user = $_SESSION['usuario'];
        $ambiente = $_SESSION['ambiente'];

        $codigo = $_POST['codigo'];
        $funcao = $_POST['funcao'];

        $analisa = substr($codigo, 0, 2);


        if ($analisa == "SC" or $analisa == "BG") {
            echo "<div class='container'><br><br>Código antigo, $codigo!</div>";
            echo "<center><br><br><a href='../view/apontamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            
        }

        else {
           
           $paramA = array(
                    'CODIGOBARRAS' => $codigo,
                    'EXCLUIR' => $funcao,
            );

            $wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP002.apw?WSDL";

            if ($funcao == 0) {

                    try {

                        $validaSP = new SoapClient($wsdl);

                        $verifica = $validaSP->WSMPCP002A1($paramA);

                        $_SESSION['uCod'] = $codigo;
                        $_SESSION['uFunc'] = $funcao;

                        echo "apontamento_buscar.php";

                        header("Location: ../view/apontamento_buscar.php");
                        
                    } 
                    catch (Soapfault $e) {
                        $message = $e->getMessage();

                        echo "<div class='container'><br><br>$message</div>";
                        echo "<center><br><br><a href='../view/apontamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
                    }

            } //if função endereçamento

            else {

                try {

                    $validaEX = new SoapClient($wsdl);

                    $excluit = array(
                                'CODIGOBARRAS' => $codigo,
                                'PESO' =>  "0",
                                'PERDA' => "0",
                                'CONSUMO' => "0",
                                'EXCLUIR' => "1",
                                'ULTAPTO' => "0",
                                'USUARIO' => $user
                    );

                    $result = $validaEX->WSMPCP002C($excluit);

                    echo "<div class='container'><br><br>Produção para o código: $codigo excluída!</div>";
                    echo "<center><br><br><a href='../view/apontamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
                    
                } 

                catch (Soapfault $e) {

                    $message = $e->getMessage();

                    echo "<div class='container'><br><br>$message</div>";
                    echo "<center><br><br><a href='../view/apontamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
                }
            }
        }

    ?>

</body>
</html>