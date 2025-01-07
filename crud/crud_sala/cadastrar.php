<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$n_sala = $_POST['n_sala'];
$descricao = $_POST['descricao'];

$sql1 = "SELECT * FROM sala WHERE n_sala = $n_sala";
$sql2 = "SELECT * FROM sala WHERE descricao = '$descricao'";
$executa1 = mysqli_query($conexao, $sql1);
$executa2 = mysqli_query($conexao, $sql2);

if ($verifica = mysqli_num_rows($executa1) != 0) {
    die("<script>
alert('Já existe uma sala com esse número!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_sala/formcad.php';
</script>");
}
if ($verifica = mysqli_num_rows($executa2) != 0) {
    die("<script>
alert('Já existe uma sala com essa descrição!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_sala/formcad.php';
</script>");
}

$sql = "INSERT INTO sala (n_sala, descricao) VALUES ($n_sala, '$descricao')";
mysqli_query($conexao, $sql);
die("<script>
alert('Sala cadastrada com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_sala/formcad.php';
</script>");
?>