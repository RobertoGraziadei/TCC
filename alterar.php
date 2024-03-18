<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id = $GET['id'];
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];


$sql = "UPDATE chamada SET 
matricula = '$matricula', nome = '$nome' WHERE id = $id";

if ($mysqli->error) {

    die("Falha ao editar usuário no sistema:". $mysqli->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD
mysqli_query($mysqli,$sql);
?>