<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}

// Conectar ao BD
include('../../conecta.php');

$id_horario = $_GET['id_horario'];
$dia = $_POST['dia'];
$sala = $_POST['n_sala'];
$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];
$horario_i = $_POST['horario_inicial'];
$horario_f = $_POST['horario_fim'];


$sql = "UPDATE horario SET 
dia = '$dia', horario_inicio = '$horario_i', horario_fim = '$horario_f', fk_disciplina_id_disciplina = '$disciplina',
fk_turma_id_turma = '$turma', fk_sala_n_sala = '$sala' WHERE id_horario = $id_horario";
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>