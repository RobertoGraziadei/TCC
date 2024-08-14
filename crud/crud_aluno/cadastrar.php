<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
include('../../conecta.php');
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];

$sql = "INSERT INTO aluno (matricula, nome) VALUES ($matricula, '$nome')";
mysqli_query($conexao, $sql);
header("location: listar.php");
?>