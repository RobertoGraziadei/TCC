<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$turma = $_POST['turma'];

$sql = "INSERT INTO aluno (matricula, nome, turma) VALUES ($matricula, '$nome', $turma)";
mysqli_query($conexao, $sql);
die("<script>
alert('Aluno cadastrado com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_aluno/formcad.php';
</script>");
?>