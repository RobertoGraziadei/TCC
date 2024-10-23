<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');

$dia = $_POST['dia'];
$sala = $_POST['sala'];
$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];
$professor = $_POST['professor'];
$horario_i = $_POST['horario_inicio'];
$horario_f = $_POST['horario_fim'];



$sql = "INSERT INTO horario (dia, fk_sala_n_sala, fk_disciplina_id_disciplina, fk_turma_id_turma, horario_inicio, horario_fim, fk_professor)
VALUES ('$dia', '$sala', '$disciplina', '$turma', '$horario_i', '$horario_f', $professor)";
mysqli_query($conexao, $sql);
/* var_dump($sql);die; */
die("<script>
alert('Horário cadastrado com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
?>