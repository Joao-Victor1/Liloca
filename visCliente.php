<?php

//Conexão do banco:
require_once("dbconnect.php");

//Receber o ID:
$idCliente = filter_input(INPUT_GET, 'idCliente', FILTER_SANITIZE_NUMBER_INT);

//Validação:
if(!empty($idCliente)){

    $queryUSer = $conn->prepare("SELECT idCliente, cpf, nome, telefone, email FROM cliente WHERE idCliente=:idCliente LIMIT 1;");
    $queryUSer->bindParam(':idCliente', $idCliente);
    $queryUSer->execute();

    if(($queryUSer) and ($queryUSer->rowCount() != 0)){
        $rowUSer = $queryUSer->fetch(PDO::FETCH_ASSOC);
        $retorna = ['status' => true, 'dados' => $rowUSer];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum cliente encontrado!</div>"];
    }

}else{
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum cliente encontrado!</div>"];
     
}

echo json_encode($retorna);
?>