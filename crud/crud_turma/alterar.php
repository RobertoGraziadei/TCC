<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
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

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>