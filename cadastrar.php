<?php

//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];


//comando sql.
$sql = "INSERT INTO chamada (matricula, nome) VALUES ($matricula, '$nome')";

header("location: listar.php");
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>