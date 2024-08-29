<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
include('../../conecta.php');
$email = $_GET['email'];
$nome = $_GET['nome_usuario'];

$sql = "UPDATE usuario SET nome_usuario = '$nome' WHERE email = '$email'";
$executaSql = mysqli_query($conexao, $sql);
header("location: listar.php");
