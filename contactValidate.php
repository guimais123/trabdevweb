<?php 
session_start();
include("conexao.php");

//o real_escape_string faz verificação escapando dos caracteres especiais
//Função trim retira os espaços de inicio e fim das strings
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$msg = mysqli_real_escape_string($conexao, $_POST['msg']);

if($nome == ""){
    $_SESSION['badMensagem'] = "Campo nome obrigatório";
		header('Location: contact.php');
    exit;
  } if($email == ""){
    $_SESSION['badMensagem'] = "Campo e-mail obrigatório";
		header('Location: contact.php');
    exit;
  } if($msg == ""){
    $_SESSION['badMensagem'] = "Campo mensagem obrigatório";
		header('Location: contact.php');
    exit;
  }

$sql = "INSERT INTO contato (nome, email, mensagem) VALUES ('$nome', '$email', '$msg')";

if($conexao->query($sql) === TRUE){
    $_SESSION['mensagem'] = "Contato enviado!";
};

$conexao->close();

header('Location: contact.php');
exit;
?>
