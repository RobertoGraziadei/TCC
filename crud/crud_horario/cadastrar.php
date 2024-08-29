<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
include('../../conecta.php');

$dia = $_POST['dia'];
$sala = $_POST['sala'];
$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];
$horario_i = $_POST['horario_inicio'];
$horario_f = $_POST['horario_fim'];

$sql = "INSERT INTO horario (dia, fk_sala_n_sala, fk_disciplina_id_disciplina, fk_turma_id_turma, horario_inicio, horario_fim)
VALUES ('$dia', '$sala', '$disciplina', '$turma', '$horario_i', '$horario_f')";
mysqli_query($conexao, $sql);
/* var_dump($sql);die; */
header("location: listar.php");
?>