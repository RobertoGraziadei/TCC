<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
include('../../conecta.php');
$email = $_GET['email'];
$nome = $_GET['nome_usuario'];
$nivel = $_GET['nivel'];

$sql = "UPDATE usuario SET nome_usuario = '$nome', nivel = $nivel WHERE email = '$email'";
$executaSql = mysqli_query($conexao, $sql);
die("<script>
alert('Usuário alterado com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/login/redire.php';
</script>");
