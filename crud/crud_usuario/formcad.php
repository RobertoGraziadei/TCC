<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>


    <form action="cadastrar.php" method="post">
        <label><input type="text" placeholder="Nome de usuário" name="user" required></label><br><br>
        <label></label><input type="email" placeholder="Email" name="email" required></label><br><br>

    <!-- COLOCAR O OLHO QUE ESTA NA TELA DE LOGIN PARA VER A SENHA -->
        <label><input type="password" placeholder="Senha" name="senha" required></label><br><br>


        <label>Nível de segurança:</label><br>
        <label>Administrador<input type="radio" name="nivel" value="1" required></label><br>
        <label>Professor<input type="radio" name="nivel" value="2" required></label><br><br>
        <input type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>

</html>