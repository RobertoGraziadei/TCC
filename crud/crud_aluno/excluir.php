<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
include('../../conecta.php');
$matricula = $_GET['matricula'];
$sql = "DELETE FROM aluno WHERE matricula = $matricula";
mysqli_query($conexao, $sql);
header("location: listar.php");
