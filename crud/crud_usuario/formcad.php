<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>


    <form action="cadastrar.php" method="post">

        <div class="a">Nivel de segurança</div>

        Administrador<input type="radio" name="nivel" value="1" required>
        Professor<input type="radio" name="nivel" value="2" required><br><br>

        <div class="a">Nome de usuário</div>

        <input class="b" type="text" name="user" required><br>

        <div class="a">Email</div>

        <input class="b" type="email" name="email" required><br>

        <div class="a">Informe a senha</div>

        <input class="b" type="password" name="senha" required><br><br>

        <input class="b" type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>

</html>