<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label>Usuário:<input type="text" name="user"><br></label>
        <label>Senha:<input type="password" name="senha"></label>

        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php
include "conecta.php";

$user = $_POST['user'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario where senha = '$senha', usuario = '$user';
$resultado = mysqli_query($conexao, $sql);


?>