<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

    
    <form action="cadastrar.php" method="post">
    <input type="hidden" name="id_aluno">

        <div class="a">Informe a matricula</div>

        <input class="b" type="number" name="matricula" id="1" required><br>

        <div class="a">Informe o nome do aluno</div>

        <input class="b" type="text" name="nome" id="2" required><br><br>

        <input class="b" type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>
</html>