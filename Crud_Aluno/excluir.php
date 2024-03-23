<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id = $_GET['id_aluno'];

$sql = "DELETE FROM aluno WHERE id_aluno = $id";

// executa o comando no BD
mysqli_query($conexao,$sql);

header("location: listar.php");
?>