<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
  include "../../login/verif-log.php";
  die();
}
include('../../conecta.php');
$user = $_POST['user'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$hash = password_hash($senha, PASSWORD_ARGON2I);
password_verify($senha, $hash);

$sql1 = "SELECT * FROM usuario WHERE nome_usuario = '$user'";
$sql2 = "SELECT * FROM usuario WHERE email = '$email'";
$executa1 = mysqli_query($conexao, $sql1);
$executa2 = mysqli_query($conexao, $sql2);
//echo $sql1;die;
if ($verifica = mysqli_num_rows($executa1) != 0) {
  die("<script>
alert('Já existe um usuário com esse nome!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
}
if ($verifica = mysqli_num_rows($executa2) != 0) {
  die("<script>
alert('Já existe um usuário com esse email!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
}


$sql = "SELECT * FROM usuario where email = '$email'";
$result = mysqli_query($conexao, $sql);
$verEmail = mysqli_num_rows($result);
if ($verEmail != 0) {
  die("<script>
alert('Já existe um usuário com este email!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
}

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
die("<script>
alert('Usuário cadastrado com sucesso!');
window.location.href = window.location.origin + '/roberto/TCC/crud/crud_usuario/formcad.php';
</script>");
