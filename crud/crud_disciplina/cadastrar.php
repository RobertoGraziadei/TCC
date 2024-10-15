<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_disciplinas = $_POST['id_disciplinas'];
$nome = $_POST['nome_disciplina'];

$sql = "INSERT INTO disciplina (nome_disciplina) VALUES ('$nome')";
mysqli_query($conexao, $sql);
header("location: listar.php");
?>