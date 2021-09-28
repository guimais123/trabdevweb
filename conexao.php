<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'avii_desenvweb');

// $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar ao banco');
$conexao = new PDO('mysql:host=localhost;dbname=avii_desenvweb', USUARIO, SENHA);
?>