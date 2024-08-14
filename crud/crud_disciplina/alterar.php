<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
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

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>