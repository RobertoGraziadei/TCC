<?php

//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$id_turma = $_POST['id_turma'];
$nome = $_POST['nome'];


//comando sql.
$sql = "INSERT INTO turma (id_turma, nome) VALUES ($id_turma, '$nome')";

header("location: listar.php");
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>