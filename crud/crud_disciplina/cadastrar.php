<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
include('../../conecta.php');
$id_disciplinas = $_POST['id_disciplinas'];
$nome = $_POST['nome_disciplina'];
$professor = $_POST['professor'];


//comando sql.
$sql = "INSERT INTO disciplina (nome_disciplina, professor) VALUES ('$nome', '$professor')";
mysqli_query($conexao, $sql);
header("location: listar.php");
?>