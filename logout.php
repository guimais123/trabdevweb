<?php
    session_start();

    // Apaga todas as variáveis da sessão
    $_SESSION = array();

    // Destrói a sessão antes criada
    session_destroy();

    // Redireciona a pagina inicial
    header("Location: index.php");
?>