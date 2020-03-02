<?php include_once 'model/ProtecaoROOT.class.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once 'view/dependencias.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <hr>
    <h5 class="text-center"><img src="img/logovlrico.png" width="40" height="42"></h5>
    <h5 class="text-center"><b>WMS<sub>2</sub> - PROTHEUS</b></h5>
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
            <b>USUÁRIO: </b><?php echo $_SESSION['usuario']; ?>
        </div>
    <hr>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td colspan="02"></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center"><a href="view/apontamento.php"><img src="./ico/ico_apontamento.png" width="120" height="90"></a></td>
                    <td align="center"><a href="view/enderecamento.php"><img src="./ico/ico_address.png" width="120" height="90"></a></td>
                </tr>
                <tr>
                    <td align="center"><a href="view/transferencia.php"><img src="./ico/ico_transfer.png" width="120" height="90"></a></td>
                    <td align="center"><a href="view/separacao.php"><img src="./ico/ico_separacao.png" width="120" height="90"></a></td>
                </tr>
                <tr>
                    <td align="center"><a href="view/carregamento.php"><img src="./ico/ico_carregamento.png" width="120" height="90"></a></td>
                    <td align="center"><a href="view/retirada.php"><img src="./ico/ico_retirada.png" width="120" height="90"></a></td>
                </tr>
            </tbody>
        </table>
        <div class="form-row">
            <div class="col-md-12">
            <h5 class="text-center">
            
                 <?php 
                    $tipo = $_SESSION['tipo'];
                    if ($tipo == 1) {
                        echo "
                            <a class='btn btn-primary btn-sm' href='view/usuarios.php'><i class='fa fa-user'></i> USUÁRIOS</a>
                            &nbsp;
                        ";
                    }

                    else {
                        echo "&nbsp;";
                    }
                ?>

            <a class="btn btn-danger btn-sm" href="model/Sair.class.php"><i class="fas fa-sign-out-alt"></i> SAIR</a><br><br>
            </h5>
            </div>
        </div>
    </div>

</body>
</html>