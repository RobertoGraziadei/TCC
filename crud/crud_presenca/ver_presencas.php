<?php
include('../../conecta.php');
session_start();
if (!isset($_SESSION['nivel']) or $_SESSION['nivel'] == 1) {
    include "../../login/verif-log.php";
    die();
}
$id_usuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/qrcode.ico">
    <script src="../../css/sweetalert2@11.js"></script>
    <script src="../../css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <title>Chamada automática</title>
    <?php
    date_default_timezone_set('America/Sao_Paulo');
    $data = new DateTime('now');
    $agora = $data->format('d/m/Y');

    $id_disciplinas = $_GET['id_disciplinas'];
    $id_turma = $_GET['id_turma'];
    $sql2 = "SELECT * FROM presenca 
INNER JOIN horario on presenca.fk_horario_id_horario = horario.id_horario 
INNER JOIN aluno on aluno.matricula = presenca.fk_aluno_matricula 
INNER JOIN disciplina on disciplina.id_disciplinas = horario.fk_disciplina_id_disciplina
INNER JOIN turma on turma.id_turma = horario.fk_turma_id_turma

WHERE horario.fk_turma_id_turma = $id_turma
AND horario.fk_disciplina_id_disciplina = $id_disciplinas";
//echo "$sql2";die;
    $result2 = mysqli_query($conexao, $sql2);
    $infor = mysqli_fetch_assoc($result2);
    ?>
</head>

<body>
    <div class="container">
        <h3>
            <a href="listar.php?id_disciplinas=<?=$id_disciplinas?>&id_turma=<?=$id_turma?>"><img src="../../img/voltar.png" alt="Voltar"></a>
            Todas as presenças dos alunos em <?=$infor['nome_disciplina']?>
        </h3>

        <form action="listar.php" method="GET">
            <input type="hidden" name="id_disciplinas" value="<?php echo $id_disciplinas; ?>">
            <input type="hidden" name="id_turma" value="<?php echo $id_turma; ?>">
            <p>
            <p></p>
            <hr>
        </form>

        <br>
        <table class="table table-white table-striped">
            <tr>
                <th scope="col">Matrícula</th>
                <th scope="col">Nome</th>
                <th scope="col">Horário de chegada</th>
                <th scope="col"></th>
            </tr>
            <?php while ($dados = mysqli_fetch_assoc($result2)){?>
                    <tr>
                        <td><?php echo $dados['matricula']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <?php $dados['hr_batida'] = $data->format('d/m/Y');?>
                        <td><?php echo $dados['hr_batida']; ?></td>
                        <?php
                        } ?>