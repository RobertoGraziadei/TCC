<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir senha</title>
</head>
<body>
    <h1>Nova senha</h1>
    <form action="" method="post">
        <label>Informe seu email <input type="email" name="email"><br></label>
        <label>Senha nova <input type="password" name="senha"><br><br></label>
        <input type="submit" value="Registrar"><br><br>
        <button><a href="principal.php">Voltar</a></button>
    </form>
</body>
</html>
<?php
if ($_POST) {
  include "conecta.php";
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $hash = password_hash($senha, PASSWORD_ARGON2I);
  password_verify($senha, $hash);

  $sql = "UPDATE usuario set senha = '$hash' where email ='$email'";
  $resultado = mysqli_query($conexao, $sql);
  header("Location: index.php");
}


?>