<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$n_sala = $_POST['n_sala'];
$descricao = $_POST['descricao'];
$sql = "INSERT INTO sala (n_sala, descricao) VALUES ($n_sala, '$descricao')";
mysqli_query($conexao, $sql);
die("<script>
alert('Sala cadastrada com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
?>