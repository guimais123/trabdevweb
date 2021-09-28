<?php 
session_start();
include("conexao.php");

//o real_escape_string faz verificação escapando dos caracteres especiais
//Função trim retira os espaços de inicio e fim das strings
$produto = mysqli_real_escape_string($conexao, $_POST['titulo']);

//Verificação se o usuário já existe
$sql = "select count(*) as total from test where titulo = '$produto'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($produto == ""){
    $_SESSION['badMensagem'] = "Campo nome obrigatório";
		header('Location: produtos.php');
    exit;
}

if($row['total'] == 1) {
    $_SESSION['badMensagem'] = true;
    header('Location: produtos.php');
    exit;
}

//Criação do usuário no banco
$sql = "INSERT INTO test (titulo) VALUES ('$produto')";

if($conexao->query($sql) === TRUE){
    $_SESSION['mensagem'] = true;
};

$conexao->close();

header('Location: produtos.php');
exit;
?>
