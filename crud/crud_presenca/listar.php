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
    <script src="../../css/sweetalert2@11.js"></script>
    <script src="../../css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <title>Chamada automática</title>
    <?php
    date_default_timezone_set('America/Sao_Paulo');
    $data = new DateTime('now');
    $agora = $data->format('Y-m-d');

    $id_disciplinas = $_GET['id_disciplinas'];
    $id_turma = $_GET['id_turma'];
    $data = empty($_GET['hr_batida']) ? $agora : $_GET['hr_batida'];

    /*$sql = "SELECT DISTINCT id_presenca, matricula, nome, presenca 
            FROM aluno
            LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) AND (DATE(presenca.hr_batida) = '$data')
            INNER JOIN turma ON turma.id_turma = aluno.turma
            INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
            WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas 
            AND horario.fk_turma_id_turma = $id_turma
            AND horario.fk_professor =" . $id_usuario;*/
    //echo $sql;die;
    $sql = "SELECT * FROM presenca 
            INNER JOIN horario ON presenca.fk_horario_id_horario = horario.id_horario AND horario.fk_turma_id_turma = $id_turma AND horario.fk_professor = $id_usuario AND horario.fk_disciplina_id_disciplina = $id_disciplinas 
            RIGHT JOIN aluno ON aluno.matricula = presenca.fk_aluno_matricula 
            WHERE aluno.turma = $id_turma;";
    $result = mysqli_query($conexao, $sql);

    $sql2 = "SELECT DISTINCT nome_turma, dia, nome_disciplina
             FROM turma
             INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma
             INNER JOIN disciplina ON horario.fk_disciplina_id_disciplina = disciplina.id_disciplinas
             WHERE horario.fk_disciplina_id_disciplina = $id_disciplinas 
             AND horario.fk_turma_id_turma = $id_turma
             AND horario.fk_professor =" . $id_usuario;
    //echo $sql2;die;
    $result2 = mysqli_query($conexao, $sql2);
    $turminha = $dia = '';
    if ($row = mysqli_fetch_assoc($result2)) {
        $turminha = $row['nome_turma'];
        $dia = $row['dia'];
        $disciplina = $row['nome_disciplina'];
    }

    $d = [];
    while ($dados = mysqli_fetch_assoc($result)) {
        $d[] = $dados;
    }
    ?>
</head>

<body>
    <div class="container">
        <h3>
            <a href="../../QRcode/index.php"><img src="../../img/voltar.png" alt="Voltar"></a>
            Selecione uma data: <?php echo $dia . ' ' . $turminha; ?>
        </h3>

        <form action="listar.php" method="GET">
            <input type="date" name="hr_batida" value="<?php echo $data; ?>" required>
            <input type="hidden" name="id_disciplinas" value="<?php echo $id_disciplinas; ?>">
            <input type="hidden" name="id_turma" value="<?php echo $id_turma; ?>">
            <input type="submit" value="Ver">
            <p>
            <p></p>
            <hr>
            <h3>
                <?php
                echo $disciplina;
                ?>
            </h3>

        </form>

        <br>
        <h3>Alunos presentes</h3>
        <table class="table table-white table-striped">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Matrícula</th>
                <th scope="col"></th>
            </tr>
            <?php foreach ($d as $dados): ?>
                <?php if (!empty($dados['id_presenca'])): ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['matricula']; ?></td>
                        <td>
                            <button class="btn btn-danger deleteButton"
                                data-url="excluir.php?id_presenca=<?php echo $dados['id_presenca']; ?>&id_disciplinas=<?php echo $id_disciplinas; ?>&id_turma=<?php echo $id_turma; ?>&hr_batida=<?php echo $data; ?>"><img src="imagens/excluir.png" width="20" height="20">
                            </button>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

        <br>
        <h3 style="margin-top: 20px;">Alunos ausentes</h3>
        <table class="table table-white table-striped">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col"></th>
            </tr>
            <?php foreach ($d as $dados): ?>
                <?php if (empty($dados['id_presenca'])): ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td>
                            <a class="btn btn-primary"
                                href="formedit.php?matricula=<?php echo $dados['matricula']; ?>&id_turma=<?php echo $id_turma; ?>&id_disciplinas=<?php echo $id_disciplinas; ?>&hr_batida=<?php echo $data; ?>">
                                Registrar presença
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
        document.querySelectorAll('.deleteButton').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.getAttribute('data-url');
                Swal.fire({
                    title: 'Tem certeza?',
                    text: 'Você não poderá reverter isso!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, deletar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
</body>

</html>