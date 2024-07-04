<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscreva-se</title>
</head>

<body>
  <form action="" method="post">
    <input type="hidden" name="nivel" value="2">
    <label>Nome de usuário:<input type="text" name="user" required><br></label>
    <label>Email:<input type="text" name="email" required><br></label>
    <label>Senha:<input type="password" name="senha" required><br></label>
    <input type="submit" value="Inscrever-se">
  </form>
</body>

</html>
<?php
if ($_POST) {

  include "conecta.php";

  $user = $_POST['user'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $nivel = $_POST['nivel'];

  $hash = password_hash($senha, PASSWORD_ARGON2I);
  password_verify($senha, $hash);

  $sql = "INSERT INTO usuario (nome_usuario, email, senha, nivel) VALUES ('$user', '$email', '$hash', $nivel)";
  $resultado = mysqli_query($conexao, $sql);
  if ($resultado === false) {
    if (mysqli_errno($conexao) == 1062) {
      echo "Email em uso! Tente outro email.";
      die();
    } else {
      echo "Erro ao inserir o novo usuário! " .
        mysqli_errno($conexao) . ": " . mysqli_error($conexao);
      die();
    }
  }
  header("Location: index.php");
}


?>