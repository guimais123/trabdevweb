<?php 
session_start();
include("conexao.php");

//o real_escape_string faz verificação escapando dos caracteres especiais
//Função trim retira os espaços de inicio e fim das strings
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//Verificação se o usuário já existe
$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($nome == ""){
    $_SESSION['badMensagem'] = "Campo nome obrigatório";
		header('Location: cadastro_usuario.php');
    exit;
  } if($usuario == ""){
    $_SESSION['badMensagem'] = "Campo usuário obrigatório";
		header('Location: cadastro_usuario.php');
    exit;
  } if($senha == ""){
    $_SESSION['badMensagem'] = "Campo senha obrigatório";
		header('Location: cadastro_usuario.php');
    exit;
  }

if($row['total'] == 1) {
    $_SESSION['badMensagem'] = true;
    header('Location: cadastro_usuario.php');
    exit;
}

//Criação do usuário no banco
$sql = "INSERT INTO usuario (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senha')";

if($conexao->query($sql) === TRUE){
    $_SESSION['mensagem'] = true;
};

$conexao->close();

header('Location: cadastro_usuario.php');
exit;
?>
