<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$matricula = $_GET['matricula'];

$sql = "DELETE FROM aluno WHERE matricula = $matricula";

// executa o comando no BD
mysqli_query($conexao,$sql);

header("location: listar.php");
?>