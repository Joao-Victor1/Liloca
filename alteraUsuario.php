<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="normalize.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg">
	<title> Liloca </title>
</head>

<header>
	<div class="title">
		<a href="index.php"> <h1> Liloca </h1> </a>
	</div>
	<div class="menu" style="margin-left: 1000px;">
		<ul>
			<a href="clientes.php"> <li> Clientes </li> </a>
			<a href="festas.php"> <li> Festas </li> </a>
			<a href="consultaTudo.php"> <li> Consulta </li> </a>
		</ul>
	</div>
</header>

<body style="background-color: #b995a1;">
	<!-- Lista de clientes cadastrados -->
    <div class="container">
        <h2> Lista de Clientes: </h2>
    
        <span id="msgAlerta"></span>

        <div class="row">
            <div class="col-lg-12">
                <span class="listarUser"></span>
            </div>
        </div>
    </div>

	<!-- Modal de edição dos clientes -->
	<div class="modal fade" id="editClienteModal" tabindex="-1" aria-labelledby="editClienteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editClienteModalLabel">Editar Cliente</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" arial-label="close"></button>
				</div>
				<div class="modal-body">
				
				<span id="msgAlertaErroEdit"></span>

				<form class="row g-3" id="edit-cliente-form">
				
					<input type="hidden" name="idCliente" id="editid">
					
					<div class="col-12">
						<label for="nome" class="form-label">CPF:</label>
						<input type="text" name="cpfCliente" class="form-control" id="editcpf">
					</div>
					<div class="col-12">
						<label for="nome" class="form-label">Nome:</label>
						<input type="text" name="nomeCliente" class="form-control" id="editnome">
					</div>
					<div class="col-12">
						<label for="nome" class="form-label">Telefone:</label>
						<input type="text" name="telCliente" class="form-control" id="edittel">
					</div>
					<div class="col-12">
						<label for="nome" class="form-label">E-mail:</label>
						<input type="text" name="emailCliente" class="form-control" id="editemail">
					</div>
					<div class="col-12">
						<input type="submit" class="btn btn-outline-success btn-sm" id="edit-cliente-btn" value="Salvar">
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>

</body>

<div class="copyright">
<footer>
	<span>&copy; Liloca DB</span>
</footer>
</div>
</html>