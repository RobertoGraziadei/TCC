<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}

// Conectar ao BD
include('../../conecta.php');

// receber os dados do formulário
$n_sala = $_GET['n_sala'];
$descricao = $_GET['descricao'];


$sql = "UPDATE sala SET 
descricao = '$descricao' WHERE n_sala = $n_sala";
mysqli_query($conexao,$sql);
die("<script>
alert('Sala alterada com sucesso!');
window.location.href = window.location.origin + '/crud/crud_sala/formcad.php';
</script>");
?>