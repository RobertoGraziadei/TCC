<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id_disciplina = $_GET['id_disciplina'];

$sql = "DELETE FROM disciplina WHERE id_disciplina = $id_disciplina";

// executa o comando no BD
mysqli_query($conexao,$sql);

header("location: listar.php");
?>