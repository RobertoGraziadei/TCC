<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id = $_GET['id_aluno'];
$matricula = $_GET['matricula'];
$nome = $_GET['nome'];


$sql = "UPDATE aluno SET 
matricula = '$matricula', nome = '$nome' WHERE id_aluno = $id";
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>