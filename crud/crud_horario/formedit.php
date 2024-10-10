<?php include('../../conecta.php');
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 2) {
    include "../../login/verif-log.php";
    die();
}
$id_horario = $_GET['id_horario'];
$selecione_horario = "SELECT * FROM horario 
INNER JOIN sala ON fk_sala_n_sala = n_sala
INNER JOIN disciplina ON id_disciplinas = fk_disciplina_id_disciplina
INNER JOIN turma ON id_turma = fk_turma_id_turma 
WHERE id_horario = $id_horario;";
$resultado = mysqli_query($conexao, $selecione_horario);
$dados_horario = mysqli_fetch_assoc($resultado);

/* $selecione_horario2 = "SELECT * FROM horario Where id_horario = $id_horario;";
$exe2 = mysqli_query($conexao, $selecione_horario2); */


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
        <input type="hidden" name="id_horario">

        <h2>Crud do horário</h2>









        <label for="turma">Turma</label>
        <select name="turma" required>
            <?php
            $sql = "SELECT * FROM turma";
            $exe = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($exe)) { ?>
                <option value="<?php echo $dados['id_turma']; ?>" 
                <?php if ($dados_horario['nome_turma'] == $dados['nome_turma']){ echo 'selected';} ?>>
                <?php echo $dados['nome_turma']; ?>
                </option>
            <?php } ?>
        </select><br><br>


        <label for="dia">Dia</label>
        <select name="dia" required>
        <?php
            $sql = "SELECT dia FROM horario";
            $exe = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($exe)) { ?>
                <option value="<?php echo $dados['dia']; ?>" 
                <?php if ($dados_horario['dia'] == $dados['dia']){ echo 'selected';} ?>>
                <?php echo $dados['dia']; ?>
                </option>
            <?php } ?>
        </select><br><br>


        <label for="disciplina">Disciplina</label>
        <select name="disciplina" required>
        <?php
            $sql = "SELECT * FROM disciplina";
            $exe = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($exe)) { ?>
                <option value="<?php echo $dados['id_disciplinas']; ?>" 
                <?php if ($dados_horario['nome_disciplina'] == $dados['nome_disciplina']){ echo 'selected';} ?>>
                <?php echo $dados['nome_disciplina']; ?>
                </option>
            <?php } ?>
        </select><br><br>


        <label for="professor">Professor</label>
        <select name="professor" required>
        <?php
            $sql = "SELECT professor FROM disciplina";
            $exe = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($exe)) { ?>
                <option value="<?php echo $dados['professor']; ?>" 
                <?php if ($dados_horario['professor'] == $dados['professor']){ echo 'selected';} ?>>
                <?php echo $dados['professor']; ?>
                </option>
            <?php } ?>
        </select><br><br>


        <label for="sala">Sala</label>
        <select name="sala" required>
        <?php
            $sql = "SELECT * FROM sala";
            $exe = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($exe)) { ?>
                <option value="<?php echo $dados['n_sala']; ?>" 
                <?php if ($dados_horario['descricao'] == $dados['descricao']){ echo 'selected';} ?>>
                <?php echo $dados['descricao']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <?php
        $sql = "SELECT * FROM horario Where id_horario = $id_horario";
        $exe2 = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($exe2) ?>
        <label>Horário inicial <input value="<?php echo $dados['horario_inicio'] ?>" type="time" name="horario_inicio" required></label><br>
        <label>Horário final <input value="<?php echo $dados['horario_fim'] ?>" type="time" name="horario_fim" required></label><br><br>










        </select><br><br>


















        <input type="submit" value="Cadastrar"><br><br>
        <button><a href="index.php">Voltar</a></button>

    </form>

</body>

</html>
<?php



?>