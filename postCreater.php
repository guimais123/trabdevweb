<?php 
session_start();
include("conexao.php");

//o real_escape_string faz verificação escapando dos caracteres especiais
//Função trim retira os espaços de inicio e fim das strings
$titulo = mysqli_real_escape_string($conexao, $_POST['title']);
$mensagem = mysqli_real_escape_string($conexao, $_POST['msg']);
$usuario = $_SESSION['usuario'];

if($titulo == ""){
    $_SESSION['badMensagem'] = "Campo título obrigatório";
		header('Location: newTopicForum.php');
    exit;
  } if($mensagem == ""){
    $_SESSION['badMensagem'] = "Campo mensagem obrigatório";
		header('Location: newTopicForum.php');
    exit;
  }

//Criação do usuário no banco
$sql = "INSERT INTO posts (titulo, mensagem, usuario) VALUES ('$titulo', '$mensagem', '$usuario')";
$test = "asdasd";
echo $test;
var_dump($test);

if($conexao->query($sql) === TRUE){
    $_SESSION['mensagem'] = "Post publicado com sucesso!";
} else {
    $_SESSION['badMensagem'] = "Post não foi publicado";
    header('Location: newTopicForum.php');
    exit;
  }

$conexao->close();

header('Location: forum.php');
exit;
?>
