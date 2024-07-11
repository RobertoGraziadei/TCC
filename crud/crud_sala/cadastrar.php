<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}

//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$n_sala = $_POST['n_sala'];
$descricao = $_POST['descricao'];


//comando sql.
$sql = "INSERT INTO sala (n_sala, descricao) VALUES ($n_sala, '$descricao')";

header("location: listar.php");
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>