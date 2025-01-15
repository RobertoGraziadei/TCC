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

$sql1 = "SELECT * FROM aluno WHERE matricula = '$matricula'";
$sql2 = "SELECT * FROM aluno WHERE nome = '$nome'";
$executa1 = mysqli_query($conexao, $sql1);
$executa2 = mysqli_query($conexao, $sql2);
//echo $sql1;die;
if ($verifica = mysqli_num_rows($executa1) != 0) {
  die("<script>
alert('Já existe um aluno com essa matrícula!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_aluno/formcad.php';
</script>");
}
if ($verifica = mysqli_num_rows($executa2) != 0) {
  die("<script>
alert('Já existe um aluno com esse nome!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_aluno/formcad.php';
</script>");
}

$sql = "INSERT INTO aluno (matricula, nome, turma) VALUES ($matricula, '$nome', $turma)";
mysqli_query($conexao, $sql);
die("<script>
alert('Aluno cadastrado com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_aluno/formcad.php';
</script>");
?>