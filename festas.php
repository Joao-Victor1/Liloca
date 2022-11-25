<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="normalize.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
			<a href="alteraCadastro.php"> <li> Cadastros </li> </a>
		</ul>
	</div>
</header>

<body>
	<div class="clienteTitle">
		<h2> Cadastro de Festa <h2>
	</div>
	<div class="formBox">
		<form action="http://localhost/projetoDSM/Liloca/cadFesta.php" method="POST">
			<label> ID do Pedido: </label><br>
			<input type="number" name="idPedido" required=''/><br><br>
			<label> ID do Cliente: </label><br>
			<input type="number" name="idCliente" required=''/><br><br>
			<label> Nome do Aniversariante: </label><br>
			<input type="text" name="nome_Ani" required=''/><br><br>
			<label> Idade do Aniversariante: </label><br>
			<input type="number" name="idade_Ani" required='' /><br><br>
			<label> Endereço: </label><br>
			<input type="text" name="address" required=''/><br><br>
			<label> Cores: </label><br>
			<input type="text" name="cor" required=''/><br><br>
			<label> Tema: </label><br>
			<input type="text" name="tema"  required=''/><br><br>
			<label> Data da Festa: </label><br>
			<input type="datetime-local" name="data_Festa" required=''/><br><br>
			<input type="submit" name="btn_festa" class="btn_festa" value="Enviar"/><br><br>
		</form>
	</div>
</body>

<div class="copyright">
<footer>
	<span>&copy; Liloca DB</span>
</footer>
</div>
</html>