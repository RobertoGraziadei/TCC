<?php

//conectar ao banco de dados.
include("conecta.php");

//receber os dados do formulário.
$dia = $_POST['dia'];
$horario = $_POST['horario'];

//comando sql.
$sql = "INSERT INTO horario (dia, horario) VALUES ('$dia', '$horario')";

header("location: listar.php");
 
//executar o comando sql.
mysqli_query($conexao, $sql);

?>