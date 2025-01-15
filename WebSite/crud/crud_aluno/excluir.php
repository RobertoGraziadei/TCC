<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$matricula = $_GET['matricula'];
$sql = "DELETE FROM aluno WHERE matricula = $matricula";
mysqli_query($conexao, $sql);
die("<script>
alert('Aluno excluído com sucesso!');
window.location.href = window.location.origin + '/crud/crud_aluno/formcad.php';
</script>");