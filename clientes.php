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
		<h2> Cadastro de Cliente <h2>
	</div>
	<div class="formBox">
		<form action="http://localhost/projetoDSM/Liloca/cadCliente.php" method="POST">
			<label> CPF: </label><br>
			<input type="text" name="CPF" required=""/><br><br>
			<label> Nome: </label><br>
			<input type="text" name="nome" required=""/><br><br>
			<label> E-mail: </label><br>
			<input type="email" name="email" required=""/><br><br>
			<label> Telefone: </label><br>
			<input type="tel" name="tel" required=""/><br><br>
			<input type="submit" id="btn_cliente" class="btn_cliente" name="btn_cliente" value="Enviar"/>
		</form>
	</div>
</body>

<div class="copyright">
<footer>
	<span>&copy; Liloca DB</span>
</footer>
</div>
</html>