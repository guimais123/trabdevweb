<?php
//SESSÃO
session_start();
//CONEXAO
include("conexao.php");

if(isset($_POST['deletePost'])){
	$id = mysqli_escape_string($conexao, $_POST['id']);
	$sql = "DELETE FROM posts WHERE id = $id";

	if(mysqli_query($conexao, $sql)){
		$_SESSION['mensagem'] = "Post deletado com sucesso!";
		header('Location: forum.php');
    exit;
  } else {
		$_SESSION['badMensagem'] = "Erro ao deletar post!";
		header('Location: forum.php');
    exit;
  }
}


