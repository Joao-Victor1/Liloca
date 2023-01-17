//Lista de clientes:
const listarUser = async (pagina) => {
    const dados = await fetch("./listarUsuarios.php?pagina=" + pagina);
    const resposta = await dados.json();
    console.log(resposta);

    if(!resposta['status']){
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }else{
        const content = document.querySelector(".listarUser");
        if(content){
            document.querySelector(".listarUser").innerHTML = resposta['dados'];
        }
    }
}
listarUser(1);

//Editar cadastro de cliente:
async function editUser(idCliente){
    document.getElementById("msgAlertaErroEdit").innerHTML = "";

    const dados = await fetch('visCliente.php?idCliente=' + idCliente);
    const resposta = await dados.json();
    console.log(resposta);
    
    if(!resposta['status']){
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }else{
        const editModal = new bootstrap.Modal(document.getElementById("editClienteModal"));
        editModal.show();
        document.getElementById("editid").value = resposta['dados'].idCliente;
        document.getElementById("editcpf").value = resposta['dados'].cpf;
        document.getElementById("editnome").value = resposta['dados'].nome;
        document.getElementById("edittel").value = resposta['dados'].telefone;
        document.getElementById("editemail").value = resposta['dados'].email;

    }
}

const editForm = document .getElementById("edit-cliente-form");
if(editForm){
    editForm.addEventListener("submit", async (e) =>{
        e.preventDefault();

        const dadosForm = new FormData(editForm);
        document.getElementById("edit-cliente-btn").value="Salvando...";

        const dados = await fetch("editarCliente.php",{
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();
        console.log(resposta);

        if(!resposta['status']){
            document.getElementById("msgAlertaErroEdit").innerHTML = resposta['msg'];
        }else{
            document.getElementById("msgAlertaErroEdit").innerHTML = resposta['msg'];
        }
        document.getElementById("edit-cliente-btn").value="Salvar";
    });
    listarUser(1);
}

//Apagar o registro no BD:
async function deleteUser(idCliente){

    var confirmar = confirm("Tem certeza que deseja deletar o cliente selecionado?");
    if(confirmar == true){
        const dados = await fetch('deletarCliente.php?idCliente=' +idCliente);
        const resposta = await dados.json();
        console.log(resposta);

        if(!resposta['status']){
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }else{
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];

            listarUser(1);
        }
    }

    
}