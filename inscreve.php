<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscreva-se</title>
</head>

<body>
  <form action="" method="post">
    <label>Nome de usuário:<input type="text" name="user" required><br></label>
    <label>Email:<input type="text" name="email" required><br></label>
    <label>Senha:<input type="password" name="senha" required><br></label><br>
    <input type="submit" value="Inscrever-se"><br><br><br>
    <button><a href="index.php">Login</a></button>
  </form>
</body>

</html>
<?php
if ($_POST) {

  include "conecta.php";

  $user = $_POST['user'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $hash = password_hash($senha, PASSWORD_ARGON2I);
  password_verify($senha, $hash);

  $sql = "INSERT INTO usuario (nome_usuario, email, senha) VALUES ('$user', '$email', '$hash')";
  $resultado = mysqli_query($conexao, $sql);
  header('location: index.php');
}


?>