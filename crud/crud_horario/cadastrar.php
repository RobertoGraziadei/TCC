<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$dia = $_POST['dia'];
$sala = $_POST['n_sala'];
$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];
$horario_i = $_POST['horario_inicial'];
$horario_f = $_POST['horario_fim'];

//comando sql.
$sql = "INSERT INTO horario (dia, fk_sala_n_sala, fk_disciplina_id_disciplina, fk_turma_id_turma, horario_inicio, horario_fim)
VALUES ('$dia', '$sala', '$disciplina', '$turma', '$horario_i', '$horario_f')";

header("location: listar.php");
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>