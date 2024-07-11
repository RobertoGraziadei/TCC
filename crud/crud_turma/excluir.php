<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id_turma = $_GET['id_turma'];

$sql = "DELETE FROM turma WHERE id_turma = $id_turma";

// executa o comando no BD
mysqli_query($conexao,$sql);

header("location: listar.php");
?>