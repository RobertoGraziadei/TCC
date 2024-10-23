<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
// Conectar ao BD
include('../../conecta.php');

// receber os dados do formulário
$id_horario = $_GET['id_horario'];

$sql = "DELETE FROM horario WHERE id_horario = $id_horario";
mysqli_query($conexao,$sql);
die("<script>
alert('Horário excluído com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/login/redire.php';
</script>");