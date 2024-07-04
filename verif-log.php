<?php
session_start();

if (!isset($_SESSION['user'])) {
    die("Você precisa estar logado para acessar esta página" . '<p><a href="index.php">Voltar</a></p>');exit();
}
?>