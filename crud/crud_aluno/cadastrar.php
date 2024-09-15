<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
include('../../conecta.php');
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$turma = $_POST['turma'];

$sql = "INSERT INTO aluno (matricula, nome, turma) VALUES ($matricula, '$nome', $turma)";
mysqli_query($conexao, $sql);
/* header("location: listar.php"); */
?>