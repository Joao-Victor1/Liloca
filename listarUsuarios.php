<?php

//conexão com o bd:
require_once('dbconnect.php');

//Receber a página:
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){

    //Calcular visualização:
    $qtdResult = 10 ; //Quantidade de registros por página;
    $inicio = ($pagina * $qtdResult) - $qtdResult;



    //SELECT:
    $queryUser = $conn->prepare("SELECT idCliente, cpf, nome, telefone, email FROM cliente ORDER BY idCliente DESC LIMIT $inicio, $qtdResult");
    $queryUser->execute();

    //Verifica se encontrou registros:

    if(($queryUser) and ($queryUser->rowCount() !=0)){
        $dados = "<table class='table table-danger table-bordered border-dark table-hover'>";
        $dados .= "<thead>";
        $dados .= "<tr>";
        $dados .= "<th> ID </th>";
        $dados .= "<th> CPF </th>";
        $dados .= "<th> Nome </th>";
        $dados .= "<th> Telefone </th>";
        $dados .= "<th> E-mail </th>";
        $dados .= "<th> Ações </th>";
        $dados .= "</tr>";
        $dados .= "</thead>";
        $dados .= "<tbody>";
        while($row_user = $queryUser->fetch(PDO::FETCH_ASSOC)){
            extract($row_user);
            $dados .= "<tr>";
            $dados .= "<td> $idCliente </td>";
            $dados .= "<td> $cpf </td>";
            $dados .= "<td> $nome </td>";
            $dados .= "<td> $telefone </td>";
            $dados .= "<td> $email </td>";
            $dados .= "<td><a href='#' class='btn btn-outline-primary btn-sm' onclick='editUser($idCliente)'>Editar</a>
            <a href='#' class='btn btn-outline-danger btn-sm' onclick='deleteUser($idCliente)'>Deletar</a>";
            $dados .= "</tr>";
        }
        $dados .= "</tbody>";
        $dados .= "</table>";

        //Paginação:
        $queryPg = $conn->prepare("SELECT count(idCLiente) as numResult FROM cliente");
        $queryPg->execute();
        $rowPg = $queryPg->fetch(PDO::FETCH_ASSOC);

        $qtdPagina = ceil($rowPg['numResult'] / $qtdResult);

        $maxLink = 2;

        $dados .= "<nav aria-label='Page navigation example'>";
        $dados .= "<ul class='pagination pagination-sm justify-content-center'>";

        $dados .= "<li class='page-item'><a class='page-link '  style='background-color: #602234; border-color: black;' href='#' onclick='listarUser(1)'>Primeira</a></li>";

        for($pagAnt = $pagina - $maxLink; $pagAnt <= $pagina - 1; $pagAnt++){
            if($pagAnt >= 1){
                $dados .= "<li class='page-item'><a class='page-link' style='background-color: #602234; border-color: black;' 'href='#' onclick='listarUser($pagAnt)'>$pagAnt</a></li>";
            }
        }

        $dados .= "<li class='page-item active' aria-current='page'>";
        $dados .= "<a class='page-link' style='background-color: #602234; border-color: black;' href='#'>$pagina</a>";
        $dados .= "</li>";

        for($pagDep = $pagina + 1; $pagDep <= $pagina + $maxLink; $pagDep++){
            if($pagDep <= $qtdPagina){
                $dados .= "<li class='page-item'><a class='page-link' style='background-color: #602234; border-color: black;' 'href='#' onclick='listarUser($pagDep)'>$pagDep</a></li>";
            }
        }

        $dados .= "<li class='page-item'><a class='page-link' style='background-color: #602234; border-color: black;' href='#' onclick='listarUser($qtdPagina)'>Última</a></li>";

        $dados .= "</ul>";
        $dados .= "</nav>";

        $retorna = ['status' => true, 'dados' => $dados, 'inicio ' => $inicio];

    }else{
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'> Erro: Nenhum usuário encontrado! </p>"];
        
    }
}else{
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'> Erro: Sem página! </p>"];
}
echo json_encode($retorna);



?>