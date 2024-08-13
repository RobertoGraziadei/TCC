<?php
session_start();

include ".../conecta.php";


$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario where email = '$email'";
$resultado = mysqli_query($conexao, $sql);


$result = mysqli_fetch_assoc($resultado);
$hash = $result['senha'];
$user = $result['nome_usuario'];


$_SESSION['user'] = $user;
if(password_verify($senha, $hash) == true){
    header('location: redire.php');
}else{
    echo "Usuário ou senha inválida! Tente novamente";
}

?>