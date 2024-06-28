<?php

    session_start();

if(!isset($_SESSION['user'])){
    echo "Você precisa fazer login para acessar essa página! <br><br>" . '<a href="index.php">Login</a>';
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="shortcut icon" href="barra.ico" type="image/x-icon">
</head>
<body>
    <h1>Olá, <?php  echo $_SESSION['user']; ?> </h1>
    <h2>Redirecionamento dos crud's</h2>
    <div class="d">
    <button><a href="crud/crud_aluno/">Crud alunos </button></a><br><br>
    <button><a href="crud/crud_disciplina">Crud disciplinas</button><br><br>
    <button><a href="crud/crud_dia">Crud dia</button><br><br>
    <button><a href="crud/crud_horario">Crud horario</button><br><br>
    <button><a href="crud/crud_presenca">Crud presenca</button><br><br>
    <button><a href="crud/crud_sala">Crud sala</button><br><br>
    <button><a href="crud/crud_turma">Crud turma</button><br><br><br><br>

    <button><a href="logout.php">Logout</button><br><br>
</div>
</body>
</html>