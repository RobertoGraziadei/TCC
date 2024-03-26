<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$dia = $_GET['dia'];


$sql = "UPDATE dia SET 
dia = '$dia' WHERE id_dia = $id_dia";
mysqli_query($conexao,$sql);

if ($conexao->error) {

    die("Falha ao editar usuário no sistema:". $conexao->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD

?>