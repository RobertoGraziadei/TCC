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
</head>
<body>
    <h1> Informações </h1>
    
    <form action="cadastrar.php" method="post">
    <input type="hidden" name="id_horario">
    <input type="hidden" name="id_disciplina">

        <h2>Crud do horário</h2>
        <select name="dia" require>
            <option value="">Selecione o dia</option>
            <option value="Segunda-feira">Segunda-feira</option>
            <option value="ter">Terça-feira</option>
            <option value="qua">Quarta-feira</option>
            <option value="qui">Quinta-feira</option>
            <option value="sex">Sexta-feira</option>
        </select><br><br>
        <select name="n_sala" require>
            <option value="">Selecione o numero da sala</option>
            <option value="a">109</option>
            <option value="b">108</option>
            <option value="c">107</option>
        </select><br><br>
        <select name="disciplina" require>
            <option value="">Selecione a disciplina</option>
            <option value="a">Português</option>
            <option value="b">Matemática</option>
            <option value="c">História</option>
        </select><br><br>
        <select name="turma" require>
            <option value="">Selecione a turma</option>
            <option value="a">INF31</option>
            <option value="b">ADM31</option>
            <option value="c">INF21</option>
        </select><br><br>
        <label>Horário inicial <input type="time" name="horario-inicio" required></label><br>
        <label>Horário final <input type="time" name="horario-fim" required></label><br><br>


        <input class="b" type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>
</html>