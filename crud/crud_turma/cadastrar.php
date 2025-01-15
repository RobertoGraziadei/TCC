<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$id_turma = $_POST['id_turma'];
$nome = $_POST['nome_turma'];
$sql1 = "SELECT * FROM turma WHERE id_turma = $id_turma";
$sql2 = "SELECT * FROM turma WHERE nome_turma = '$nome'";
$executa1 = mysqli_query($conexao, $sql1);
$executa2 = mysqli_query($conexao, $sql2);

if ($verifica = mysqli_num_rows($executa1) != 0) {
    die("<script>
alert('Já existe uma turma com esse número!');
window.location.href = window.location.origin + '/crud/crud_turma/formcad.php';
</script>");
}
if ($verifica = mysqli_num_rows($executa2) != 0) {
    die("<script>
alert('Já existe uma turma com esse nome!');
window.location.href = window.location.origin + '/crud/crud_turma/formcad.php';
</script>");
}
$sql = "INSERT INTO turma (id_turma, nome_turma) VALUES ($id_turma, '$nome')";
mysqli_query($conexao, $sql);
die("<script>
alert('Turma cadastrada com sucesso!');
window.location.href = window.location.origin + '/crud/crud_turma/formcad.php';
</script>");
