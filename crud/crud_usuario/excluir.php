<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
include('../../conecta.php');
$email = $_GET['email'];
$sql = "DELETE FROM usuario WHERE email = '$email'";
mysqli_query($conexao,$sql);
header("location: listar.php");
?>