<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
include('../../conecta.php');
$id_turma = $_POST['id_turma'];
$nome = $_POST['nome_turma'];
$sql = "INSERT INTO turma (id_turma, nome_turma) VALUES ($id_turma, '$nome')";
mysqli_query($conexao, $sql);
header("location: listar.php");
?>