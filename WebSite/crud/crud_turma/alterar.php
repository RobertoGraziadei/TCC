<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}

// Conectar ao BD
include('../../conecta.php');

// receber os dados do formulário
$id_turma = $_GET['id_turma'];
$nome = $_GET['nome_turma'];


$sql = "UPDATE turma SET 
nome_turma = '$nome' WHERE id_turma = $id_turma";
mysqli_query($conexao,$sql);

die("<script>
alert('Turma alterada com sucesso!');
window.location.href = window.location.origin + '/crud/crud_turma/formcad.php';
</script>");

?>