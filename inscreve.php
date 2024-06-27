<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscreva-se</title>
</head>
<body>
  <form action=""  method="post">
    <input type="hidden" name="id_usuario">
    <label>Usuário:<input type="text" name="user"><br></label>
    <label>Senha:<input type="password" name="senha"><br></label>
    <input type="submit" value="Inscrever-se">
  </form>
</body>
</html>
<?php
if($_POST){

    include "conecta.php";
    
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    
    $sql = "INSERT INTO usuario (usuario, senha) VALUES ('$user', $senha)";
    $resultado = mysqli_query($conexao, $sql);
    header('location: index.php');

}    


?>