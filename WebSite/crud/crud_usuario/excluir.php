<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$email = $_GET['email'];
$sql = "DELETE FROM usuario WHERE email = '$email'";
mysqli_query($conexao,$sql);
die("<script>
alert('Usuário excluído com sucesso!');
window.location.href = window.location.origin + '/crud/crud_usuario/formcad.php';
</script>");
?>