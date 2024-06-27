<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$n_sala = $_GET['n_sala'];
$descricao = $_GET['descricao'];


$sql = "UPDATE sala SET 
descricao = '$descricao' WHERE n_sala = $n_sala";
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>