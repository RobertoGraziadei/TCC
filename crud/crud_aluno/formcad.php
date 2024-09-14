<?php
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>

    <h1>Cadastro de aluno</h1>
    <form action="cadastrar.php" method="post">
    <input type="hidden" name="id_aluno">

        <label><input type="number" name="matricula" placeholder="Matricula" required></label><br><br>
        <label><input type="text" name="nome" placeholder="Nome" required></label><br><br>
        <label><input type="text" name="turma" placeholder="Turma" required></label><br><br>
        <input type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>
</html>