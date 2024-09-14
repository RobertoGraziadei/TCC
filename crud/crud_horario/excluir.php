<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
// Conectar ao BD
include('../../conecta.php');

// receber os dados do formulário
$id_horario = $_GET['id_horario'];

$sql = "DELETE FROM horario WHERE id_horario = $id_horario";

// executa o comando no BD
mysqli_query($conexao,$sql);

header("location: listar.php");
?>