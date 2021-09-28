<?php
session_start();
//conexão com banco
include('conexao.php');

//Verificação de usuario e senha
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query ="select nome from usuario where usuario = '{$usuario}' and senha = '{$senha}'";
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
if($row == 1){
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['usuario'] = $usuario_bd['nome'];
    header('Location: index.php');
    exit;
} else {
    $_SESSION['useroff'] = "Usuário ou senha incorretos ou Usuário inexistente";
    header('Location: login.php');
}
?>