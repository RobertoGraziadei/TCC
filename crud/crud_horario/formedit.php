<?php include('../../conecta.php');
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    header('location: ../../principal.php');
    die();
}
$id_horario = $_GET['id_horario'];
$sql = "SELECT * FROM horario WHERE id_horario = $id_horario;";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);

$sql2 = "SELECT * FROM horario 
INNER JOIN sala ON fk_sala_n_sala = n_sala
INNER JOIN disciplina ON id_disciplinas = fk_disciplina_id_disciplina
INNER JOIN turma ON id_turma = fk_turma_id_turma
;";

?>
<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar horário</title>

</head>

<body>

    <form action="alterar.php" method="get">

        <h1>Editar horário</h1>
        <input type="hidden" name="id_horario" value="<?php echo $dados['id_horario']; ?>">

        <select name="dia" require>
            <option value="<?php echo $dados['dia']; ?>" selected><?php echo $dados['dia']; ?></option>
            <option value="Segunda-feira">Segunda-feira</option>
            <option value="Terça-feira">Terça-feira</option>
            <option value="Quarta-feira">Quarta-feira</option>
            <option value="Quinta-feira">Quinta-feira</option>
            <option value="Sexta-feira">Sexta-feira</option>
        </select><br><br>


        <select name="n_sala" value="<?php echo $dados['descricao']; ?>" required>
            <!-- <option disabled selected>Selecione uma sala</option> -->
            <?php
            $sql2 = "SELECT * FROM sala id_horario = $id_horario";
            $executaSQL2 = mysqli_query($conexao, $sql2);
            while ($dados = mysqli_fetch_assoc($executaSQL2)) {
            ?>
                <option value="<?php echo $dados['n_sala']; ?>"><?php echo $dados['descricao']; ?></option>
            <?php
            }
            ?>
        </select><br><br>

        <select name="disciplina" value="<?php echo $dados['nome_disciplina']; ?>" required>
            <!-- <option disabled selected>Selecione a disciplina</option> -->
            <?php
            $sql = "SELECT * FROM disciplina";
            $executaSQL = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($executaSQL)) {
            ?>
                <option value="<?php echo $dados['id_disciplinas']; ?>"><?php echo $dados['nome_disciplina']; ?></option>
            <?php
            }
            ?>
        </select><br><br>

        <select name="turma" value="<?php echo $dados['nome_turma']; ?>" required>
            <!-- <option disabled selected>Selecione uma turma</option> -->
            <?php
            $sql = "SELECT * FROM turma";
            $executaSQL = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($executaSQL)) {
            ?>
                <option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome_turma']; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <label>Horário inicial <input type="time" name="horario_inicio" value="<?php echo $dados['horario_inicio']; ?>" required></label><br>
        <label>Horário final <input type="time" name="horario_fim" value="<?php echo $dados['horario_fim']; ?>" required></label><br><br>
        <input type="submit" value="Cadastrar"><br><br>
        <button><a href="index.php">Voltar</a></button>

    </form>

</body>

</html>
<?php



?>