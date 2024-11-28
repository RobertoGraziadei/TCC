<?php
include('../../conecta.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../css/bootstrap.min.js"></script>
    <link rel='stylesheet' href='../../css/bootstrap.min.css'>
    <link rel='stylesheet' href='../../css/layout.css'>

    <?php
    date_default_timezone_set('America/Sao_Paulo');
    $data = new DateTime('now');
    $agora = $data->format('Y-m-d');

    $id_disciplinas = $_GET['id_disciplinas'];
    $id_turma = $_GET['id_turma'];
    if (empty($_GET['hr_batida'])) {
        $data = $agora;
    } else {
        $data = $_GET['hr_batida'];
    }

    $sql = "SELECT DISTINCT id_presenca, matricula, nome, presenca FROM aluno
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '$data')
INNER JOIN turma ON turma.id_turma = aluno.turma
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas AND horario.fk_turma_id_turma = $id_turma
";
    //echo $sql;die;
    $result = mysqli_query($conexao, $sql);

    $sql2 = "SELECT DISTINCT id_presenca, matricula, nome, presenca, nome_turma, dia FROM aluno
    LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) and (date (presenca.hr_batida) = '$data')
    INNER JOIN turma ON turma.id_turma = aluno.turma
    INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
    WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas AND horario.fk_turma_id_turma = $id_turma
    ";

    $result2 = mysqli_query($conexao, $sql2);
    foreach ($result2 as $f) {
        $turminha = $f['nome_turma'];
        $dia = $f['dia'];
    }
    $d = [];
    while ($dados = mysqli_fetch_assoc($result)) {
        $d[] = $dados;
    }
    ?>

    <div class='container'>
    <h3><a href="../../QRcode/index.php"><img src="../../img/voltar.png"></a> Selecione uma data
        <?php echo $dia . '   '; echo $turminha;
        ?>
    </h3>

    <form action='listar.php' method='GET'>
        <input type='date' name='hr_batida' value='<?php echo $data; ?>' required>
        <input type='hidden' name='id_disciplinas' value='<?php echo $id_disciplinas ?>' />
        <input type='hidden' name='id_turma' value='<?php echo $id_turma ?>' />
        <?php echo "<input type='submit' value='Ver'>"; ?>
    </form>




        <br><h3>Alunos presentes</h3>
        <table class="table table-white table-striped">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Matricula</th>
                <th colspan=3> </th>
            </tr>
            <?php
            foreach ($d as $dados) {
                if (!(empty($dados['id_presenca']))) {
            ?>
                    <tr>
                        <td> <?php echo $dados['nome'] ?> </td>
                        <td><?php echo $dados['matricula'] ?> </td>
                        <!-- <td> <a href="formedit.php?id_presenca=' . $dados['id_presenca'] . '"> <img src="imagens/editar.png" width="20" height="20"> </a> </td> -->
                        <td> <a href="excluir.php?id_presenca=<?php echo $dados['id_presenca'] ?>&id_disciplinas=<?php echo $id_disciplinas ?>&id_turma=<?php echo $id_turma ?>"> <img src="imagens/excluir.png" width="20" height="20"> </a> </td>
                    </tr>
            <?php
                }
            } ?>
        </table>
        <br>
        <h3 style='margin-top:20px;'>Alunos ausentes</h3>
        <table class="table table-white table-striped">
            <tr>
                <th scope="col">Nome</th>
            </tr>
            <?php
            foreach ($d as $dados) {
                if (empty($dados['id_presenca'])) {
                    echo '<tr>';
                    echo '<td>' . $dados['nome'] . '</td>'; ?>
                    <th><a class="btn btn-primary" href="formedit.php?matricula=<?php echo $dados['matricula'] ?>&id_turma=<?php echo $id_turma ?>&id_disciplinas=<?php echo $id_disciplinas ?>&hr_batida=<?php echo $data ?>">Registrar presença</a></th>
            <?php echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
            ?>
        </table><br>
        <!-- <a href="../../QRcode/index.php" class="btn btn-secondary"><img src="../../img/voltar.png">Voltar</a> -->