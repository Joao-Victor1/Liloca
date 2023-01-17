<?php
//Conexão do banco:
require_once("dbconnect.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Validar formulário:
if(empty($dados['cpfCliente'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo cpf!</div>"];
}elseif(empty($dados['nomeCliente'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
}elseif(empty($dados['telCliente'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo telefone!</div>"];
}elseif(empty($dados['emailCliente'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
}else{
    //Atualizar dados da tabela
    $editaCliente = $conn->prepare("UPDATE cliente SET cpf=:cpf, nome=:nome, telefone=:telefone, email=:email WHERE idCliente=:idCliente;");
    $editaCliente->bindParam(":cpf", $dados['cpfCliente']);
    $editaCliente->bindParam(":nome", $dados['nomeCliente']);
    $editaCliente->bindParam(":telefone", $dados['telCliente']);
    $editaCliente->bindParam(":email", $dados['emailCliente']);
    $editaCliente->bindParam(":idCliente", $dados['idCliente']);

    //Verificar se foi editado:
    if($editaCliente->execute()){   
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Cliente editado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro:Cliente não editado!</div>"];
    }
}

echo json_encode($retorna);
?>