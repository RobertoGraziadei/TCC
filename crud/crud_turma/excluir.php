<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_turma = $_GET['id_turma'];
$sql = "DELETE FROM turma WHERE id_turma = $id_turma";
mysqli_query($conexao, $sql);
header("location: listar.php");
?>