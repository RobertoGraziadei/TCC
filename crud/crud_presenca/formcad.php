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
        <div class="a">Informe</div>
    <input class="b" type="number" name="id_dia" required>

        <div class="a">Informe</div>

        <input class="b" type="date" name="nome" id="2" required><br><br>

        <input class="b" type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>
</html>