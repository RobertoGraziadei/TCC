<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$n_sala = $_GET['n_sala'];

$sql = "DELETE FROM sala WHERE n_sala = $n_sala";

// executa o comando no BD
mysqli_query($conexao,$sql);

header("location: listar.php");
?>