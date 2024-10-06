<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_disciplinas = $_POST['id_disciplinas'];
$nome = $_POST['nome_disciplina'];
$professor = $_POST['professor'];

$sql2 = "SELECT nome_usuario FROM usuario WHERE id_usuario = $professor";
$exe2 = mysqli_query($conexao, $sql2);
$olha_nome_professor = mysqli_fetch_assoc($exe2);
$nome_professor = implode('', $olha_nome_professor);

$sql = "INSERT INTO disciplina (nome_disciplina, professor) VALUES ('$nome', '$nome_professor')";
mysqli_query($conexao, $sql);
header("location: listar.php");
?>