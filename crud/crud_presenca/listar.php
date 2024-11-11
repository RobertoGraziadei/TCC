<?php
include('../../conecta.php');

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime('now');
$agora = $data->format('Y-m-d');

if (empty($_POST) == false) { // se vier post, faz isto (chamada)
    //var_dump($_POST);die;
    $ss  = "";
    foreach ($_POST['registro'] as $g) {
        $ss = $ss .  "UPDATE presenca SET presenca=" . $g['status'] . " WHERE id_presenca= " . $g['id_presenca'] . "; ";
        $executa = mysqli_query($conexao, $ss);
    }
}
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
foreach ($result2 as $f){
    $turminha = $f['nome_turma'];
    $dia = $f['dia'];
}
?>
<link rel='stylesheet' href='../../css/bootstrap.min.css'>
<link rel='stylesheet' href='../../css/layout.css'>
<div class='container'>

    <h3>Selecione uma data - 
        <?php echo $turminha .' - ';
        echo $dia;
        ?>
    </h3>
    <form action='listar.php' method='GET'>
        <input type='date' name='hr_batida' value='<?php echo $data;?>' required>
        <input type='hidden' name='id_disciplinas' value='<?php echo $id_disciplinas ?>' />
        <input type='hidden' name='id_turma' value='<?php echo $id_turma ?>' />
        <?php echo "<input type='submit' value='Ver'>"; ?>
    </form>

    <div id='mostraAluno'>
        <h3>Alunos registrados</h3>
        <form action="listar.php?id_disciplinas=<?php echo $id_disciplinas; ?>&id_turma=<?php echo $id_turma; ?>&hr_batida=<?php echo $agora; ?>" method="POST">
            <table class="table table-white table-striped">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Status</th>
                </tr>
                <?php
                $a = 0;
                $dados = [];
                while ($d = mysqli_fetch_assoc($result)) {
                    $dados[] = $d;
                    //var_dump($dados);die;
                }
                foreach ($dados as $d) {
                    //var_dump($dados);die;
                    if (!(empty($d['id_presenca']))) {
                        echo '<tr>';
                        echo '<td>' . $d['nome'] . '</td>';
                        echo '<td>' . $d['matricula'] . '</td>';
                        echo '<td>';
                        echo '<input type="hidden" name="registro[' . $a . '][id_presenca]" value="' . $d['id_presenca'] . '" />';
                        echo '<select name="registro[' . $a . '][status]" required>';
                        echo ' <option value="0" ' . ($d['presenca'] == 0 ? 'selected' : '') . ' >Ausente</option>';
                        echo '  <option value="1" ' . ($d['presenca'] == 1 ? 'selected' : '') . ' >Presente</option>';
                        echo '</select>';
                        echo '</td>';
                        echo '</tr>';
                        $a++;
                    }
                } ?>
            </table><br>
            <input type='submit' class='btn btn-primary' value='Salvar'>
            <a href="../../QRcode/index.php" class="btn btn-secondary">Voltar</a>
        </form>

        <br>
        <h3 style='margin-top:20px;'>Alunos ausentes</h3>
        <table class="table table-white table-striped">
            <tr>
                <th scope="col">Nome</th>
            </tr>
            <?php
            foreach ($dados as $d) {
                if (empty($d['id_presenca'])) {
                    echo '<tr>';
                    echo '<td>' . $d['nome'] . '</td>';?>
                    <th><a class="btn btn-secondary" href=
                    "formedit.php?matricula=<?php echo $d['matricula']?>&id_turma=<?php echo $id_turma ?>&id_disciplinas=<?php echo $id_disciplinas?>&hr_batida=<?php echo $data?>
                    ">Registrar presença</a></th>
                    <?php echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>'; ?>
    </div>
</div>
<!-- <script>
    jQuery('#mostraAluno').hide()

    function mostraAluno() {
        jQuery('#mostraAluno').show()
    }
</script> -->