<?php
//Require da página do formulário e conexão do banco:
require_once('clientes.php');
require_once('dbconnect.php');

//Variáveis do formulário:
$cpf = '';
$nome = '';
$email = '';
$telefone = '';

//Verificação de envio dos campos:
if(isset($_POST['CPF'],$_POST['nome'],$_POST['email'],$_POST['tel'])){
    $cpf = $_POST['CPF'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['tel'];
}


//INSERT:
$stmt = $conn->prepare("INSERT INTO cliente(cpf, nome, email, telefone) VALUES (:CPF, :NOME, :EMAIL, :TELEFONE)");
$stmt->bindParam(":CPF", $cpf);
$stmt->bindParam(":NOME", $nome);
$stmt->bindParam(":EMAIL", $email);
$stmt->bindParam(":TELEFONE", $telefone);


//Verificação do botão:
if(isset($_POST['btn_cliente'])){
    $stmt->execute();
}
?>