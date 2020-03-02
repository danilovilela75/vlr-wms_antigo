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
        #         VALIDA ENDEREÇAMENTO PARA PRODUÇÃO         #
        #         REALIZADO POR ECONSISTE E TELESET          #
        #                   MAIO DE 2019                     #
        ######################################################

        $user = $_SESSION['usuario'];
        $ambiente = $_SESSION['ambiente'];

        $codigo     = $_POST['codigo'];
        $endereco   = $_POST['endereco'];
        $st         = $_POST['st'];
        $usuario    = $_POST['usuario'];

        /*echo "<pre>$codigo - $endereco - $st</pre>";*/

        $wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP001.apw?WSDL";

        if ($st == "0") {
            try {
                
                $client = new SoapClient($wsdl);
                
                $dados = array(
                        'CODIGOBARRAS' => $codigo,
                        'BARRASENDERECO' => $endereco,
                        'ESTORNO' => $st,
                        'USUARIO' => $user
                );
                
                $result = $client->WSMPCP001($dados);
                
                echo "<div class='container'><br><br>$codigo - $endereco endereçados com sucesso!</div>";
                echo "<center><br><br><a href='../view/enderecamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            } 

            catch (Soapfault $e) {
                
                $message = $e->getMessage();

                echo "<div class='container'><br><br>$message</div>";
                echo "<center><br><br><a href='../view/enderecamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            }
        }

        if ($st == "1") {
            try {
                $client = new SoapClient($wsdl);
                
                $dados = array(
                        'CODIGOBARRAS' => $codigo,
                        'BARRASENDERECO' => $endereco,
                        'ESTORNO' => $st,
                        'USUARIO' => " "
                );
                
                $result = $client->WSMPCP001($dados);
                
                echo "<div class='container'><br><br>$codigo - $endereco estorno de endereçamento realizado!</div>";
                echo "<center><br><br><a href='../view/enderecamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
            } 

            catch (Soapfault $e) {
                
                $message = $e->getMessage();
                
                echo "<div class='container'><br><br>$message</div>";
                echo "<center><br><br><a href='../view/enderecamento.php' class='btn btn-secondary btn-lg'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
                
            }
        }

       
        

     ?>

</body>
</html>