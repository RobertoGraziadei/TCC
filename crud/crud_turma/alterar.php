<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id_turma = $_GET['id_turma'];
$nome = $_GET['nome'];


$sql = "UPDATE turma SET 
nome = '$nome' WHERE id_turma = $id_turma";
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>