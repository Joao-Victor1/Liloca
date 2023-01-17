<?php

require_once("dbconnect.php");

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){

    $qtdPedidos = 10;
    $inicio = ($pagina * $qtdPedidos) - $qtdPedidos;

    $queryPedidos = $conn->prepare("SELECT cliente.nome, telefone, email, festa.data_festa, nome_aniversariante, idade_aniversariante, tema,
    cores, data_pedido, tipo_entrega, prazo, data_entrega, endereco, produto.nome as 'produto', quantidade, valor_unit, valor,
    sinal, restante, frete, total
    FROM cliente
    INNER JOIN festa ON cliente.idCliente = festa.Cliente_idCliente
    INNER JOIN pedido ON pedido.idPedido = festa.Pedido_idPedido
    INNER JOIN itens ON pedido.idPedido = itens.Pedido_idPedido
    INNER JOIN produto ON produto.idProduto = itens.Produto_idProduto
    ORDER BY cliente.nome");

    $queryPedidos->execute();
    
    if(($queryPedidos) and ($queryPedidos->rowCount() !=0)){
        $dados = "<table  class='table table-danger table-bordered border-dark table-hover table-responsive'>";
        $dados .= "<thead>";
        $dados .= "<tr>";
        $dados .= "<th> Nome </th>";
        $dados .= "<th> Telefone </th>";
        $dados .= "<th> E-mail </th>";
        $dados .= "<th> Data_Festa </th>";
        $dados .= "<th> Aniversáriante </th>";
        $dados .= "<th> Idade_Aniversáriante </th>";
        $dados .= "<th> Tema </th>";
        $dados .= "<th> Cores </th>";
        $dados .= "<th> Data_Pedido </th>";
        $dados .= "<th> Tipo_Entrega </th>";
        $dados .= "<th> Prazo </th>";
        $dados .= "<th> Data_Entrega </th>";
        $dados .= "<th> Endereço </th>";
        $dados .= "<th> Produto </th>";
        $dados .= "<th> Quantidade </th>";
        $dados .= "<th> Valor_Unitário </th>";
        $dados .= "<th> Valor </th>";
        $dados .= "<th> Sinal </th>";
        $dados .= "<th> Restante </th>";
        $dados .= "<th> Frete </th>";
        $dados .= "<th> Total </th>";
        $dados .= "</tr>";
        $dados .= "</thead>";
        $dados .= "<tbody>";
        while($row_Pedido = $queryPedidos->fetch(PDO::FETCH_ASSOC)){
            extract($row_Pedido);
            $dados .= "<tr>";
            $dados .= "<td> $nome </td>";
            $dados .= "<td> $telefone </td>";
            $dados .= "<td> $email </td>";
            $dados .= "<td> $data_festa </td>";
            $dados .= "<td> $nome_aniversariante </td>";
            $dados .= "<td> $idade_aniversariante </td>";
            $dados .= "<td> $tema </td>";
            $dados .= "<td> $cores </td>";
            $dados .= "<td> $data_pedido </td>";
            $dados .= "<td> $tipo_entrega </td>";
            $dados .= "<td> $prazo </td>";
            $dados .= "<td> $data_entrega </td>";
            $dados .= "<td> $endereco </td>";
            $dados .= "<td> $produto </td>";
            $dados .= "<td> $quantidade </td>";
            $dados .= "<td> $valor_unit </td>";
            $dados .= "<td> $valor </td>";
            $dados .= "<td> $sinal </td>";
            $dados .= "<td> $restante </td>";
            $dados .= "<td> $frete </td>";
            $dados .= "<td> $total </td>";
            $dados .= "</tr>";
        }
        $dados .= "</tbody>";
        $dados .= "</table>";

        //Paginação:
        $queryPg = $conn->prepare("SELECT count(cliente.nome) as numResult FROM cliente");
        $queryPg->execute();
        $rowPg = $queryPg->fetch(PDO::FETCH_ASSOC);

        $qtdPagina = ceil($rowPg['numResult'] / $qtdPedidos);

        $maxLink = 2;

        $dados .= "<nav aria-label='Page navigation example'>";
        $dados .= "<ul class='pagination pagination-sm justify-content-center' style='margin-left: 91%;'>";

        $dados .= "<li class='page-item'><a class='page-link '  style='background-color: #602234; border-color: black;' href='#' onclick='listaPedidos(1)'>Primeira</a></li>";

        for($pagAnt = $pagina - $maxLink; $pagAnt <= $pagina - 1; $pagAnt++){
            if($pagAnt >= 1){
                $dados .= "<li class='page-item'><a class='page-link' style='background-color: #602234; border-color: black;' 'href='#' onclick='listaPedidos($pagAnt)'>$pagAnt</a></li>";
            }
        }

        $dados .= "<li class='page-item active' aria-current='page'>";
        $dados .= "<a class='page-link' style='background-color: #602234; border-color: black;' href='#'>$pagina</a>";
        $dados .= "</li>";

        for($pagDep = $pagina + 1; $pagDep <= $pagina + $maxLink; $pagDep++){
            if($pagDep <= $qtdPagina){
                $dados .= "<li class='page-item'><a class='page-link' style='background-color: #602234; border-color: black;' 'href='#' onclick='listaPedidos($pagDep)'>$pagDep</a></li>";
            }
        }

        $dados .= "<li class='page-item'><a class='page-link' style='background-color: #602234; border-color: black;' href='#' onclick='listaPedidos($qtdPagina)'>Última</a></li>";

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