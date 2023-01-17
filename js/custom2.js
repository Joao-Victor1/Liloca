const listaPedidos =  async (pagina) =>{
    const dados = await fetch("./listarPedidos.php?pagina=" + pagina);
    const resposta = await dados.json();
    console.log(resposta);

    if(!resposta['status']){
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }else{
        const content = document.querySelector(".listaPedido");
        if(content){
            document.querySelector(".listaPedido").innerHTML = resposta['dados'];
        }
    }
}
listaPedidos(1);