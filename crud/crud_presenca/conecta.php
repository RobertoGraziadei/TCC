<?php
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
//conectar com o banco de dados.
$bdServidor = "localhost";
$bdUsuario = "root";
$bdSenha = "";
$bdBanco = "tcc_roberto";

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

?>