<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$n_sala = $_GET['n_sala'];
$sql = "DELETE FROM sala WHERE n_sala = $n_sala";
mysqli_query($conexao,$sql);
die("<script>
alert('Sala excluída com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/login/redire.php';
</script>");