<?php include_once '../model/Protecao.class.php'; ?>
<?php 

    ######################################################
    #       ROTINA PARA COLETAR DADOS DE APONTAMENTO     #
    #         REALIZADO POR ECONSISTE E TELESET          #
    #                   MAIO DE 2019                     #
    ######################################################

    $user = $_SESSION['usuario'];
    $ambiente = $_SESSION['ambiente'];

    $codigo = $_SESSION['uCod'];
    $funcao = $_SESSION['uFunc'];

	$paramA = array(
				'CODIGOBARRAS' => $codigo
	);

    $wsdl = "http://172.16.31.16:$ambiente/ws/WSPCP002.apw?WSDL";

    $client = new SoapClient($wsdl);

    $result = $client->WSMPCP002A($paramA);

    $retorna = $result->WSMPCP002ARESULT;

    $lista = $retorna->LISTACONT;

    $dados = $lista->DADOSCONT;

    $processo = $dados->PROCESSO;
    $produto = $dados->PRODUTO;
    $lote = $dados->LOTE;
    $contrato = $dados->CONTRATO;
    $cliente = $dados->CLIENTE;
    $campo = $dados->CAMPO;
    $op = $dados->OP;
    $safra = $dados->SAFRA;
    $produto = $dados->PRODUTO;
    $sequencia = $dados->SEQUENCIA;

 ?>