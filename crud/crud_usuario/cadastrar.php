<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
  header('location: ../../principal.php');
  die();
}
include('../../conecta.php');
$user = $_POST['user'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$hash = password_hash($senha, PASSWORD_ARGON2I);
password_verify($senha, $hash);

$sql = "INSERT INTO usuario (nome_usuario, email, senha, nivel) VALUES ('$user', '$email', '$hash', $nivel)";
$resultado = mysqli_query($conexao, $sql);
/* if ($resultado === false) {
  if (mysqli_errno($conexao) == 1062) {
    echo "Email em uso! Tente outro email.";
    die();
  } else {
    echo "Erro ao inserir o novo usuário! " .
      mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
  }
} */
header("location: listar.php");
