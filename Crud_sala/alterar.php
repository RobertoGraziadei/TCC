<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id_disciplina = $_GET['id_disciplina'];
$nome = $_GET['nome'];


$sql = "UPDATE disciplina SET 
nome = '$nome' WHERE id_disciplina = $id_disciplina";
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>