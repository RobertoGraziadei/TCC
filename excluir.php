<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id = $_GET['id'];

$sql = "DELETE FROM chamada WHERE id = $id";

// executa o comando no BD
mysqli_query($conexao,$sql);