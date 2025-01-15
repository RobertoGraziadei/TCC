<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}

// Conectar ao BD
include('../../conecta.php');

// receber os dados do formulário
$id_disciplina = $_GET['id_disciplinas'];
$nome = $_GET['nome_disciplina'];


$sql = "UPDATE disciplina SET 
nome_disciplina = '$nome' WHERE id_disciplinas = $id_disciplina";
mysqli_query($conexao,$sql);
//die;
die("<script>
alert('Disciplina alterada com sucesso!');
window.location.href = window.location.origin + '/crud/crud_disciplina/formcad.php';
</script>");