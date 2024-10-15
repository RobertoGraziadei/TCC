<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_horario = $_GET['id_horario'];
$turma = $_GET['turma'];
$dia = $_GET['dia'];
$disciplina = $_GET['disciplina'];
$professor = $_GET['professor'];
$sala = $_GET['sala'];
$horario_i = $_GET['horario_inicio'];
$horario_f = $_GET['horario_fim'];

$sql = "UPDATE horario 
          SET fk_turma_id_turma = '$turma', dia = '$dia', fk_disciplina_id_disciplina = '$disciplina',
              fk_professor = '$professor', fk_sala_n_sala = '$sala', horario_inicio = '$horario_i',  
              horario_fim = '$horario_f' 
          WHERE id_horario = '$id_horario'";
$exe = mysqli_query($conexao, $sql);
if ($conexao->error) {

    die("Falha ao editar usuário no sistema:" . $conexao->error);
} else {
    header("location: listar.php");
}
