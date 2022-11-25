<?php
//Require da página do formulário e conexão do banco:
require_once('festas.php');
require_once('dbconnect.php');

//Variáveis do formulário:
$idPedido = '';
$idCliente = '';
$nomeAniversariante = '';
$idadeAniversariante = '';
$endereco = '';
$cores = '';
$tema = '';
$dataFesta = '';

//Verificação de envio dos campos:
if(isset($_POST['idPedido'], $_POST['idCliente'], $_POST['nome_Ani'], $_POST['idade_Ani'], $_POST['address'], $_POST['cor'], $_POST['tema'], $_POST['data_Festa'])){
    $idPedido = $_POST['idPedido'];
    $idCliente = $_POST['idCliente'];
    $nomeAniversariante = $_POST['nome_Ani'];
    $idadeAniversariante = $_POST['idade_Ani'];
    $endereco = $_POST['address'];
    $cores = $_POST['cor'];
    $tema = $_POST['tema'];
    $dataFesta = $_POST['data_Festa'];
}

//INSERT:
$stmt = $conn->prepare("INSERT INTO festa(Pedido_idPedido, Cliente_idCliente, nome_aniversariante, idade_aniversariante, endereco, cores, tema, data_festa) VALUES(:PEDIDO, :CLIENTE, :NOMEANIVER, :IDADEANIVER, :ENDERECO, :COR, :TEMA, :DATAFESTA)");
$stmt->bindParam(":PEDIDO", $idPedido);
$stmt->bindParam(":CLIENTE", $idCliente);
$stmt->bindParam(":NOMEANIVER", $nomeAniversariante);
$stmt->bindParam(":IDADEANIVER", $idadeAniversariante);
$stmt->bindParam(":ENDERECO", $endereco);
$stmt->bindParam(":COR", $cores);
$stmt->bindParam(":TEMA", $tema); 
$stmt->bindParam(":DATAFESTA", $dataFesta);

//Verificação do botão:
if(isset($_POST['btn_festa'])){
    $stmt->execute();
}
?>