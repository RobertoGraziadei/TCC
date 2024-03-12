<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$matri = $_GET['matri'];

$sql = "DELETE FROM chamada WHERE id_historia = $matri";

// executa o comando no BD
mysqli_query($conexao,$sql);