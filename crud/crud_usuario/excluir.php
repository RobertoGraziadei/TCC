<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$email = $_GET['email'];

$sql3 = "SELECT * FROM usuario WHERE email = '$email'";
$executa3 = mysqli_query($conexao, $sql3);
$dados = mysqli_fetch_assoc($executa3);

$sql2 = "SELECT * FROM horario
WHERE horario.fk_professor =" . $dados['id_usuario'] . "";
$executa2 = mysqli_query($conexao, $sql2);
if (mysqli_num_rows($executa2) != 0) {
    die("<script>
alert('Não é possível excluir este usuário, pois ele faz parte de um horário!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
}


$sql = "DELETE FROM usuario WHERE email = '$email'";
mysqli_query($conexao,$sql);
die("<script>
alert('Usuário excluído com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
?>