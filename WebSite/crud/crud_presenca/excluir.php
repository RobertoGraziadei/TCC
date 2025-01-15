<?php
session_start();
/* if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
} */
include('../../conecta.php');
$id_presenca = $_GET['id_presenca'];
$id_disciplinas = $_GET['id_disciplinas'];
$id_turma = $_GET['id_turma'];
$data = $_GET['hr_batida'];

//echo $id_disciplinas.'<br>' .'<br>'. $id_presenca .'<br>'. $id_turma;die;
$sql = "DELETE FROM presenca WHERE id_presenca = $id_presenca";
//echo $sql;die;
mysqli_query($conexao, $sql);

header('Location: listar.php?id_disciplinas=' . $id_disciplinas . '&id_turma=' . $id_turma . '&hr_batida=' . $data);
