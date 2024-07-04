<?php
// Inicia a sessão (se já não estiver iniciada)
session_start();

// Verifica se a variável de sessão 'email' está definida
if(isset($_SESSION['user'])){
    // Se estiver definida, destrói a sessão
    session_destroy();
}

// Redireciona para a página de login (ou outra página desejada)
header('location: index.php');
?>
