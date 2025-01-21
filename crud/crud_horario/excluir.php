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

$sql2 = "SELECT * FROM presenca
WHERE presenca.fk_horario_id_horario = $id_horario";
$executa2 = mysqli_query($conexao, $sql2);
if (mysqli_num_rows($executa2) != 0) {
    die("<script>
alert('Não é possível excluir este horário, pois há presença registrada!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_horario/formcad.php';
</script>");
}

$sql = "DELETE FROM horario WHERE id_horario = $id_horario";
$executa = mysqli_query($conexao, $sql);
die("<script>
alert('Horário excluído com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_horario/formcad.php';
</script>");
