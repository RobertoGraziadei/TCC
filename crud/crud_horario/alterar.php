<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id_horario = $_GET['id_horario'];
$dia = $_GET['dia'];
$horario = $_GET['horario'];


$sql = "UPDATE horario SET 
dia = '$dia', horario = '$horario' WHERE id_horario = $id_horario";
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>