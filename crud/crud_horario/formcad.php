<?php
include "conecta.php";
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

        <h2>Crud do horário</h2>
        <select name="dia" required>
            <option disabled selected >Selecione o dia</option>
            <option value="segunda">Segunda-Feira</option>
            <option value="terça">Terça-Feira</option>
            <option value="quarta">Quarta-Feira</option>
            <option value="quinta">Quinta-Feira</option>
            <option value="sexta">Sexta-Feira</option>
        </select><br><br>
        <select name="sala" required>
            <option disabled selected>Selecione a sala</option>
            <?php
            $sql = "SELECT * FROM sala";
            $executaSQL = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($executaSQL)) {
            ?>
                <option value="<?php echo $dados['n_sala']; ?>"><?php echo $dados['descricao']; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <select name="disciplina" required>
            <option disabled selected>Selecione a disciplina</option>
            <?php
            $sql = "SELECT * FROM disciplina";
            $executaSQL = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($executaSQL)) {
            ?>
                <option value="<?php echo $dados['id_disciplinas']; ?>"><?php echo $dados['nome']; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <select name="turma" required>
            <option disabled selected>Selecione a turma</option>
            <?php
            $sql = "SELECT * FROM turma";
            $executaSQL = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($executaSQL)) {
            ?>
                <option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome']; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <label>Horário inicial <input type="time" name="horario_inicio" required></label><br>
        <label>Horário final <input type="time" name="horario_fim" required></label><br><br>


        <input class="b" type="submit" value="Cadastrar"><br><br><br><br>
        <button><a href="index.php">Voltar</a></button>
    </form>
</body>

</html>