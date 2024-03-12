<?php

// Conectar ao BD
include("conecta.php");

// receber os dados do formulário
$id = $_POST['id'];
$matri = $_POST['matri'];
$nome = $_POST['nome'];


$sql = "UPDATE chamada SET 
matricula = '$matri', nome = '$nome' WHERE id = $id";

if ($mysqli->error) {

    die("Falha ao editar usuário no sistema:". $mysqli->error);

}else {
    header("location: listar.php");
}
// executa o comando no BD
mysqli_query($mysqli,$sql);
?>