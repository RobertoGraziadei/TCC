<?php
if(!isset($_SESSION['user'])){
    session_start();
}
include "conecta.php";

$user = $_POST['user'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario where usuario = '$user' and senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);

$_SESSION['user'] = $user;
//$_SESSION['senha'] = $senha;

$result = mysqli_num_rows($resultado);
if($result == 1){
    header('location: redire.php');
}else{
    echo "Usuário ou senha inválida! Tente novamente";
}
?>