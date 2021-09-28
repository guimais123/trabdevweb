<?php
//SESSÃO
session_start();
//CONEXAO
include("conexao.php");

if(isset($_POST['editar'])){
	$nome = mysqli_escape_string($conexao, $_POST['nome']);
	$usuario = mysqli_escape_string($conexao, $_POST['usuario']);
	$senha = mysqli_escape_string($conexao, $_POST['senha']);

  if($nome == ""){
    $_SESSION['badMensagem'] = "Campo nome obrigatório";
		header('Location: users.php');
    exit;
  } if($usuario == ""){
    $_SESSION['badMensagem'] = "Campo usuário obrigatório";
		header('Location: users.php');
    exit;
  } if($senha == ""){
    $_SESSION['badMensagem'] = "Campo senha obrigatório";
		header('Location: users.php');
    exit;
  }
	$id = mysqli_escape_string($conexao, $_POST['usuario_id']);

	$sql = "UPDATE usuario SET nome = '$nome', usuario = '$usuario', senha = '$senha' WHERE usuario_id = '$id' ";

	if(mysqli_query($conexao, $sql)){
		$_SESSION['mensagem'] = "Usuário editado com sucesso!";
		header('Location: users.php');
    exit;
  } else {
		$_SESSION['badMensagem'] = "Erro ao editar usuário!";
		header('Location: users.php');
    exit;
  }
}


