<?php

//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$id = $_POST['id'];
$texto = $_POST['texto'];
$imagem = $_POST['imagem'];
$escolha1 = $_POST['escolha1'];
$texto1 = $_POST['texto1'];
$escolha2 = $_POST['escolha2'];
$texto2 = $_POST['texto2'];


//comando sql.
$sql = "INSERT INTO historia (id_historia, texto, nome_imagem, escolha1, texto1, escolha2, texto2) VALUES ($id, '$texto', '$imagem', $escolha1, '$texto1', $escolha2, '$texto2')";
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>