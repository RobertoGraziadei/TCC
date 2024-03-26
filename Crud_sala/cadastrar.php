<?php

//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$nome = $_POST['nome'];


//comando sql.
$sql = "INSERT INTO disciplina (nome) VALUES ('$nome')";

header("location: listar.php");
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>