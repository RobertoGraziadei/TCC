<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id = $_GET['id'];

$sql = "DELETE FROM historia WHERE id_historia=$id";

// executa o comando no BD
mysqli_query($conexao,$sql);