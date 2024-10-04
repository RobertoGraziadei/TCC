<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_horario = $_GET['id_horario'];
$dia = $_GET['dia'];
$sala = $_GET['n_sala'];
$turma = $_GET['turma'];
$disciplina = $_GET['disciplina'];
$horario_i = $_GET['horario_inicio'];
$horario_f = $_GET['horario_fim'];

$sql = "UPDATE horario SET 
dia = '$dia', horario_inicio = '$horario_i', horario_fim = '$horario_f', fk_disciplina_id_disciplina = '$disciplina',
fk_turma_id_turma = '$turma', fk_sala_n_sala = '$sala' WHERE id_horario = $id_horario";
/* var_dump($sql);die; */
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
?>