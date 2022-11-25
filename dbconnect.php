<?php
//Variáveis do banco:
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bd_liloca';  

//Conexão via PDO (PHP Data OBject):
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

?>