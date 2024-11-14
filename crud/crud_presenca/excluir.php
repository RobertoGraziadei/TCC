<?php
session_start();
/* if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
} */
include('../../conecta.php');
$id_presenca = $_GET['id_presenca'];
$sql = "DELETE FROM presenca WHERE id_presenca = $id_presenca";
mysqli_query($conexao, $sql);

header('Location: listar.php?id_disciplinas=' . $id_disciplina . '&id_turma=' . $id_turma . '&hr_batida=' . $hr_batida);
