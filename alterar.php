<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id = $_POST['id'];
$texto = $_POST['texto'];
$imagem = $_POST['imagem'];
$escolha1 = $_POST['escolha1'];
$texto1 = $_POST['texto1'];
$escolha2 = $_POST['escolha2'];
$texto2 = $_POST['texto2'];

$sql = "UPDATE historia SET id_historia = $id, 
texto = '$texto', nome_imagem = '$imagem', escolha1 = $escolha1, escolha2 = $escolha2, texto1 = '$texto1', texto2 = '$texto2' WHERE id_historia = $id";

// executa o comando no BD
mysqli_query($conexao,$sql);