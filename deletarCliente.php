<?php
//Conexão do banco:
require_once("dbconnect.php");

//Receber ID do cliente:
$idCliente = filter_input(INPUT_GET, "idCliente", FILTER_SANITIZE_NUMBER_INT);

if(!empty($idCliente)){
    $queryDelete = $conn->prepare("DELETE FROM cliente WHERE idCliente = :idCliente;");
    $queryDelete->bindParam(':idCliente', $idCliente);

    if($queryDelete->execute()){

        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário deletado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não deletado!</div>"];
    }
}else{
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário econtrado!</div>"];
}


echo json_encode($retorna);
?>
