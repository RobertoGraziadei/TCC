<?php
include "verif-log.php";
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: principal.php');
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
    <h1>Olá, <?php echo $_SESSION['user']; ?> </h1>
    <h2>Página do administrador</h2>
    <h3>Redirecionamento dos CRUDs</h3>
    <div class="d">
        <button><a href="crud/crud_aluno/">Crud alunos </a></button><br><br>
        <button><a href="crud/crud_disciplina/">Crud disciplinas</a></button><br><br>
        <button><a href="crud/crud_horario/">Crud horario</a></button><br><br>
        <button><a href="crud/crud_presenca/">Crud presenca</a></button><br><br>
        <button><a href="crud/crud_sala/">Crud sala</a></button><br><br>
        <button><a href="crud/crud_turma/">Crud turma</a></button><br><br><br><br>

        <button><a href="logout.php">Logout</a></button><br><br>
    </div>
</body>

</html>
