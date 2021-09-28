<?php
//SESSÃO
session_start();
//CONEXAO
include("conexao.php");

if(isset($_POST['delete'])){
	$id = mysqli_escape_string($conexao, $_POST['usuario_id']);

	$sql = "DELETE FROM usuario WHERE usuario_id = 	$id";

	if(mysqli_query($conexao, $sql)){
		$_SESSION['mensagem'] = "Usuário deletado com sucesso!";
		header('Location: users.php');
    exit;
  } else {
		$_SESSION['badMensagem'] = "Erro ao deletar usuário!";
		header('Location: users.php');
    exit;
  }
}


