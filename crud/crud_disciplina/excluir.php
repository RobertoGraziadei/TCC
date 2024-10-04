<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_disciplina = $_GET['id_disciplinas'];
$sql = "DELETE FROM disciplina WHERE id_disciplinas = $id_disciplina";
mysqli_query($conexao, $sql);
header("location: listar.php");
