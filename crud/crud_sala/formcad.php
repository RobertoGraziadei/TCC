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
    <h1> Informações </h1>
    
    <form action="cadastrar.php" method="post">
        <label><input type="number" placeholder="Número da sala" name="n_sala" required><br><br></label>
        <label><input type="text" placeholder="Descrição" name="descricao" required></label><br><br>

        <input class="b" type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>
</html>